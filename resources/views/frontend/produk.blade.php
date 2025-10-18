@extends('welcome')
@section('content')
<style>
.breadcrumb-custom {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    font-size: 12px;
    color: #cdcdcd;
}
.breadcrumb-custom li {
    margin-right: 5px;
}
.breadcrumb-custom li::after {
    content: "/";
    margin-left: 5px;
    color: #cdcdcd;
}
.breadcrumb-custom li:last-child::after {
    content: "";
}
.breadcrumb-custom a {
    color: #999;
    text-decoration: none;
}
.breadcrumb-custom a:hover {
    text-decoration: underline;
}
</style>
<!-- Breadcrumb -->
<div class="breadcrumb-area">
   <div class="container my-3">
        <ol class="breadcrumb-custom">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Produk</li>
        </ol>
    </div>
</div>

    <!-- New Arrival Products Start Here -->
    @if ($latestProducts->count() > 0)
        <div class="new-arrival no-border-style ptb-90">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <h2>Produk Terbaru</h2>
                    <p>Dapatkan koleksi terbaru kami minggu ini</p>
                </div>
                <!-- Section Title End -->

                <div class="our-pro-active owl-carousel">
                    @forelse ($latestProducts as $product)
                        <div class="single-makal-product">
                            <div class="pro-img">
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <span class="sticker-new">new</span>
                            </div>
                            <div class="pro-content">
                                <h5 class="pro-title">
                                    <a href="{{ route('product.show', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 product-price-rating">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center w-100">
                            <p class="text-muted">Belum ada produk terbaru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endif
    <!-- New Arrival Products End Here -->

    <div class="new-arrival no-border-style ptb-90">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2>Produk Best Seller</h2>
                <p>Dapatkan koleksi terbaru kami minggu ini</p>
            </div>
            <div class="our-pro-active owl-carousel">
                @forelse ($bestSellers as $product)
                    <div class="single-makal-product">
                        <div class="pro-img">
                            <a href="{{ route('product.show', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </a>
                            <span class="sticker-new">best</span>
                        </div>
                        <div class="pro-content">
                            <h5 class="pro-title">
                                <a href="{{ route('product.show', $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0 product-price-rating">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100">
                        <p class="text-muted">Belum ada produk best seller.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

@endsection
