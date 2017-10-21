<?php
namespace Flickering;

use Illuminate\Cache\FileStore;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\FileLoader;
use Illuminate\Config\Repository as Config;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Bind the various Flickering classes to Laravel
 */
class FlickeringServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bindClasses();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('flickering');
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// CLASS BINDINGS /////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Bind the Rocketeer classes to the Container
     */
    public function bindClasses()
    {
        $this->app->singleton('flickering', function ($app) {
            return new Flickering($app);
        });
    }
}
