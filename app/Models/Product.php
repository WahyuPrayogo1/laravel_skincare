<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','link_shopee','image', 'category_id', 'supplier_id', 'stock', 'price', 'expired_at','description','kode_produk','status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     protected $casts = [
        'expired_at' => 'datetime', // <-- tambahkan ini
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
