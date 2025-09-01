<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Produk', Product::count())
                ->description('Semua produk skincare')
                ->color('success'),

            Card::make('Produk Hampir Expired', Product::where('expired_at', '<=', now()->addDays(30))->count())
                ->description('Kadaluarsa ≤ 30 hari')
                ->color('danger'),

            Card::make('Total Kategori', Category::count())
                ->description('Kategori produk skincare')
                ->color('primary'),

            Card::make('Total Supplier', Supplier::count())
                ->description('Partner Supplier')
                ->color('info'),
        ];
    }
}
