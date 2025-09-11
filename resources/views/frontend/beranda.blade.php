@extends('welcome')

@section('content')
    <style>
        .pro-img img {
            width: 100%;
            height: 250px;
            /* kamu bisa sesuaikan tinggi */
            object-fit: cover;
            /* supaya gambar tetap proporsional dan tidak ketarik */
            border-radius: 8px;
            /* opsional, biar sudut agak rounded */
        }

        .single-categorie .cat-img img {
            width: 100%;
            height: 180px;
            /* atur tinggi sesuai kebutuhan */
            object-fit: cover;
            /* potong gambar biar proporsional */
            border-radius: 8px;
            /* opsional, biar ada sudut rounded */
        }

        .product-price-rating {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Pastikan tetap terlihat meskipun hover */
        .single-makal-product:hover .product-price-rating {
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
    <!-- Main Header Area End Here -->
    <!-- Slider Area Start -->
    <div class="slider-area slider-style-three">
        <!-- Slider Area Start Here -->
        <div class="slider-activation owl-carousel">
            <!-- Start Single Slide -->
            <div class="slide align-center-left fullscreen animation-style-01 bg-image-9">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content">
                                <h1>Eyeshadow Artist Terbaru</h1>
                                <h2>Palette 2025</h2>
                                <p>Temukan 5 shade highlighter edisi terbatas terbaru yang terinspirasi dari kilau
                                    dan keindahan mutiara di dasar lautan.</p>
                                <div class="slide-btn white-color">
                                    <a href="shop.html">Belanja Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->

            <!-- Start Single Slide -->
            <div class="slide align-center-left fullscreen animation-style-02 bg-image-10">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content">
                                <h1>Peremajaan Kolagen</h1>
                                <h2>Untuk Kulit Awet Muda</h2>
                                <p>Krim anti-aging dengan SYN-Coll, terbukti secara klinis membantu mengurangi kerutan
                                    hingga 354%. Kulit tampak lebih tebal, kencang, dan sehat.</p>
                                <div class="slide-btn white-color">
                                    <a href="shop.html">Belanja Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- Slider Area End Here -->
    </div>
    <!-- Slider Area End -->

    <!-- Categorie Slider Area Start Here -->
    <div class="categories-of-pro pt-20">
        <div class="container-fluid">
            <!-- Categorie Product Activation Start Here -->
            <div class="categorie-pro-active owl-carousel">
                @foreach ($category as $cat)
                    <div class="single-categorie">
                        <div class="cat-img">
                            <a href="#">
                                {{-- Kalau gambar kategori ada di storage --}}
                                <img src="{{ asset('storage/' . $cat->images) }}" alt="{{ $cat->name }}">
                            </a>
                            <div class="cat-content">
                                <a href="#">{{ $cat->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Categorie Product Activation End Here -->
        </div>
    </div>
    <!-- Categorie Slider Area End Here -->


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


    <!-- New Product Banner Start Here -->
    <div class="product-banner pro-border-style">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-sm-30">
                    <div class="single-banner">
                        <a href="shop.html">
                            <img src="{{ asset('frontend/img/banner/cosmetic/1-4.webp') }}" alt="banner-img">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-banner">
                        <a href="shop.html">
                            <img src="{{ asset('frontend/img/banner/cosmetic/1-5.webp') }}" alt="banner-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Banner End Here -->
@endsection
