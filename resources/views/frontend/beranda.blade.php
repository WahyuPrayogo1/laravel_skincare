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



@endsection
