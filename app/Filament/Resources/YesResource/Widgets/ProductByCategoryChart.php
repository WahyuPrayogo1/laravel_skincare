<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ProductByCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Produk per Kategori';

    // (opsional) atur lebar di dashboard: 'full' | 'two-thirds' | 'half' | 'one-third'
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
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // bisa: 'bar', 'line', 'pie', 'doughnut', dll (Chart.js)
    }
}
