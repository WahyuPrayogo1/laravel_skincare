<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Produk Hampir Expired</title>
</head>
<body>
<h2>Daftar Produk Hampir / Sudah Expired</h2>
<ul>
    @foreach($products as $product)
        <li>
            {{ $product->name }} (Kode: {{ $product->kode_produk }})
            - Expired: {{ $product->expired_at->format('d M Y') }}
            @if($product->expired_at->isPast())
                <strong style="color:red;">[SUDAH EXPIRED]</strong>
            @endif
        </li>
    @endforeach
</ul>



</body>
</html>
