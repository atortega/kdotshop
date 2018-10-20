<div class="container">
    <div class="row justify-content-lg-center">
        <div class="col-lg-8">
            <h2 class="text-center mt-4">Featured <strong>Categories</strong></h2>
            <div class="separator"></div>
            <p class="lead text-center">Kdot’s fashion collections are complemented by these kinds of categories. The best and easy way for you to find the desired products that accomodate the things you do everyday without ever slowing you down.</p>
        </div>
    </div>
</div>
<div class="slick-carousel carousel-autoplay pl-10 pr-10">
    @foreach ($categories as $category)
        <div class="listing-item pl-10 pr-10 mb-20">
            <div class="overlay-container bordered overlay-visible">
                <img src="{{ URL::asset('image/templates/category-1.jpg') }}" alt="">
                <a class="overlay-link" href="#"><i class="fa fa-plus"></i></a>
                <div class="overlay-bottom">
                    <div class="text">
                        <h3 class="title">{{ $category->category_name }}</h3>
                        <div class="separator light"></div>
                        <p class="small margin-clear"><em>{{ $category->category_desc }}</em></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




</div>