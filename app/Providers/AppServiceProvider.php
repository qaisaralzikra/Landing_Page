<?php

namespace App\Providers;

use App\Models\Daerah;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\ServiceProvider;

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
        Inertia::share([
            'daerahs' => function () {
                return Daerah::all();
            },

            'auth.user' => function () {
            return Auth::check() ? [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'role' => Auth::user()->role ?? 'User',
                // tambahkan lainnya jika perlu
            ] : null;
        },
        
        ]);
    }
}
