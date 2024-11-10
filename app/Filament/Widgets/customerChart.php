<?php

namespace App\Filament\Widgets;

use App\Models\BirthCertificate;
use Filament\Widgets\ChartWidget;

class BirthCertificateChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Sertifikat Kelahiran Bulanan';

    protected function getData(): array
    {
        // Mengambil data sertifikat kelahiran berdasarkan bulan
        $certificateData = BirthCertificate::selectRaw('MONTH(registration_date) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->get();

        // Menyusun data untuk chart
        $labels = $certificateData->pluck('bulan')->map(function ($bulan) {
            return date('F', mktime(0, 0, 0, $bulan, 10)); // Nama bulan
        })->toArray();

        $values = $certificateData->pluck('total')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Sertifikat Kelahiran',
                    'data' => $values,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Mengubah tipe chart menjadi bar
    }
}
