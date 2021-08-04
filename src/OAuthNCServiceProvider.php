<?php
namespace FoF\OAuth;

class OAuthNCServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->tag([
            Nextcloud::class,
        ], 'fof-oauth.providers');
    }
}
