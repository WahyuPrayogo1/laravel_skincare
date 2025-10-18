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
            <li>Tentang Kami</li>
        </ol>
    </div>
</div>

    <!-- About Us Area Start -->
    <div class="skill-area white-bg ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mb-all-40">
                        <!-- Section Title Start -->
                        <div class="about-title">
                            <h3>Tentang Kosmetik</h3>
                        </div>
                        <!-- Section Title End -->
                        <p class="mb-15">
                            <strong>Kosmetik</strong> hadir untuk membantu setiap wanita tampil percaya diri
                            dengan produk kecantikan berkualitas tinggi dan harga yang bersahabat.
                            Kami percaya bahwa setiap orang berhak merasa cantik dan nyaman dengan dirinya sendiri.
                        </p>
                        <p>
                            Dari skincare harian hingga makeup profesional, KosmetikAja selalu menghadirkan
                            produk terbaik dari brand lokal maupun internasional. Kami berkomitmen memberikan pelayanan
                            cepat, aman, dan terpercaya agar pengalaman belanjamu selalu menyenangkan.
                        </p>
                        {{-- <a class="login-btn" href="#">Selengkapnya</a> --}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="skill-content">
                        <div class="skill">
                            <div class="progress">
                                <div class="lead">Kualitas Produk</div>
                                <div style="width: 95%;" class="progress-bar"><span>95%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Pelayanan Pelanggan</div>
                                <div style="width: 90%;" class="progress-bar"><span>90%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Keamanan & Keaslian Produk</div>
                                <div style="width: 100%;" class="progress-bar"><span>100%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Kepuasan Pelanggan</div>
                                <div style="width: 93%;" class="progress-bar"><span>93%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
