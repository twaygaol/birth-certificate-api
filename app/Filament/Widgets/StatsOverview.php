<?php

namespace App\Filament\Widgets;

use App\Models\BirthCertificate;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            // Menghitung total sertifikat kelahiran
            Stat::make('Total Sertifikat Kelahiran', BirthCertificate::count())
                ->description('Jumlah keseluruhan sertifikat kelahiran yang diterbitkan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            // Menambahkan statistik lain jika diperlukan
            Stat::make('Sertifikat Baru Bulan Ini', BirthCertificate::whereMonth('registration_date', now()->month)->count())
                ->description('Jumlah sertifikat kelahiran yang diterbitkan bulan ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([2, 4, 6, 8, 10, 12, 14, 16]),
        ];
    }
}
