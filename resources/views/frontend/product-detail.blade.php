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
            <li>{{ $product->name }}</li>
        </ol>
    </div>
</div>

<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail white-bg ptb-90">
    <div class="container">
        <div class="row">
            <!-- Gambar Produk -->
            <div class="col-lg-4 col-md-6 mb-all-40">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <a data-fancybox="images" href="{{ asset('uploads/'.$product->image) }}">
<img src="{{ asset('storage/'.$product->image) }}"
     alt="{{ $product->name }}"
     class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Detail Produk -->
            <div class="col-lg-8 col-md-6">
                <div class="thubnail-desc fix">
                    <h3 class="product-header">{{ $product->name }}</h3>

                    <div class="pro-thumb-price mt-10">
                        <p class="d-flex align-items-center">
                            <span class="price">Rp {{ number_format($product->price,0,',','.') }}</span>
                        </p>
                    </div>

<div class="pro-desc-details">
    {!! $product->description !!}
</div>

                    <div class="quatity-stock mt-5">
                        <label>Quantity</label>
                        <ul class="d-flex flex-wrap align-items-center">
                            <li class="pro-ref">
                                @if($product->stock > 0)
                                    <p><span class="in-stock"><i class="ion-checkmark-round"></i> In stock ({{ $product->stock }})</span></p>
                                @else
                                    <p><span class="text-danger"><i class="ion-close-round"></i> Out of stock</span></p>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="mt-3">
                        <p>Kategori: {{ $product->category->name ?? '-' }}</p>
                        <p>Supplier: {{ $product->supplier->name ?? '-' }}</p>
                        <p>Kode Produk: {{ $product->kode_produk }}</p>
                        @if($product->expired_at)
                            <p>Expired: {{ $product->expired_at->format('d M Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Thumbnail End -->

@endsection
