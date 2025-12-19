<?php

namespace App\Filament\Widgets;

use App\Models\BloodRequest;
use Filament\Widgets\ChartWidget;

class GrafikPermintaanDarah extends ChartWidget
{
    public static function canView(): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    /**
     * Judul widget (WAJIB pakai method di v4)
     */
    // protected function getHeading(): string
    // {
    //     return 'Permintaan Darah';
    // }

    protected ?string $heading = 'Permintaan Darah';

    /**
     * Jenis grafik (WAJIB di v4)
     */
    protected function getType(): string
    {
        return 'line';
        // opsi lain: bar, pie, doughnut
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Permintaan',
                    'data' => BloodRequest::selectRaw('count(*) as total')
                        ->groupByRaw('MONTH(created_at)')
                        ->pluck('total')
                        ->toArray(),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        ];
    }
}
