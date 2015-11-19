<?php
namespace ANavallaSuiza\Adoadomin\Gettext;

use ANavallaSuiza\Adoadomin\Support\ModuleProvider;
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
        $this->loadViewsFrom(__DIR__.'/../views', 'adoadomin-gettext');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'adoadomin-gettext');

        /*$this->publishes([
            __DIR__.'/../public/js' => public_path('vendor/adoadomin-gettext/js'),
        ], 'assets');*/

        $this->publishes([
            __DIR__.'/../config/adoadomin-gettext.php' => config_path('adoadomin-gettext.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/adoadomin-gettext.php', 'adoadomin-gettext');

        $this->app->register('ANavallaSuiza\Crudoado\Providers\ViewComposersServiceProvider');
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
        return config('adoadomin-gettext.name');
    }

    public function routes()
    {
        return __DIR__.'/Http/routes.php';
    }

    public function mainRoute()
    {
        return route('adoadomin-gettext.edit');
    }

    public function hasSidebar()
    {
        return false;
    }

    public function sidebarMenu()
    {
        //return 'adoadomin-gettext::molecules.sidebar.default';
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
