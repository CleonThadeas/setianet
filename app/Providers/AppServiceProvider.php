<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log; // ⬅️ Tambahkan ini

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
        // Default string length (biar gak error di MySQL lama)
        Schema::defaultStringLength(191);

        // Jalankan migrate otomatis hanya di production Railway
        if (app()->environment('production')) {
            try {
                Artisan::call('migrate', ['--force' => true]);
                Log::info('Migration run successfully on production.');
            } catch (\Exception $e) {
                Log::error('Migration failed: ' . $e->getMessage());
            }
        }
    }
}
