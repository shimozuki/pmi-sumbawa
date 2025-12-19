<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data darah masuk per bulan (tahun ini)
        $rawData = DB::table('blood_requests')
            ->select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'bulan');

        $months = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        $chartLabels = [];
        $chartData   = [];

        foreach ($months as $num => $name) {
            $chartLabels[] = $name;
            $chartData[]   = $rawData[$num] ?? 0;
        }

        return view('welcome', [
            'chartLabels' => $chartLabels,
            'chartData'   => $chartData,
        ]);
    }
}
