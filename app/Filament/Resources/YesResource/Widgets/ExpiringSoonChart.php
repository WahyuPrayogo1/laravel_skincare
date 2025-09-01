<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class ExpiringSoonChart extends ChartWidget
{
    protected static ?string $heading = 'Hampir Expired (≤ 30 hari) per Kategori';

    protected int|string|array $columnSpan = 'two-thirds';

    protected function getData(): array
    {
        $cutoff = now()->addDays(30)->toDateString();

        // hitung total per kategori
        $rows = DB::table('products')
            ->select('category_id', DB::raw('COUNT(*) as total'))
            ->whereNotNull('expired_at')
            ->whereDate('expired_at', '<=', $cutoff)
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->get();

        $categoryNames = Category::whereIn('id', $rows->pluck('category_id'))
            ->pluck('name', 'id');

        $labels = [];
        $data   = [];

        foreach ($rows as $r) {
            $labels[] = $categoryNames[$r->category_id] ?? 'Tanpa Kategori';
            $data[]   = (int) $r->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Hampir Expired (≤30 hari)',
                    'data'  => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
