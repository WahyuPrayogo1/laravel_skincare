<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\Page;
use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Filament\Notifications\Notification;

class ImportProducts extends Page
{
    protected static string $resource = ProductResource::class;
    protected static string $view = 'filament.resources.product-resource.pages.import-products';

    public $imported = 0;
    public $errors = [];

public function import(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt'
    ]);

    $file = $request->file('csv_file');
    $csv = Reader::createFromPath($file->getRealPath(), 'r');
    $csv->setHeaderOffset(0);

    $imported = 0;
    $errors = [];

    foreach ($csv->getRecords() as $index => $record) {
        try {
            if (empty($record['Name']) || empty($record['Kode Produk'])) {
                $errors[] = "Baris " . ($index + 2) . ": Name dan Kode Produk wajib diisi";
                continue;
            }

            $category = Category::firstOrCreate(['name' => $record['Category']]);
            $supplier = Supplier::firstOrCreate(['name' => $record['Supplier']]);
            $price = (float) preg_replace('/[^0-9]/', '', $record['Price']);

            Product::updateOrCreate(
                ['kode_produk' => $record['Kode Produk']],
                [
                    'name' => $record['Name'],
                    'description' => $record['Description'] ?? '',
                    'category_id' => $category->id,
                    'supplier_id' => $supplier->id,
                    'price' => $price,
                    'expired_at' => $record['Expired Date'],
                ]
            );

            $imported++;
        } catch (\Exception $e) {
            $errors[] = "Baris " . ($index + 2) . ": " . $e->getMessage();
        }
    }

    return redirect()->back()
        ->with('imported', $imported)
        ->with('errors', $errors);
}

    public function downloadTemplate()
    {
        $content = "Name,Kode Produk,Description,Category,Supplier,Price,Expired Date\n" .
                  "Sample Product,PROD001,Deskripsi,Skincare,Supplier A,100000,2024-12-31";

        return response($content)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="template-import.csv"');
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(ProductResource::getUrl('index'))
                ->color('secondary'),
        ];
    }
}
