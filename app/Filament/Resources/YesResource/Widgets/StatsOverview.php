<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        return [
            // Total semua produk
            Card::make('Total Produk', Product::count())
                ->description('Semua produk skincare')
                ->color('success'),

            // Produk sudah expired
            Card::make(
                'Produk Sudah Expired',
                Product::whereDate('expired_at', '<', $today)->count()
            )
                ->description('Kadaluarsa (sebelum hari ini)')
                ->color('danger'),

            // Produk hampir expired ≤ 7 hari
            Card::make(
                'Produk Hampir Expired (≤ 7 Hari)',
                Product::whereDate('expired_at', '>=', $today)
                    ->whereDate('expired_at', '<=', Carbon::now('Asia/Jakarta')->addDays(7)->toDateString())
                    ->count()
            )
                ->description('Kadaluarsa dalam 7 hari')
                ->color('warning'),

            // Produk hampir expired 8–30 hari
            Card::make(
                'Produk Hampir Expired (8–30 Hari)',
                Product::whereDate('expired_at', '>', Carbon::now('Asia/Jakarta')->addDays(7)->toDateString())
                    ->whereDate('expired_at', '<=', Carbon::now('Asia/Jakarta')->addDays(30)->toDateString())
                    ->count()
            )
                ->description('Kadaluarsa 8–30 hari')
                ->color('secondary'),

            // Total kategori
            Card::make('Total Kategori', Category::count())
                ->description('Kategori produk skincare')
                ->color('primary'),

            // Total supplier
            Card::make('Total Supplier', Supplier::count())
                ->description('Partner Supplier')
                ->color('info'),

        ];
    }
}
