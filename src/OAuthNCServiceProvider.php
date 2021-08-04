<?php
namespace FoF\OAuth;

use Flarum\Http\RouteCollection;
use Flarum\Http\RouteHandlerFactory;
use Illuminate\Contracts\Container\Container;
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
