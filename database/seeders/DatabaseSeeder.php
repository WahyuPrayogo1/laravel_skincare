<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        UserSeeder::class,
    ]);

    // Buat 5 kategori
        $categories = Category::factory()->count(30)->create();

        // Buat 5 supplier
        $suppliers = Supplier::factory()->count(30)->create();

        // Buat 50 produk random
        Product::factory()->count(50)->create([
            'category_id' => fn () => $categories->random()->id,
            'supplier_id' => fn () => $suppliers->random()->id,
        ]);
    }
}
