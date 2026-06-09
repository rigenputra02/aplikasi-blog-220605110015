<?php
namespace App\Providers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {

            $view->with(
                'kategoriSidebar',
                KategoriArtikel::withCount('artikel')
                    ->orderBy('nama_kategori')
                    ->get()
            );

            $view->with(
                'totalArtikel',
                Artikel::count()
            );

        });
    }
}
