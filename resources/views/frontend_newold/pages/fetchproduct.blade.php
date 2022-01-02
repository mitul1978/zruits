 @if(isset($products) && count($products)>0)
                    @foreach($products as $key=>$product)
                  <div href="{{url('product/'.$product->slug)}}" class="grid-item shown" id="{{$product->id}}">
                     <div class="grid-item__container">
                        <div class="grid-item__bg" style="color: #18a6b6">
                        </div>
                        <div class="grid-item__visuals">
                          <a href="{{url('product/'.$product->slug)}}">
                           <img alt=""
                              src="{{asset($product->fullsheet_view)}}"
                              class="active grid-item__visuals-blue lazyload">
                          </a>
                        </div>
                        <h2 class="grid-item__title">
                          <a href="{{url('product/'.$product->slug)}}">
                            <div><span id="name_{{$product->id}}" class="grid-item__name">{{($product->product_texture)}}</span><span
                             id="names_{{$product->id}}" class="grid-item__color">{{$product->design}}</span>
                          </a>
                        </h2>
                        <div class="grid-item__weatherIcon">

                          @if(Session::has('email'))

                          @if(in_array($product->id, $wishl))
                           <a href="javascript:void(0);" class="btn btn-default btn-rounded wish" data-id="{{$product->id}}"><img id="wishlist" src="{{asset('frontend/images/redwishlist.png')}}"></a>
                          @else
                          <a href="javascript:void(0);" class="btn btn-default btn-rounded wish1" data-id="{{$product->id}}"><img id="wishlist" src="{{asset('frontend/images/wishlist.png')}}"></a>
                          @endif
                          @else
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-rounded wish1" data-id="{{$product->id}}"><img id="wishlist" src="{{asset('frontend/images/wishlist.png')}}"></a>
                          @endif
                        </div>
                        <div class="grid-item__price">
                           &#x20B9;{{$product->product_price}}*/ SHEET
                        </div>
                     </div>
                  </div>
                 @endforeach
               @endif