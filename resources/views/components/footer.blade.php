<!-- Footer Area Start Here -->
<footer class="pb-35">
    <div class="container">
        <!-- Footer Middle Start -->
        <div class="footer-middle ptb-90">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-all-30">
                    <div class="single-footer">
                        <div class="footer-logo mb-20">
                            <a href="{{ url('/') }}">
                                <img class="img" src="{{ asset('frontend/img/logo/logo.webp') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <ul class="footer-list first-content">
                                <li><i class="pe-7s-map-marker"></i>Jl. Contoh No.123, Jakarta</li>
                                <li><i class="pe-7s-call"></i>+62 812 3456 7890</li>
                                <li><i class="pe-7s-clock"></i>Buka: 09.00 - 21.00 WIB</li>
                                <li class="mt-20">
                                    <ul class="social-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-lg-2 col-md-6 mb-all-30">
                    <div class="single-footer">
                        <h4 class="footer-title">Kategori</h4>
                        <div class="footer-content">
                            <ul class="footer-list">
                                @foreach($categories->take(5) as $cat)
                                    <li><a href="#">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-lg-2 col-md-6 mb-sm-30">
                    <div class="single-footer">
                        <h4 class="footer-title">Produk</h4>
                        <div class="footer-content">
                            <ul class="footer-list">
                                @foreach($latestProducts->take(5) as $prod)
                                    <li><a href="{{ route('product.show', $prod->id) }}">{{ $prod->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer">
                        <h4 class="footer-title">Berlangganan</h4>
                        <div class="footer-content subscribe-form">
                            <div class="subscribe-box">
                                <form action="#">
                                    <input type="text" id="subscribe_email" placeholder="Masukkan email Anda">
                                    <button type="submit" class="pe-7s-mail-open"></button>
                                </form>
                            </div>
                            <p class="mt-10">Dapatkan update produk terbaru & promo spesial langsung ke email Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Footer Middle End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom pt-35">
            <div class="col-md-12">
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-auto footer-copyright">
                        <p>&copy; {{ date('Y') }} <a href="{{ url('/') }}">TokoKosmetik</a>.
                            Dibuat dengan <i class="fa fa-heart text-danger"></i> oleh Tim Kami
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </div>
</footer>
<!-- Footer Area End Here -->
