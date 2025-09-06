<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ProductByCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Produk per Kategori';

    protected int|string|array $columnSpan = 'one-third';

    protected function getData(): array
    {
        $rows = Category::withCount('products')
            ->orderByDesc('products_count')
            ->get();

        $labels = $rows->pluck('name')->all();
        $data   = $rows->pluck('products_count')->all();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data'  => $data,
                    'backgroundColor' => [
                        '#60a5fa', // biru
                        '#34d399', // hijau
                        '#fbbf24', // kuning
                        '#f87171', // merah
                        '#a78bfa', // ungu
                        '#f472b6', // pink
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // bisa: 'bar', 'line', 'doughnut', dll
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,   // tampilkan legend di bawah chart
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'y' => [
                    'ticks' => [
                        'display' => false, // hilangkan angka sumbu Y (kalau bukan pie)
                    ],
                ],
                'x' => [
                    'ticks' => [
                        'display' => false, // hilangkan angka sumbu X (kalau bukan pie)
                    ],
                ],
            ],
        ];
    }
}
