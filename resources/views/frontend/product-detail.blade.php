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
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
       <div class="container my-3">
    <ol class="breadcrumb-custom">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Product Details</li>
    </ol>
</div>


    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail white-bg ptb-90">
        <div class="container">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-4 col-md-6 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="thumb1" role="tabpanel" aria-labelledby="thumb1-tab">
                            <a data-fancybox="images" href="img/products/cosmetic/1.webp"><img
                                    src="img/products/cosmetic/1.webp" alt="product-view"></a>
                        </div>
                        <div class="tab-pane fade" id="thumb2" role="tabpanel" aria-labelledby="thumb2-tab">
                            <a data-fancybox="images" href="img/products/cosmetic/2.webp"><img
                                    src="img/products/cosmetic/2.webp" alt="product-view"></a>
                        </div>
                        <div class="tab-pane fade" id="thumb3" role="tabpanel" aria-labelledby="thumb3-tab">
                            <a data-fancybox="images" href="img/products/cosmetic/3.webp"><img
                                    src="img/products/cosmetic/3.webp" alt="product-view"></a>
                        </div>
                        <div class="tab-pane fade" id="thumb4" role="tabpanel" aria-labelledby="thumb4-tab">
                            <a data-fancybox="images" href="img/products/cosmetic/4.webp"><img
                                    src="img/products/cosmetic/4.webp" alt="product-view"></a>
                        </div>
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <ul class="thumb-menu owl-carousel nav tabs-area nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="thumb1-tab" data-bs-toggle="tab"
                                    data-bs-target="#thumb1" type="button" role="tab" aria-controls="thumb1"
                                    aria-selected="true">
                                    <img src="img/products/cosmetic/1.webp" alt="product-thumbnail">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="thumb2-tab" data-bs-toggle="tab" data-bs-target="#thumb2"
                                    type="button" role="tab" aria-controls="thumb2" aria-selected="false">
                                    <img src="img/products/cosmetic/2.webp" alt="product-thumbnail">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="thumb3-tab" data-bs-toggle="tab" data-bs-target="#thumb3"
                                    type="button" role="tab" aria-controls="thumb3" aria-selected="false">
                                    <img src="img/products/cosmetic/3.webp" alt="product-thumbnail">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="thumb4-tab" data-bs-toggle="tab" data-bs-target="#thumb4"
                                    type="button" role="tab" aria-controls="thumb4" aria-selected="false">
                                    <img src="img/products/cosmetic/4.webp" alt="product-thumbnail">
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-8 col-md-6">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">New Look eye Material</h3>
                        <ul class="rating-summary">
                            <li class="rating-pro">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </li>
                            <li class="read-review"><a href="#">read reviews (1)</a></li>
                            <li class="write-review"><a href="#">write review</a></li>
                        </ul>
                        <div class="pro-thumb-price mt-10">
                            <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span
                                    class="price">$15.19</span><span class="saving-price">-5%</span></p>
                        </div>
                        <p class="pro-desc-details">Faded short sleeves t-shirt with high neckline. Soft and
                            stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready
                            for summer!</p>

                        <div class="quatity-stock mt-5">
                            <label>Quantity</label>
                            <ul class="d-flex flex-wrap  align-items-center">
                                <li class="box-quantity">
                                    <form action="#">
                                        <input class="quantity" type="number" min="1" value="1"
                                            min="1">
                                    </form>
                                </li>
                                <li>
                                    <button class="pro-cart">add to cart</button>
                                </li>
                                <li class="pro-ref">
                                    <p><span class="in-stock"><i class="ion-checkmark-round"></i> in stock</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="social-sharing mt-30">
                            <ul>
                                <li><label>share</label></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->

    <!-- New Arrival Products Start Here -->
    <div class="new-arrival no-border-style ptb-90">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2>Related Products</h2>
                <p>Add our new arrivals to your weekly lineup</p>
            </div>
            <!-- Section Title End -->
            <div class="our-pro-active owl-carousel">
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/1.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Modern Eye Brush</a>
                        </h4>
                        <p>
                            <span class="price">$45.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/4.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <span class="sticker-sale">-5%</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Fusion facial cream</a>
                        </h4>
                        <p>
                            <span class="price">$72.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/6.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <span class="sticker-sale">-5%</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Field Messenger</a>
                        </h4>
                        <p>
                            <span class="price">$55.50</span>
                            <span class="prev-price">$59.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/10.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <span class="sticker-sale">-5%</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Field Messenger</a>
                        </h4>
                        <p>
                            <span class="price">$55.50</span>
                            <span class="prev-price">$59.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/11.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <span class="sticker-sale">-5%</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Field Messenger</a>
                        </h4>
                        <p>
                            <span class="price">$55.50</span>
                            <span class="prev-price">$59.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
                <!-- Single Product Start Here -->
                <div class="single-makal-product">
                    <div class="pro-img">
                        <a href="product-details.html">
                            <img src="img/products/cosmetic/9.webp" alt="product-img">
                        </a>
                        <span class="sticker-new">new</span>
                        <span class="sticker-sale">-5%</span>
                        <div class="quick-view-pro">
                            <a data-bs-toggle="modal" data-bs-target="#product-window" class="quick-view"
                                href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <h4 class="pro-title">
                            <a href="product-details.html">Field Messenger</a>
                        </h4>
                        <p>
                            <span class="price">$55.50</span>
                            <span class="prev-price">$59.50</span>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                    data-original-title="Add to Cart">Add To Cart</a>
                            </div>
                            <div class="actions-secondary">
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product End Here -->
            </div>
        </div>
    </div>
@endsection
