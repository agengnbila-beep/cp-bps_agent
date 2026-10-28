<?php

namespace App\Filament\Widgets;

use App\Models\LogPercakapan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatChart extends ChartWidget
{
    protected ?string $heading = 'Tren Pesan Masuk (7 Hari Terakhir)';
    protected static ?int $sort = 1; // Tampil paling atas

    protected function getData(): array
    {
        // Ambil data 7 hari terakhir
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $logs = LogPercakapan::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total')
        )
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        $labels = [];
        $data = [];

        // Looping untuk mengisi tanggal yang kosong dengan angka 0
        for ($i = 0; $i <= 6; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $dateString = $currentDate->format('Y-m-d');
            
            $labels[] = $currentDate->format('d M'); // Contoh: 24 Oct
            
            $found = $logs->firstWhere('date', $dateString);
            $data[] = $found ? $found->total : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pesan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)', // Biru transparan
                    'borderColor' => '#3b82f6', // Garis biru
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4, // Membuat garis melengkung (smooth)
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Bisa diganti 'bar' jika ingin grafik batang
    }
}