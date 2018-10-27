<div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h2 class="mt-4">Top <strong>Sellers</strong></h2>
        </div>
          
        <!-- Tab panes -->
        <div class="tab-content clear-style">
            <div class="tab-pane active" id="pill-1">
                <div class="row grid-space-10">
                    @foreach ($top_sellers as $top_seller)
                        <div class="col-lg-6">
                            <div class="listing-item bordered light-gray-bg mb-20">
                                <div class="row grid-space-0">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="overlay-container">
                                            <img src='{{ asset("storage/$top_seller->product_image") }}'
                                                style="margin: auto; max-height: 141px;"
                                                onerror="this.onerror=null;
                                                this.src='storage/products/default-product-image.jpg'"/>
                                            <a class="overlay-link popup-img-single" href="/storage/{{ $top_seller->product_image }}"><i class="fa fa-search-plus"></i></a>
                                            <!--<span class="badge">30% OFF</span>-->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-8 col-xl-9">
                                        <div class="body">
                                            <h3 class="margin-clear">
                                                <a href='{{ asset("/shop-productDetails/$top_seller->product_id") }}'>
                                                    {{ $top_seller->product_name }}
                                                </a>
                                            </h3>
                                           
                                            <p class="small">{{ $top_seller->product_desc }}</p>
                                            <div class="elements-list clearfix">
                                                <span class="price" style="color: #ff87c3;"><!--<del>$100.00</del>--> 
                                                    ₱ {{ $top_seller->unit_price }}
                                                </span>

                                               <!--  {!! Form::open(['url'=>'/cart-add', 'method'=>'POST']) !!}

                                                <input type="hidden" name="product_id" value="{{ $top_seller->product_id }}">
                                                <input type="hidden" name="qty" value="1">
                                                <button type="submit" class="pull-right margin-clear btn btn-sm
                                                    btn-default-transparent btn-animated">
                                                    Add To Cart<i class="fa fa-shopping-cart"></i>
                                                </button>

                                                {!! Form::close()!!} -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>


        </div>
        <!-- pills end -->
        <!-- Tab panes -->

    </div>
</div>