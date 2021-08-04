<?php
namespace FoF\OAuth;

use Illuminate\Support\ServiceProvider;

class OAuthNCServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->tag([
            Nextcloud::class,
        ], 'fof-oauth.providers');
    }
}
