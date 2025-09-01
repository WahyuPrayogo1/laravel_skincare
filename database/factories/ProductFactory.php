<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Supplier;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'kode_produk' => $this->faker->unique()->bothify('PROD-#####'), // Format kode produk yang lebih realistis
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(10000, 500000), // Tanpa decimal
            'stock' => $this->faker->numberBetween(1, 100),
            'expired_at' => $this->faker->dateTimeBetween('now', '+2 years'),
            'category_id' => Category::factory(),
            'supplier_id' => Supplier::factory(),
            // Tambahkan field baru
            'image' => $this->faker->imageUrl(400, 300, 'products', true, 'Product Image'), // URL gambar dummy
            'link_shopee' => $this->faker->url(), // URL random untuk Shopee
        ];
    }
}
