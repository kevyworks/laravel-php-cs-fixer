<?php

namespace Kevyworks\LaravelPhpCsFixer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

    /**
     * Bootstrap the application services and publishes it's configuration.
     *
     * @return void
     */
    public function boot() {
        // Publish configuration.
        $this->publishes([__DIR__ . '/config/.php-cs' => base_path('.php-cs')], 'php-cs-fixer-config');

        // Register helpers file.
        require __DIR__ . '/helpers.php';

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\PhpCsFixerVersion::class,
                Console\PhpCsFixerDescribe::class,
                Console\PhpCsFixerFix::class,
            ]);
        }
    }

}
