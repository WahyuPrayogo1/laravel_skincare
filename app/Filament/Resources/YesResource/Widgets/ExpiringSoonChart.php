<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class ExpiringSoonChart extends ChartWidget
{
    protected static ?string $heading = 'Produk Hampir Expired per Kategori';

    protected int|string|array $columnSpan = 'two-thirds';

    protected function getData(): array
    {
        $today    = Carbon::now('Asia/Jakarta')->toDateString();
        $cutoff7  = Carbon::now('Asia/Jakarta')->addDays(7)->toDateString();
        $cutoff30 = Carbon::now('Asia/Jakarta')->addDays(30)->toDateString();

        // Ambil semua kategori supaya label konsisten
        $categoryNames = Category::pluck('name', 'id');

        $labels = $categoryNames->values()->toArray();
        $data7  = [];
        $data30 = [];

        foreach ($categoryNames as $catId => $catName) {
            // Produk expired ≤ 7 hari
            $count7 = DB::table('products')
                ->where('category_id', $catId)
                ->whereNotNull('expired_at')
                ->whereDate('expired_at', '>=', $today)
                ->whereDate('expired_at', '<=', $cutoff7)
                ->count();

            // Produk expired 8–30 hari
            $count30 = DB::table('products')
                ->where('category_id', $catId)
                ->whereNotNull('expired_at')
                ->whereDate('expired_at', '>', $cutoff7)
                ->whereDate('expired_at', '<=', $cutoff30)
                ->count();

            $data7[]  = $count7;
            $data30[] = $count30;
        }

        return [
            'datasets' => [
                [
                    'label' => '≤ 7 Hari',
                    'data'  => $data7,
                    'backgroundColor' => '#facc15', // kuning
                ],
                [
                    'label' => '8–30 Hari',
                    'data'  => $data30,
                    'backgroundColor' => '#f87171', // merah
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bisa diganti 'line' atau 'doughnut'
    }

    protected function getOptions(): array
{
    return [
        'scales' => [
            'y' => [
                'ticks' => [
                    'display' => false, // hilangkan angka di sumbu Y
                ],
                'grid' => [
                    'drawTicks' => false, // jangan gambar garis kecil di bawah angka
                    'display' => true,    // grid line tetap tampil
                ],
            ],
        ],
    ];
}

}
