<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

use Illuminate\Database\Eloquent\Collection;

class ExpiredProductNotification extends Mailable
{
    public $products;

    public function __construct(Collection $products) // <- pakai type-hint Collection
    {
        $this->products = $products;
    }

    public function build()
    {
        return $this->subject('Notifikasi Produk Hampir Expired')
                    ->view('emails.expired-products');
    }
}


