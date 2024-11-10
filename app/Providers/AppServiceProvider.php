<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use App\Filament\Resources\DomisiliResource;
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
        // Register navigation groups for Filament
        Filament::registerNavigationGroups([
            NavigationGroup::make()
                ->label('Data pendaftar akta kelahiran')
                ->icon('heroicon-o-folder')
                ->items([
                    DomisiliResource::class,
                ]),
        ]);
    }
}
