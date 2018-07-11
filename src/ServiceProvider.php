<?php


namespace Webmagic\Dashboard;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Boot
     */
    public function boot()
    {
        //Load Views
        $this->loadViewsFrom(__DIR__.'\resources\views', 'dashboard');
    }

    public function register()
    {
//        $this->mergeConfigFrom(
//            __DIR__.'/config/dashboard.php', 'webmagic.dashboard'
//        );

        //Registering resources
//        $this->registerServiceProviders();
//        $this->registerCommands();


//        // Registering Dashboard functionality
//        $this->app->singleton('Dashboard', function(){
//            return new Dashboard();
//        });
    }
}