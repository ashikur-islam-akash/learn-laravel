<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $repos = [
                // 'Test',
        ];

        if (!empty($repos)) {
            foreach ($repos as $repo) {
                $this->app->bind("App\\Repositories\\{$repo}\\{$repo}Interface", "App\\Repositories\\{$repo}\\{$repo}Abstract");
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
