<?php

namespace Modules\Translations\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Base\Services\Components\Base\Lang;
use Modules\Base\Services\Core\VILT;
use Modules\Translations\Console\InstallTranslation;

class TranslationsServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Translations';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'translations';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        VILT::registerTranslation(Lang::make('language_lines.sidebar')->label(__('Translations')));

        $this->registerConfig();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        VILT::loadResources($this->moduleName);


        $this->commands([
            InstallTranslation::class
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }
}