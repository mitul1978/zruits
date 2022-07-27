@extends('layouts.app')
@section('content')
   <style>
    .spinner-wrapper 
             { 
               position: fixed; 
               z-index: 999999; 
               top: 0; right: 0; 
               bottom: 0; left: 0; 
               background: #fff; 
               opacity:0.6;
            } 
            .spinner 
            { 
              position: absolute; 
              top: 50%; 
              /* centers the loading animation vertically one the screen */ 
              left: 50%; 
              /* centers the loading animation horizontally one the screen */ 
              width: 3.75rem; 
              height: 1.25rem; 
              margin: -0.625rem 0 0 -1.875rem; 
              /* is width and height divided by two */ 
              text-align: center; 
            } 
            .spinner > div 
            {
               display: inline-block; 
               width: 1rem; 
               height: 1rem; 
               border-radius: 100%; 
               background-color: #4D4D4D; 
               -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
               animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
             } 
             .spinner .bounce1 
             { 
               -webkit-animation-delay: -0.32s; 
               animation-delay: -0.32s; 
             } 
             .spinner .bounce2         
             { 
               -webkit-animation-delay: -0.16s; 
               animation-delay: -0.16s; 
             }
             @-webkit-keyframes sk-bouncedelay 
             { 
               0%, 80%, 100% 
               { 
                 -webkit-transform: scale(0); 
               } 
               40% 
               { 
                 -webkit-transform: scale(1.0); 
               } 
             } 
             @keyframes  sk-bouncedelay 
             {
                0%, 80%, 100% 
                { 
                  -webkit-transform: scale(0); 
                  -ms-transform: scale(0); 
                  transform: scale(0); 
                } 
                40% 
                { 
                  -webkit-transform: scale(1.0); 
                  -ms-transform: scale(1.0); 
                  transform: scale(1.0); 
                } 
             }
    
    </style>
    
    <div class="spinner-wrapper" id="spinner-wrapper">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
<main class="main">
    <input type="hidden" name="pageValue" id="pageValue" value="{{ request()->has('offerValue') ? decrypt(request()->query('offerValue')) : 0 }}">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Customised Product</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <input type="hidden" name="product" id="product" value="{{@$product->slug}}">
            <input type="hidden" name="productType" id="productType" value="1">
            <div class="page-content" >
                <div class="container">
                <div class="product-details-top" id="loadAjax">
                <h2 class="title text-center mb-4">Customise your Bouquets</h2>


                <h6 class="text-center">Regular Flowers</h6>
                <div class="row mb-1">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                            data-owl-options='{
                                "touchDrag": true,
                                "mouseDrag":true,
                                "margin": 15,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "480": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "768": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "992": {
                                        "items":5,
                                        "nav": true
                                    },
                                    "1200": {
                                        "items":6,
                                        "nav": true
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20190725151801/elegant-red-roses_2.jpg">
                                <div class="f-box">
                                    <span>Red Roses</span>
                                    <span>₹10 Each</span>
                                </div> 
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://cdn.igp.com/f_auto,q_auto,t_pnopt8prodlp/products/p-pretty-peach-petals-basket-146812-m.jpg">
                                <div class="f-box">
                                    <span>Peach Roses</span>
                                    <span>₹12 Each</span>
                                </div> 
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20180725163618/sunshine-delight-vase-arrangement_1.jpg">
                                <div class="f-box">
                                    <span>Yellow Roses</span>
                                    <span>₹12 Each</span>
                                </div> 
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20190610174900/10-white-rose-bouquet_1.jpg">
                                <div class="f-box">
                                    <span>White Roses</span>
                                    <span>₹15 Each</span>
                                </div> 
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20180606180205/pink-roses-box-of-happiness_4.jpg">
                                <div class="f-box">
                                    <span>Pink Roses</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20210407062627/premium-orange-roses-arrangement_2.jpg">
                                <div class="f-box">
                                    <span>Orange Roses</span>
                                    <span>₹20 Each</span>
                                </div>                           
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://cdn.shopify.com/s/files/1/0591/1452/0785/products/luxe-rose-fresh-roses-in-a-crystal-vase-green-roses-fresh-roses-in-a-crystal-vase-green-roses-1-dozen-29127201128657_800x.jpg?v=1634951901">
                                <div class="f-box">
                                    <span>Green Roses</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20220520190341/blue-shade-roses-in-glass-vase_2.jpg">
                                <div class="f-box">
                                    <span>Blue Roses</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="text-center">Luxury Flowers</h6>
                <div class="row mb-1">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                            data-owl-options='{
                                "touchDrag": true,
                                "mouseDrag":true,
                                "margin": 15,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "480": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "768": {
                                        "items":4,
                                        "dots": true,
                                        "nav":false
                                    },
                                    "992": {
                                        "items":5
                                    },
                                    "1200": {
                                        "items":6
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20210718064611/mesmerising-orchids-bouquet_1.jpg">
                                <div class="f-box">
                                    <span>Orchids</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://cdn.igp.com/f_auto,q_auto,t_pnopt8prodlp/products/p-beautiful-assorted-gerberas-94058-m.jpg">
                                <div class="f-box">
                                    <span>Gerberas</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20180606123201/pink-admiration_2.jpg">
                                <div class="f-box">
                                    <span>Carnation</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="http://cdn.shopify.com/s/files/1/0581/1863/5701/products/French_Marigold_Strawberry_Blonde_Heirloom_Seeds-1__01714.1586169799_1200x1200.jpg">
                                <div class="f-box">
                                    <span>Marigold</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20220520190326/mesmerizing-roses-lilies-posy_2.jpg">
                                <div class="f-box">
                                    <span>Tulip</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20201229000918/fragrant-mix-of-lilies-in-fishbowl-vase_1.jpg">
                                <div class="f-box">
                                    <span>Lilies</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20201229000918/fragrant-mix-of-lilies-in-fishbowl-vase_1.jpg">
                                <div class="f-box">
                                    <span>Lilies</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                            <div class="f-con text-center">
                                <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20201229000918/fragrant-mix-of-lilies-in-fishbowl-vase_1.jpg">
                                <div class="f-box">
                                    <span>Lilies</span>
                                    <span>₹20 Each</span>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-5 offset-lg-2"> 
                        <h6 class="text-center">Base</h6>
                        <div class="row">
                        <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 15,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":4
                                    },
                                    "480": {
                                        "items":4
                                    },
                                    "768": {
                                        "items":4
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4
                                    },
                                    "1600": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                                <div class="f-con text-center">
                                    <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20180518122043/isle-of-white_1.jpg">
                                    <div class="f-box">
                                        <span>Glass Vase ₹500</span>
                                        <span>2 to 10 flowers</span>
                                    </div>
                                </div>  
                            
                                <div class="f-con text-center">
                                    <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20180606180150/enchanted-in-love_1.jpg   ">
                                    <div class="f-box">
                                        <span>Box with Ribbon ₹1000</span>
                                        <span>20 to 50 flowers</span>
                                    </div>
                                </div>  
                            
                                <div class="f-con text-center">
                                    <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20210111034637/red-roses-arrangement-with-you-me-forever-table-top_1.jpg">
                                    <div class="f-box">
                                        <span>Basket ₹1500</span>
                                        <span>20 to 100 flowers</span>
                                    </div>
                                </div>  
                            
                                <div class="f-con text-center">
                                    <img class="rounded-circle" src="https://www.fnp.com/images/pr/l/v20210111034637/red-roses-arrangement-with-you-me-forever-table-top_1.jpg">
                                    <div class="f-box">
                                        <span>Basket ₹1500</span>
                                        <span>20 to 100 flowers</span>
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="row  cform mt-1 d-lg-flex d-none">
                            <div class="col-md-6 text-center ">
                                <div class="mb-0" style="font-weight: 500;">Select Delivery Date</div>
                                <input type="date" value="2022-06-30">
                            </div>
                            <div class="col-md-6 text-center ">
                                <div class="mb-0" style="font-weight: 500;">Select Time</div>
                                <input type="time" class="pincodebox mb-0" placeholder="10 AM" maxlength="6">
                                <b class="text-danger small" style="font-size: 10px;font-weight: 500;line-height: 12px;display: block;padding: 4px 0;">8am - 10pm: ₹100, 10pm to 12am: ₹200.</b>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="pincodebox " placeholder="To" maxlength="14">
                            </div>
                            <div class="col-md-6">    
                                <input type="text" class="pincodebox " placeholder="From" maxlength="14">
                            </div>
                            <div class="col-md-12">
                                <textarea rows="3" style="height: 80px;" placeholder="Message (Max. 100 charatcher)" maxlength="100"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <form class="cform">
                            <h6 class="text-center">Customise Bouquets</h6>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Base</option>
                                    <option selected="">Glass Vase</option>
                                    <option>Box with Ribbon</option>
                                    <option>Baskets</option>
                                </select></div>
                                <div class="col-sm-2 px-1"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹500" disabled=""></div>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                    <select>
                                        <option>Select Regular Flower</option>
                                        <option>Red Roses</option>
                                        <option>Peach Roses</option>
                                        <option>Yellow Roses</option>
                                        <option>White Roses</option>
                                        <option>Pink Roses</option>
                                        <option>Orange Roses</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹100" disabled=""></div>
                            </div>

                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Regular Flower</option>
                                    <option>Red Roses</option>
                                    <option>Peach Roses</option>
                                    <option>Yellow Roses</option>
                                    <option>White Roses</option>
                                    <option>Pink Roses</option>
                                    <option>Orange Roses</option>
                                </select>
                                </div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹100" disabled=""></div>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Regular Flower</option>
                                    <option>Red Roses</option>
                                    <option>Peach Roses</option>
                                    <option>Yellow Roses</option>
                                    <option selected="">White Roses</option>
                                    <option>Pink Roses</option>
                                    <option>Orange Roses</option>
                                </select>
                                </div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹120" disabled=""></div>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Luxury Flower</option>
                                    <option>Orchids</option>
                                    <option>Gerberas</option>
                                    <option>Carnation</option>
                                    <option>Marigold</option>
                                    <option>Tulip</option>
                                    <option>Lilies</option>
                                </select></div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹140" disabled=""></div>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Luxury Flower</option>
                                    <option>Orchids</option>
                                    <option>Gerberas</option>
                                    <option>Carnation</option>
                                    <option>Marigold</option>
                                    <option>Tulip</option>
                                    <option>Lilies</option>
                                </select></div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹160" disabled=""></div>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-7 px-1">
                                <select>
                                    <option>Select Luxury Flower</option>
                                    <option>Orchids</option>
                                    <option>Gerberas</option>
                                    <option>Carnation</option>
                                    <option>Marigold</option>
                                    <option>Tulip</option>
                                    <option>Lilies</option>
                                </select></div>
                                <div class="col-sm-2 px-1"><input type="text" class="text-center" placeholder="Quantity" value="5"></div>
                                <div class="col-sm-3 px-1"><input type="text" class="text-center" placeholder="₹200" disabled=""></div>
                            </div>
                            <div class="row  cform mt-1 d-lg-none d-flex m-0">
                                <div class="col-md-6 text-center px-1">
                                    <div class="mb-0" style="font-weight: 500;">Select Delivery Date</div>
                                    <input type="date" value="2022-06-30">
                                </div>
                                <div class="col-md-6 text-center px-1">
                                    <div class="mb-0" style="font-weight: 500;">Select Time</div>
                                    <input type="time" class="pincodebox mb-0" placeholder="10 AM" maxlength="6">
                                    <b class="text-danger small" style="font-size: 10px;font-weight: 500;line-height: 12px;display: block;padding: 4px 0;">8am - 10pm: ₹100, 10pm to 12am: ₹200.</b>
                                </div>
                                <div class="col-md-6 px-1">
                                    <input type="text" class="pincodebox " placeholder="To" maxlength="14">
                                </div>
                                <div class="col-md-6 px-1">    
                                    <input type="text" class="pincodebox " placeholder="From" maxlength="14">
                                </div>
                                <div class="col-md-12 px-1">
                                    <textarea rows="3" style="height: 80px;" placeholder="Message (Max. 100 charatcher)"  maxlength="100"></textarea>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="col-sm-6 text-center">
                                    <b>Gross Total</b></div>
                                <div class="col-sm-4 offset-sm-2 text-center">
                                    <b style="margin-bottom: 0px;">₹1320</b>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="col-sm-6 text-center">
                                    <b>Delivary Charge</b></div>
                                <div class="col-sm-4 offset-sm-2 text-center">
                                <b style="margin-bottom: 0px;">₹200</b></div>
                            </div>
                            
                            <div class="d-flex align-items-center" style="font-size: 16px;">
                                <div class="col-sm-6 text-center text-primary">
                                    <b>Total: </b></div>
                                <div class="col-sm-4 offset-sm-2 text-center text-primary">
                                    <b style="margin-bottom: 0px;">₹1520</b>
                                </div>
                            </div>
                            <div class="product-details-action d-md-block d-none">
                                <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart mw-100 w-100 mt-1" style="height: 42px;">
                                <span class="product136">Add to cart</span>
                                </a>
                             </div>

                        </form>

                    </div> 
                    <div class="col-lg-2"></div>
                        
                    <div class="product-details-action d-md-none d-block w-100 mb-2 px-3">
                        <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart mw-100 w-100 mt-1" style="height: 42px;">
                        <span class="product136">Add to cart</span>
                        </a>
                    </div>
                </div>

                

                <div class="product-details-footer">
                    <div class="product-cat">
                        <span>Category:</span>
                        <a href="javascript:void(0);">Regular Flowers</a>
                    </div><!-- End .product-cat -->

                    <div class="social-icons social-icons-sm">
                        <span class="social-label">Share:</span>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Email" target="_blank"><i class="icon-envelope"></i></a>
                    </div>
                </div>
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Decription</h3>
                                    The world's most expensive rose is a 2006 variety by famed rose breeder David Austin that was christened Juliet. Breeding the rose took a total 15 years and cost 5 million dollars!
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Care Tips</h3>
                                    <ul>
                                        <li> When your flowers arrive, just trim the stems and add water. Re-cut 1-2” of the stems at a 45 degree angle.</li>
                                        <li> Use a clean vase and clean water.</li>
                                        <li> Remove the leaves below the water line but do not remove all leaves along the stem length.</li>
                                        <li> Check the water level daily and replenish as needed.</li>
                                        <li> Don’t place flowers in direct sunlight or near any other source of excessive heat.</li>
                                        <li> All flowers benefit from a daily mist of water.</li><li> Enjoy your flowers! </li>
                                    </ul>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->



<div class="row d-none">
    <div class="col-md-6">
        <div class="product-gallery product-gallery-vertical">
                                                
           
            <div class="row">
                <figure class="product-main-image">                                            
                    <img id="product-zoom" src="http://localhost:8000/images/products/207705601FA-10_B.avif" data-zoom-image="http://localhost:8000/images/products/207705601FA-10_B.avif" alt="Vibrant Yellow Rose Bouquet">
                    <a href="javascript:void(0);" id="btn-product-gallery" class="btn-product-gallery">
                        <i class="icon-arrows"></i>
                    </a>
                </figure><!-- End .product-main-image -->

                <div id="product-zoom-gallery" class="product-image-gallery">                                           
                    <a class="product-gallery-item active" href="javascript:void(0);" data-image="http://localhost:8000/images/products/207705601FA-10_B.avif" data-zoom-image="http://localhost:8000/images/products/207705601FA-10_B.avif">
                    <img src="http://localhost:8000/images/products/207705601FA-10_B.avif" alt="product side">
                    </a>
                    <a class="product-gallery-item" href="javascript:void(0);" data-image="http://localhost:8000/images/products/619779922FA-10_E.avif" data-zoom-image="http://localhost:8000/images/products/619779922FA-10_E.avif">
                    <img src="http://localhost:8000/images/products/619779922FA-10_E.avif" alt="product side">
                    </a>
                </div><!-- End .product-image-gallery -->
            </div><!-- End .row -->
        </div><!-- End .product-gallery -->
    </div><!-- End .col-md-6 -->

    <div class="col-md-6">
        <div class="product-details">
            <h1 class="product-title">Vibrant Yellow Rose Bouquet</h1><!-- End .product-title -->

            <div class="product-price">
                <span class="new-price">₹ 449</span>  <span class="old-price">₹ 499</span>  
            </div><!-- End .product-price -->

            <div class="product-content">
                
            </div><!-- End .product-content -->
             
            <div id="displayProdCount">                           
            </div><!-- End .details-filter-row -->
              
                <div class="details-filter-row details-row-size">
                    <label for="quantity">Qty:</label>
                    <div class="product-details-quantity">
                        <input type="number" id="quantity" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required="" style="display: none;"><div class="input-group  input-spinner"><div class="input-group-prepend"><button style="min-width: 26px" class="btn btn-decrement btn-spinner" type="button"><i class="icon-minus"></i></button></div><input type="text" style="text-align: center" class="form-control " required="" placeholder=""><div class="input-group-append"><button style="min-width: 26px" class="btn btn-increment btn-spinner" type="button"><i class="icon-plus"></i></button></div></div></div>
                    </div>
                </div><!-- End .details-filter-row -->
                

            <div class="details-filter-row details-row-size">
                <label id="availableContsu"></label>                                        
            </div><!-- End .details-filter-row -->

            <div class="product-details-action">
                <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="136"><span class="product136">Add to cart</span></a>
                <div class="details-action-wrapper">
                    <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="136" id="wishlist136">Add to Wishlist</a>                                                                
                </div><!-- End .details-action-wrapper -->
            </div><!-- End .product-details-action -->


            <div class="product-details-footer">
                <div class="product-desc-content">
                    <h3>Description</h3>
                    Are you in pursuit of a gift that can convey your heartfelt emotions to the recipient? If yes, then, grab this beautifully arranged bouquet of vibrant yellow roses that is sure to make your loved ones feel loved on any special occasion.
                </div>
                <div class="product-desc-content mb-0">
                    <h3>Care Instructions</h3>
                    <ul>
                        <li>The image displayed is indicative in nature.</li>
                        <li>Actual product may vary in shape or design as per the availability.</li>
                        <li>Flowers may be delivered in fully bloomed, semi-bloomed or bud stage.</li>
                    </ul>
                </div>
            </div>
            <div class="product-details-footer" style="border: 0;">
                <div class="product-cat">
                    <span>Category:</span>
                    <a href="javascript:void(0);">Customise Flowers</a>
                </div><!-- End .product-cat -->

                <div class="social-icons social-icons-sm">
                    <span class="social-label">Share:</span>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div>
            </div><!-- End .product-details-footer -->
        </div><!-- End .product-details -->
    </div><!-- End .col-md-6 -->
</div>

<div class="row d-none">
    
                    <div class="col-md-6">
        <div class="product-gallery product-gallery-vertical">
                                                
           
            <div class="row">
                <figure class="product-main-image">                                            
                    <img id="product-zoom" src="http://localhost:8000/images/products/207705601FA-10_B.avif" data-zoom-image="http://localhost:8000/images/products/207705601FA-10_B.avif" alt="Vibrant Yellow Rose Bouquet">
                    <a href="javascript:void(0);" id="btn-product-gallery" class="btn-product-gallery">
                        <i class="icon-arrows"></i>
                    </a>
                </figure><!-- End .product-main-image -->

                <div id="product-zoom-gallery" class="product-image-gallery">                                           
                                                                  
                                                                            <a class="product-gallery-item active" href="javascript:void(0);" data-image="http://localhost:8000/images/products/207705601FA-10_B.avif" data-zoom-image="http://localhost:8000/images/products/207705601FA-10_B.avif">
                                <img src="http://localhost:8000/images/products/207705601FA-10_B.avif" alt="product side">
                            </a>
                                                                                                                  
                                                                            <a class="product-gallery-item" href="javascript:void(0);" data-image="http://localhost:8000/images/products/619779922FA-10_E.avif" data-zoom-image="http://localhost:8000/images/products/619779922FA-10_E.avif">
                                <img src="http://localhost:8000/images/products/619779922FA-10_E.avif" alt="product side">
                            </a>
                                                                                                            </div><!-- End .product-image-gallery -->
            </div><!-- End .row -->
        </div><!-- End .product-gallery -->
    </div><!-- End .col-md-6 -->

    <div class="col-md-6">
        <div class="product-details">
            <h1 class="product-title">Vibrant Yellow Rose Bouquet</h1><!-- End .product-title -->

            <div class="product-price">
                <span class="new-price">₹ 449</span>  <span class="old-price">₹ 499</span>  
            </div><!-- End .product-price -->

            <div class="product-content">
                
            </div><!-- End .product-content -->
             
            <div id="displayProdCount">                           
            </div><!-- End .details-filter-row -->
              
                <div class="details-filter-row details-row-size">
                    <label for="quantity">Qty:</label>
                    <div class="product-details-quantity">
                        <input type="number" id="quantity" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required="" style="display: none;"></div>
                    </div>
                </div><!-- End .details-filter-row -->
                

            <div class="details-filter-row details-row-size">
                <label id="availableContsu"></label>                                        
            </div><!-- End .details-filter-row -->

            <div class="product-details-action">
                  
                 <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="136"><span class="product136">Add to cart</span></a>
                                                        <div class="details-action-wrapper">
                                                                    <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="136" id="wishlist136">Add to Wishlist</a>
                                                                
                </div><!-- End .details-action-wrapper -->
            </div><!-- End .product-details-action -->


            <div class="product-details-footer">
                <div class="product-desc-content">
                    <h3>Description</h3>
                    Are you in pursuit of a gift that can convey your heartfelt emotions to the recipient? If yes, then, grab this beautifully arranged bouquet of vibrant yellow roses that is sure to make your loved ones feel loved on any special occasion.
                </div>
                <div class="product-desc-content mb-0">
                    <h3>Care Instructions</h3>
                    <ul><li>The image displayed is indicative in nature.
</li><li>Actual product may vary in shape or design as per the availability.
</li><li>Flowers may be delivered in fully bloomed, semi-bloomed or bud stage.</li></ul>
                </div>
            </div>
            <div class="product-details-footer">
                <div class="product-cat">
                    <span>Category:</span>
                    <a href="javascript:void(0);">Regular Flowers</a>
                </div><!-- End .product-cat -->

                <div class="social-icons social-icons-sm">
                    <span class="social-label">Share:</span>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div>
            </div><!-- End .product-details-footer -->
        </div><!-- End .product-details -->
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->



                
<div class="container">
                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                                    
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">Hot</span>                                            <a href="http://localhost:8000/product/790">
                                                <img src="http://localhost:8000/images/products/1781477659Same-Day-11-B.avif" alt="Long Floor Length Flared Gown for Marriage and Party Functions" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="138" id="wishlist138"></a>
                                                                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->
                                          
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="http://localhost:8000/product/regular-flowers">Regular Flowers</a>
                                            </div><!-- End .product-cat -->
                                                                                            <div class="product-color row justify-content-center">  
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="8" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#000000;"></span></div>
                                                                </label>
                                                            </div>
                                                     
                                                </div><!-- End .product-cat -->
                                                                                        <h3 class="product-title"><a href="http://localhost:8000/product/790">Dozen Pink Roses Bouquet</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">₹ 539</span>   <span class="old-price">₹ 599</span>  
                                            </div><!-- End .product-price -->
                                            <div class="atc-container">                                        
                                                <div class="mb-0">                                    
                                                    <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="138"><span class="product138">Add to cart</span></a>
                                                </div>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">Hot</span>                                            <a href="http://localhost:8000/product/824">
                                                <img src="http://localhost:8000/images/products/166877141full-of-love-red-roses-box_1.webp" alt="Long Floor Length Flared Gown for Marriage and Party Functions" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="137" id="wishlist137"></a>
                                                                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->
                                          
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="http://localhost:8000/product/regular-flowers">Regular Flowers</a>
                                            </div><!-- End .product-cat -->
                                                                                            <div class="product-color row justify-content-center">  
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="8" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#000000;"></span></div>
                                                                </label>
                                                            </div>
                                                     
                                                </div><!-- End .product-cat -->
                                                                                        <h3 class="product-title"><a href="http://localhost:8000/product/824">Full Of Love Red Roses Box</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">₹ 1660</span>   <span class="old-price">₹ 2049</span>  
                                            </div><!-- End .product-price -->
                                            <div class="atc-container">                                        
                                                <div class="mb-0">                                    
                                                    <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="137"><span class="product137">Add to cart</span></a>
                                                </div>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>                                            <a href="http://localhost:8000/product/763">
                                                <img src="http://localhost:8000/images/products/4346069656-white-oriental-lilies-in-glass-vase_1.webp" alt="6 White Oriental Lilies in Glass Vase" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="139" id="wishlist139"></a>
                                                                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->
                                          
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="http://localhost:8000/product/luxury-flowers">Luxury Flowers</a>
                                            </div><!-- End .product-cat -->
                                                                                            <div class="product-color row justify-content-center">  
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="8" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#000000;"></span></div>
                                                                </label>
                                                            </div>
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="12" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#fffacd;"></span></div>
                                                                </label>
                                                            </div>
                                                     
                                                </div><!-- End .product-cat -->
                                                                                        <h3 class="product-title"><a href="http://localhost:8000/product/763">6 White Oriental Lilies in Glass Vase</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">₹ 2399</span>   <span class="old-price">₹ 2999</span>  
                                            </div><!-- End .product-price -->
                                            <div class="atc-container">                                        
                                                <div class="mb-0">                                    
                                                    <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="139"><span class="product139">Add to cart</span></a>
                                                </div>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">Hot</span>                                            <a href="http://localhost:8000/product/764">
                                                <img src="http://localhost:8000/images/products/1290319396vibrant-mixed-flowers-green-jar_3.webp" alt="Trendy Women Palazzo Pants In Georgettes , Chiffons and Chicken Fabrics" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="142" id="wishlist142"></a>
                                                                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->
                                          
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="http://localhost:8000/product/luxury-flowers">Luxury Flowers</a>
                                            </div><!-- End .product-cat -->
                                                                                            <div class="product-color row justify-content-center">  
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="8" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#000000;"></span></div>
                                                                </label>
                                                            </div>
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="27" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#002b5c;"></span></div>
                                                                </label>
                                                            </div>
                                                     
                                                </div><!-- End .product-cat -->
                                                                                        <h3 class="product-title"><a href="http://localhost:8000/product/764">Vibrant Mixed Flowers Green Jar</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">₹ 2999</span>   <span class="old-price">₹ 3749</span>  
                                            </div><!-- End .product-price -->
                                            <div class="atc-container">                                        
                                                <div class="mb-0">                                    
                                                    <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="142"><span class="product142">Add to cart</span></a>
                                                </div>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">Hot</span>                                            <a href="http://localhost:8000/product/825">
                                                <img src="http://localhost:8000/images/products/207705601FA-10_B.avif" alt="Vibrant Yellow Rose Bouquet" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                                                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="136" id="wishlist136"></a>
                                                                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->
                                          
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="http://localhost:8000/product/regular-flowers">Regular Flowers</a>
                                            </div><!-- End .product-cat -->
                                                                                            <div class="product-color row justify-content-center">  
                                                         
                                                            <div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="8" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:#000000;"></span></div>
                                                                </label>
                                                            </div>
                                                     
                                                </div><!-- End .product-cat -->
                                                                                        <h3 class="product-title"><a href="http://localhost:8000/product/825">Vibrant Yellow Rose Bouquet</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">₹ 449</span>   <span class="old-price">₹ 499</span>  
                                            </div><!-- End .product-price -->
                                            <div class="atc-container">                                        
                                                <div class="mb-0">                                    
                                                    <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="136"><span class="product136">Add to cart</span></a>
                                                </div>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div>
                       

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
                </div>
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <script>
            
        $(document).ready(function() 
        {  
           // $(this).magnificPopup();
            $('.spinner-wrapper').hide();

            $(document).on('click','.product-gallery-item', function()
            {  
               $('.product-gallery-item').removeClass('active');
               $(this).addClass('active');
               $('#product-zoom').attr('src',$(this).data('image'));
               //$('.zoomContainer').remove();
               $('.zoomWindow').css({
                   'background-image':'url(' + $(this).data('image') + ')',
               });
            });

            $(document).on('click','#btn-product-gallery', function(e)
            { 
                $('#product-zoom').elevateZoom({
                    gallery:'product-zoom-gallery',
                    galleryActiveClass: 'active',
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 400,
                    zoomWindowFadeOut: 400,
                    responsive: true
                });
                var ez = $('#product-zoom').data('elevateZoom');
                console.log(ez);
                if ( $.fn.magnificPopup ) 
                {
                    $.magnificPopup.open({
                        items: ez.getGalleryList(),
                        type: 'image',
                        gallery:{
                           enabled:true
                        },
                        fixedContentPos: false,
                        removalDelay: 600,
                        closeBtnInside: false
                    }, 0);

                    e.preventDefault();
                }
            });
           
        });  

           $(document).on('click','.colorOptions', function()
           {   
                $('.spinner-wrapper').show();
                var slug = $('#product').val();
                var colorId = $(this).val();
                $.ajax({
                            url:"/product/" + slug + '?colorId='+colorId,
                            type:"GET",
                            success:function(response)
                            {  
                               $('#loadAjax').empty().append(response);
                               $('.spinner-wrapper').hide();
                               $('.zoomContainer').remove();
                               $('#product-zoom').elevateZoom({
                                  zoomType : "inner",
                               });
                            }
                }); 
           }); 


           $(document).on('click','.changeProductSize', function()
           {  
                var id = $(this).data('id');
                var qty = $(this).data('stock');
                $('.stockLabel').hide();
                $('#dispalyAlert'+ id).show();
                $("#quantity").attr({
                "max" : qty, 
                "min" : 1
                });
           });    

           $(document).on('click','#toggle', function()
           {  
              var stats = $(this).is(':checked');
              console.log(stats);
              if(stats)
              {   
                  $('#sizeImage0').hide();
                  $('#sizeImage1').show();
              }
              else
              {
                  $('#sizeImage1').hide();
                  $('#sizeImage0').show();
              }
           });           
    </script>  
@endsection