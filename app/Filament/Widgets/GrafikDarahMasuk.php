<?php

namespace App\Filament\Widgets;

use App\Models\BloodInRecord;
use Filament\Widgets\ChartWidget;

class GrafikDarahMasuk extends ChartWidget
{
    public static function canView(): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    /**
     * Judul widget (WAJIB di Filament v4)
     */
    // protected function getHeading(): ?string
    // {
    //     return 'Darah Masuk';
    // }

    protected ?string $heading = 'Darah Masuk';

    /**
     * Jenis grafik (WAJIB di Filament v4)
     */
    protected function getType(): string
    {
        return 'bar';
        // bisa diganti: line, pie, doughnut
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Kantong Darah',
                    'data' => BloodInRecord::selectRaw('count(*) as total')
                        ->groupByRaw('MONTH(created_at)')
                        ->pluck('total')
                        ->toArray(),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        ];
    }
}
