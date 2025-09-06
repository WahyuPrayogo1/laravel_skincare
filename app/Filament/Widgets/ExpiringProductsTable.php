<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Carbon\Carbon;

class ExpiringProductsTable extends BaseWidget
{
    protected static ?string $heading = 'Produk Hampir Kadaluarsa';

    protected int|string|array $columnSpan = 'full';

    public function table(Tables\Table $table): Tables\Table
    {
        $today    = Carbon::now('Asia/Jakarta')->toDateString();
        $cutoff7  = Carbon::now('Asia/Jakarta')->addDays(7)->toDateString();
        $cutoff30 = Carbon::now('Asia/Jakarta')->addDays(30)->toDateString();

        return $table
            ->query(
                Product::query()
                    ->whereNotNull('expired_at')
                    ->whereDate('expired_at', '>', $today)   // lebih dari hari ini
                    ->whereDate('expired_at', '<=', $cutoff30) // maksimal 30 hari
                    ->orderBy('expired_at', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('kode_produk')
                    ->label('Kode Produk')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Supplier')
                    ->default('-'),

                Tables\Columns\TextColumn::make('expired_at')
                    ->label('Tanggal Expired')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)
                        ->locale('id')
                        ->translatedFormat('d F Y'))
                    ->color(function ($state) use ($today, $cutoff7) {
                        if ($state <= $today) {
                            return 'danger'; // expired
                        } elseif ($state <= $cutoff7) {
                            return 'warning'; // ≤ 7 hari
                        }
                        return 'secondary'; // ≤ 30 hari
                    }),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(), // ❌ hanya hapus
            ])
            ->paginated([5, 10, 25]);
    }
}
