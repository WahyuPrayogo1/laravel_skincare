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

.contact-area {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
}

.contact-area h3 {
    font-size: 28px;
    color: #7B7150;
    margin-bottom: 15px;
    font-weight: 600;
}

.contact-area p {
    color: #555;
    font-size: 15px;
}

.contact-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 25px;
    background-color: #7B7150;
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.3s ease;
}
.contact-btn:hover {
    background-color: #3a3629;
    color: white;
}
.map-wrapper {
    width: 100%;
    height: 400px;
    border: none;
}
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-area">
   <div class="container my-3">
        <ol class="breadcrumb-custom">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Kontak Kami</li>
        </ol>
    </div>
</div>

<div class="goole-map">
    <iframe
        class="map-wrapper"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.244986336653!2d106.93414!3d-6.91915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68484a2a4681ef%3A0x261f558445241e0c!2sUniversitas%20Muhammadiyah%20Sukabumi!5e0!3m2!1sen!2sid!4v1729200000000!5m2!1sen!2sid"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>


<!-- Kontak Section -->
<div class="contact-area">
    <div class="container">
        <h3>Hubungi Kami</h3>
        <p>Ingin tahu lebih banyak tentang produk kami atau ingin bekerja sama?<br>
        Silakan hubungi kami langsung melalui WhatsApp di bawah ini.</p>
        <a href="https://wa.me/6281222535789" target="_blank" class="contact-btn">
            💬 Chat via WhatsApp
        </a>
    </div>
</div>

@endsection
