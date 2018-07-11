<?php


namespace Webmagic\Dashboard;

use Collective\Html\FormBuilder;
use Collective\Html\HtmlServiceProvider;
use Webmagic\Dashboard\Commands\UpdateAssetData;
use Webmagic\Dashboard\Elements\Special\LogoLinkElement;
use Webmagic\Dashboard\Generators\ComponentGenerator;

class DashboardServiceProvider extends ServiceProvider
{

    /**
     * Path for config
     * @var string
     */
    protected $configPath = 'webmagic.dashboard.dashboard';


    /**
     * Boot
     */
    public function boot()
    {
        parent::boot();

        //Load Views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'dashboard');

        //publishes
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/webmagic/dashboard'),
            __DIR__ . '/public' => public_path('webmagic/dashboard'),
            __DIR__ . '/config' => config_path('webmagic/dashboard'),
        ], 'dashboard');

        $this->registerCommands();

        $this->willBeRemoved();

        //Load Routs
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
    }

    /**
     * Register console commands
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UpdateAssetData::class
            ]);
        }
    }

    /**
     * Register
     */
    public function register()
    {
        $this->app->register(HtmlServiceProvider::class);
        parent::register();

        $this->mergeConfigFrom(
            __DIR__ . '/config/dashboard.php', $this->configPath
        );

        $this->prepareDashboard();
    }

    /**
     * Prepare dashboard
     */
    protected function prepareDashboard()
    {
        $main_menu = $this->prepareMainMenu();
        $header_logo = $this->createLogoElement();
        $header_nav = $this->prepareHeaderNav();
        $content_header = '';
        $content = '';
        $footer = '';
        $title = $this->prepareTitle();

        $this->app->singleton(Dashboard::class, function () use (
            $main_menu,
            $header_logo,
            $header_nav,
            $content_header,
            $content,
            $footer,
            $title
        ) {
            return new Dashboard($main_menu, $header_logo, $header_nav, $content_header, $content, $footer, $title);
        });
    }

    /**
     * Creating logo based on config settings
     *
     * @return LogoLinkElement
     * @throws \Exception
     */
    protected function createLogoElement()
    {
        $header_logo_settings = config("$this->configPath.logo_settings");
        try {
            $logo_element = new LogoLinkElement($header_logo_settings);
        } catch (\Exception $e) {
            throw new \Exception('Error in creating LogoLinkElement. Invalid data for setup. Check config "logo_settings" ');
        }

        return $logo_element;
    }

    /**
     * Creating MainMenu with settings from config
     */
    protected function prepareMainMenu()
    {
        $menu_config = config("$this->configPath.menu_items_config");
        return new Components\Menus\MainMenu\MainMenu($menu_config);
    }

    protected function prepareHeaderNav()
    {
        $navBar = config("$this->configPath.header_navigation");
        return new Components\Menus\NavBarMenu\NavBarMenu($navBar);
    }


    protected function prepareTitle(){
        return config("$this->configPath.title");
}

    /**
     * Prepare global variable  $componentGenerator and  $form_builder for quick
     * form creating in a future will be deprecate this.
     */
    protected function willBeRemoved()
    {
        $form_builder = $this->app->make('form');
        $componentGenerator = app()->make(ComponentGenerator::class);

        //Share form_builder for all modules
        view()->share('form_builder', $form_builder);
        view()->share('component_generator', $componentGenerator);
    }
}