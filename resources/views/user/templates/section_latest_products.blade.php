<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <h2 class="text-center mt-4">Latest<strong> Arrival </strong></h2>
            <div class="separator"></div>
            <p class="large text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam voluptas facere vero ex tempora saepe perspiciatis ducimus sequi animi.</p>
        </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content clear-style">
        <div class="tab-pane active" id="pill-1">
            <div class="row grid-space-10">
                @foreach ($latest_products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="listing-item white-bg bordered mb-20">
                            <div class="overlay-container">
                                <img src='{{ asset("storage/$product->product_image") }}' alt="">
                                <a class="overlay-link popup-img-single" 
                                    href='{{ asset("storage/$product->product_image") }}'>
                                        <i class="fa fa-search-plus"></i>
                                </a>
                                <!--<span class="badge">30% OFF</span>-->
                                <div class="overlay-to-top links">
                                    <span class="small">
                                        <a href="/shop-productDetails" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
                                    </span>
                                </div>
                            </div>
                            <div class="body">
                                <h3>
                                    <a href="{{ url('/shop-productDetails/' .$product->product_id) }}">
                                        {{ $product->product_name }}
                                    </a>
                                </h3>
                                <p class="small">{{ $product->product_desc }}</p>
                                <div class="elements-list clearfix">
                                    <!--<span class="price"><del>$100.00</del>--> ₱{{ $product->unit_price }}</span>

                                {!! Form::open(['url'=>'/cart-add', 'method'=>'POST']) !!}

                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="pull-right margin-clear btn btn-sm btn-default-transparent btn-animated">Add To Cart<i class="fa fa-shopping-cart"></i></button>

                                {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- pills end -->
</div>