<?php

/*
 * This file is part of frie/flarum-nextcloud-oauth.
 *
 * Copyright (c) Friedrich Kammer.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FoF\OAuth;

use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less'),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\ServiceProvider())
        ->register(OAuthNCServiceProvider::class),
];
