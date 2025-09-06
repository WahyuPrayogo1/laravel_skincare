<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\BadgeColumn;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('status')
    ->label('Status Produk')
    ->options([
        'new' => 'Produk Baru',
        'best_seller' => 'Best Seller',
    ])
    ->default('normal')
    ->required(),

                Forms\Components\TextInput::make('kode_produk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'blockquote',
                        'link',
                        'bulletList',
                        'numberedList',
                    ]),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Forms\Components\DatePicker::make('expired_at')
                    ->label('Expired Date')
                    ->required(),
                // Tambahkan field image
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image()
                    ->directory('products')
                    ->maxSize(2048) // 2MB
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('300')
                    ->imageResizeTargetHeight('300')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->helperText('Maksimal 2MB. Format: JPG, PNG'),
                // Tambahkan field link_shopee
                Forms\Components\TextInput::make('link_shopee')
                    ->label('Link Shopee')
                    ->url()
                    ->maxLength(255)
                    ->helperText('Masukkan link produk Shopee'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Tambahkan kolom image
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),
                   BadgeColumn::make('status')
    ->formatStateUsing(fn (string $state): string => match ($state) {
        'new' => 'Terbaru',
        'best_seller' => 'Best Seller',
        default => 'Tidak diketahui',
    })
    ->colors([
        'success' => 'new',
        'warning' => 'best_seller',
    ]),


                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('kode_produk')
                    ->label('Kode Produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable()
                    ->label('Harga'),
                Tables\Columns\TextColumn::make('expired_at')
                    ->date('d M Y')
                    ->label('Kedaluwarsa'),
                // Tambahkan kolom link_shopee
                Tables\Columns\TextColumn::make('link_shopee')
                    ->label('Link Shopee')
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            return new HtmlString('<a href="' . $state . '" target="_blank" class="text-primary-600 hover:text-primary-800">Lihat di Shopee</a>');
                        }
                        return '-';
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export Excel')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success'),
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Export Selected')
                    ->icon('heroicon-o-document-arrow-down'),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
