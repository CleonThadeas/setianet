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
        // Default string length (hindari error index panjang di beberapa MySQL)
        Schema::defaultStringLength(191);

        // Hanya jalankan auto-migrate:
        // - pada environment production
        // - saat aplikasi TIDAK sedang dijalankan dari console/CLI (mis. saat artisan di CI)
        // - dan hanya jika koneksi DB berhasil
        if ($this->app->environment('production') && ! $this->app->runningInConsole()) {
            try {
                // cek koneksi DB dulu (jika gagal akan melompat ke catch)
                DB::connection()->getPdo();

                // jalankan migrate sekali pakai (force karena production)
                Artisan::call('migrate', ['--force' => true]);

                Log::info('Auto migrations ran successfully on production.');
            } catch (\Exception $e) {
                // simpan error supaya kamu bisa lihat di storage/logs/laravel.log pada Railway
                Log::error('Auto migration failed: ' . $e->getMessage());
            }
        }
    }
}
