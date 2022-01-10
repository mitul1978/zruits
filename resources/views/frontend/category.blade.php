@extends('layouts.app')
@section('content')

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Grid 3 Columns<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid 3 Columns</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-info">
                                        Showing <span>9 of 56</span> Products
                                    </div><!-- End .toolbox-info -->
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">
                                    <div class="toolbox-sort">
                                        <label for="sortby">Sort by:</label>
                                        <div class="select-custom">
                                            <select name="sortby" id="sortby" class="form-control">
                                                <option value="popularity" selected="selected">What's New</option>
                                                <option value="rating">Better Discount</option>
                                                <option value="date">Price: High to Low</option>
                                                <option value="date">Price: Low to High</option>
                                            </select>
                                        </div>
                                    </div><!-- End .toolbox-sort -->

                                </div><!-- End .toolbox-right -->
                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil skirt</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹60 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-sale">Sale</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-5.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Dresses</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Dark yellow lace cut out swing dress</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹84 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-out">Out of Stock</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-6.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Jackets</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Khaki utility boiler jumpsuit</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="out-price">₹120 <small>(MRP incl Taxes)</small></span>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Jeans</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹76 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-8.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Shoes</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Beige knitted elastic runner shoes</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹84 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-9.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Bags</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Orange saddle lock front chain cross body bag</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹84 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-top">Top</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-11.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Shoes</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Light brown studded Wide fit wedges</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹110 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-10.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Jumpers</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Yellow button front tea top</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹56 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-12.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                </div><!-- End .product-action-vertical -->

                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Bags</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Black soft RI weekend travel bag</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ₹68 <small>(MRP incl Taxes)</small>
                                                </div><!-- End .product-price -->
                                                <div class="atc-container">
                                                    
                                                <div class="mb-2">
                                                    <a href="#" class="btn-cart"><span>Add to cart</span></a>
                                                </div></div>
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item-total">of 6</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3 order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-clean">
                                    <label>Filters:</label>
                                    <a href="#" class="sidebar-filter-clear">Clean All</a>
                                </div><!-- End .widget widget-clean -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            Category
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-1">
                                                        <label class="custom-control-label" for="cat-1">Dresses</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">3</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-2">
                                                        <label class="custom-control-label" for="cat-2">T-shirts</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">0</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-3">
                                                        <label class="custom-control-label" for="cat-3">Bags</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">4</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-4">
                                                        <label class="custom-control-label" for="cat-4">Jackets</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">2</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-5">
                                                        <label class="custom-control-label" for="cat-5">Shoes</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">2</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-6">
                                                        <label class="custom-control-label" for="cat-6">Jumpers</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">1</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-7">
                                                        <label class="custom-control-label" for="cat-7">Jeans</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">1</span>
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cat-8">
                                                        <label class="custom-control-label" for="cat-8">Sportwear</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">0</span>
                                                </div><!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                            Size
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-2">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-1">
                                                        <label class="custom-control-label" for="size-1">XS</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-2">
                                                        <label class="custom-control-label" for="size-2">S</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                        <label class="custom-control-label" for="size-3">M</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                        <label class="custom-control-label" for="size-4">L</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-5">
                                                        <label class="custom-control-label" for="size-5">XL</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="size-6">
                                                        <label class="custom-control-label" for="size-6">XXL</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                            Colour
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-3">
                                        <div class="widget-body">
                                            <div class="filter-colors">
                                                <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                                <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                            </div><!-- End .filter-colors -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                            Brand
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-4">
                                        <div class="widget-body">
                                            <div class="filter-items">
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-1">
                                                        <label class="custom-control-label" for="brand-1">Next</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-2">
                                                        <label class="custom-control-label" for="brand-2">River Island</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-3">
                                                        <label class="custom-control-label" for="brand-3">Geox</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-4">
                                                        <label class="custom-control-label" for="brand-4">New Balance</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-5">
                                                        <label class="custom-control-label" for="brand-5">UGG</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-6">
                                                        <label class="custom-control-label" for="brand-6">F&F</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="brand-7">
                                                        <label class="custom-control-label" for="brand-7">Nike</label>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                            Price
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                <div class="filter-price-text">
                                                    Price Range:
                                                    <span id="filter-price-range"></span>
                                                </div><!-- End .filter-price-text -->

                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .filter-price -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection