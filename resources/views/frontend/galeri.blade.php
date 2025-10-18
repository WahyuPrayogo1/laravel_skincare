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

.galeri-area {
    padding: 60px 20px;
    background: #fff;
    text-align: center;
}

.galeri-area h3 {
    font-size: 28px;
    color: #7B7150;
    margin-bottom: 15px;
    font-weight: 600;
}

.galeri-area p {
    color: #555;
    font-size: 15px;
    margin-bottom: 40px;
}

.galeri-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.galeri-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.galeri-item img:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-area">
   <div class="container my-3">
        <ol class="breadcrumb-custom">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Galeri</li>
        </ol>
    </div>
</div>

<!-- Galeri Section -->
<div class="galeri-area">
    <div class="container">
        <h3>Galeri Kami</h3>
        <p>Kumpulan dokumentasi kegiatan, produk, dan momen berharga kami.</p>

        <div class="galeri-grid">
            <div class="galeri-item">
                <img src="{{ asset('uploads/galeri/foto1.jpg') }}" alt="Foto 1">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('uploads/galeri/foto2.jpg') }}" alt="Foto 2">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('uploads/galeri/foto3.jpeg') }}" alt="Foto 3">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('uploads/galeri/foto4.jpeg') }}" alt="Foto 4">
            </div>
        </div>
    </div>
</div>

@endsection
