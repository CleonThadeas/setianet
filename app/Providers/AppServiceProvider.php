<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Prevent some older MySQL index length issues
        Schema::defaultStringLength(191);

        // === SAFETY: only auto-migrate when explicitly enabled ===
        // Set AUTO_MIGRATE=true in Railway environment variables (only there)
        if (! env('AUTO_MIGRATE', false)) {
            Log::info('Auto migrate skipped: AUTO_MIGRATE not enabled.');
            return;
        }

        // Extra guards: only in production, not when running in console or in CI/GitHub Actions
        $isProduction = $this->app->environment('production');
        $isConsole   = $this->app->runningInConsole();
        $isCI        = env('GITHUB_ACTIONS') === 'true' || env('CI') === 'true';

        if (! $isProduction || $isConsole || $isCI) {
            Log::info('Auto migrate conditions not met (production / console / ci checks).', [
                'production' => $isProduction,
                'runningInConsole' => $isConsole,
                'ci' => $isCI,
            ]);
            return;
        }

        try {
            // Wait / retry a few times while DB becomes available (helps when app starts slightly before DB)
            $retries = 6;
            $connected = false;
            for ($i = 0; $i < $retries; $i++) {
                try {
                    DB::connection()->getPdo();
                    $connected = true;
                    break;
                } catch (\Exception $e) {
                    // sleep a bit then retry
                    sleep(2);
                }
            }

            if (! $connected) {
                Log::error('Auto migrate aborted: DB not reachable after retries.');
                return;
            }

            // Run migrations once (force because production)
            Artisan::call('migrate', ['--force' => true]);
            Log::info('Auto migrations ran successfully on production.');
        } catch (\Exception $e) {
            Log::error('Auto migration failed: ' . $e->getMessage());
        }
    }
}
