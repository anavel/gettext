<?php
namespace Anavel\Gettext;

use Anavel\Foundation\Support\ModuleProvider;
use Request;

class GettextModuleProvider extends ModuleProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'anavel-gettext');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'anavel-gettext');

        $this->publishes([
            __DIR__.'/../public/js' => public_path('vendor/anavel-gettext/js'),
        ], 'assets');

        $this->publishes([
            __DIR__.'/../config/anavel-gettext.php' => config_path('anavel-gettext.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/anavel-gettext.php', 'anavel-gettext');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    public function name()
    {
        return config('anavel-gettext.name');
    }

    public function routes()
    {
        return __DIR__.'/Http/routes.php';
    }

    public function mainRoute()
    {
        return route('anavel-gettext.edit');
    }

    public function hasSidebar()
    {
        return false;
    }

    public function sidebarMenu()
    {
        //return 'anavel-gettext::molecules.sidebar.default';
    }

    public function isActive()
    {
        $uri = Request::route()->uri();

        if (strpos($uri, 'gettext') !== false) {
            return true;
        }

        return false;
    }
}
