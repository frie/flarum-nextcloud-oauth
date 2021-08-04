<?php

/*
 * This file is part of fof/oauth.
 *
 * Copyright (c) 2020 FriendsOfFlarum.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace FoF\OAuth\Providers;

use Throwable;
use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Bahuma\OAuth2\Client\Provider\Nextcloud as NextcloudProvider;

class Nextcloud extends Provider
{
    const ICON = 'fas fa-user';

    public function name(): string
    {
        return 'nextcloud';
    }

    public function link(): string
    {
        return '(N/A)';
    }

    public function icon(): string
    {
        try {
           $icon = $this->getSetting('icon_name');
           return ( isset($icon) ? $icon : self::ICON );
        } catch (Throwable $e) {
           return self::ICON;
        }
    }

    public function fields(): array
    {
        return [
            'base_uri'      => 'required',
            'client_id'     => 'required',
            'client_secret' => 'required',
            'icon_name'     => 'required',
            'copy_user'     => 'required',
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new NextcloudProvider([
            'clientId'        => $this->getSetting('client_id'),
            'clientSecret'    => $this->getSetting('client_secret'),
            'nextcloudUrl'    => $this->getSetting('base_uri'),
            'redirectUri'     => $redirectUri,
        ]);
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        $this->verifyEmail($email = $user->getEmail());

        $registration->provideTrustedEmail($email);

        if ( strtoupper( $this->getSetting('copy_user') ) == 'YES' )
            $registration
                ->provide('username', $user->getId())
                ->provide('nickname', $user->getName());
        else
            $registration
                ->suggestUsername($user->getId())
                ->suggest('nickname', $user->getName());

        $registration->setPayload($user->toArray());
    }
}
