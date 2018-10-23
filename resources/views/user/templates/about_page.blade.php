<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    
    @include('user.templates.layouts.header')

    <title>KDot | About Us</title>
    
    
  </head>

  <!-- body classes:  -->
  <!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
  <!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
  <!-- "transparent-header": makes the header transparent and pulls the banner to top -->
  <!-- "gradient-background-header": applies gradient background to header -->
  <!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
  <body class="front-page">

    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">
      <!-- header-container start -->
      
        <!-- header-top start -->
        <!-- classes:  -->
        <!-- "dark": dark version of header top e.g. class="header-top dark" -->
        <!-- "colored": colored version of header top e.g. class="header-top colored" -->
        <!-- ================ -->

        @include('user.templates.layouts.customer_nav')
      <!-- header-container end -->
      <!-- banner start -->
      <!-- ================ -->
      <!-- <div class="banner dark-translucent-bg" style="background-image:url('images/page-about-banner-1.jpg'); background-position: 50% 27%;"> -->
        <!-- breadcrumb start -->
        <!-- ================ -->
        <div class="breadcrumb-container">
          <div class="container">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
              <li class="breadcrumb-item active">About Us</li>
            </ol>
          </div>
        </div>
        <!-- breadcrumb end -->
        <div class="container">
          <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
              <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                <!-- The  --> <span class="text-default">KDot</span> <!-- Shop. -->
              </h3>
              <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
              <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- banner end -->

      <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container padding-bottom-clear">

        <div class="container">
          <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">
              <h3 class="title">Who <strong>We Are</strong></h3>
              <div class="separator-2"></div>
              <div class="row">
                <div class="col-lg-6">
                  <p>KDot Fashion Shop started its business in 2017 owned by Khristyl Alyssa U. Cutaran. KDot offers the wide range of products in categories from apparel products to accesories, fashion, bags, shoes and gadgets.</p>
                  <p>It also offers multiple payment methods including Paypal, Palawan and PayMaya. The customer can choose the mode of delivery between LBC delivery or he can pick up the products he ordered at the actual store.Based in Santorini, Talamban, Cebu City.</p>
                </div>
                <div class="col-lg-6">
                  <div class="slick-carousel content-slider-with-controls">
                    <div class="overlay-container overlay-visible">
                      <img src='{{ asset("image/templates/page-about-1.jpg") }}' alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">We Can Do It</h3>
                        </div>
                      </div>
                      <a href='{{ asset("image/templates/page-about-1.jpg") }}' class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="overlay-container overlay-visible">
                      <img src='{{ asset("image/templates/page-about-2.jpg") }}' alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">You Can Trust Us</h3>
                        </div>
                      </div>
                      <a href='{{ asset("image/templates/page-about-2.jpg") }}' class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="overlay-container overlay-visible">
                      <img src='{{ asset("image/templates/page-about-3.jpg") }}' alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">We Love What We Do</h3>
                        </div>
                      </div>
                      <a href='{{ asset("image/templates/page-about-3.jpg") }}' class="slick-carousel--popup-img overlay-link" title="image title"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- main end -->

          </div>
        </div>

        <!-- section start -->
        <!-- ================ -->
        <div class="light-gray-bg pv-20 section mt-20">
          <div class="container">
            <h4 class="mb-20">Our <strong>Team</strong></h4>
            <div class="row grid-space-10">
              <div class="col-md-6 col-lg-3">
                <div class="image-box team-member style-2 shadow-2 bordered mb-20 text-center">
                  <div class="overlay-container overlay-visible">
                    <img src='{{ asset("storage/team/jrl.jpg") }}' alt="">
                    <div class="overlay-bottom">
                      <p class="small margin-clear">Team Member</p>
                    </div>
                  </div>
                  <div class="body">
                    <h3 class="margin-clear">Joshua Ligad</h3>
                    <small>Developer</small>
                    <div class="separator mt-10"></div>
                    <ul class="social-links circle colored margin-clear">
                      <li class="skype">
                        <a href="skype:joshua_ligad?userinfo">
                          <i class="fa fa-skype"></i>
                        </a>
                      </li>
                      <li class="facebook">
                        <a href="{{ url('https://fb.com/joshikawa') }}" target="_blank">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="googleplus">
                        <a href="#">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="image-box team-member style-2 shadow-2 bordered mb-20 text-center">
                  <div class="overlay-container overlay-visible">
                    <img src='{{ asset("storage/team/cmso.jpg") }}' alt="">
                    <div class="overlay-bottom">
                      <p class="small margin-clear">Team Member</p>
                    </div>
                  </div>
                  <div class="body">
                    <h3 class="margin-clear">Cherie Mae Ortega</h3>
                    <small>Developer</small>
                    <div class="separator mt-10"></div>
                    <ul class="social-links circle colored margin-clear">
                      <li class="skype">
                        <a href="skype:ortegacherie19?userinfo">
                          <i class="fa fa-skype"></i>
                        </a>
                      </li>
                      <li class="facebook">
                        <a href="{{ url('https://fb.com/cheriemae.ortega') }}" target="_blank">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="googleplus">
                        <a href="#">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="image-box team-member style-2 shadow-2 bordered mb-20 text-center">
                  <div class="overlay-container overlay-visible">
                    <img src='{{ asset("storage/team/ecp.jpg") }}' alt="">
                    <div class="overlay-bottom">
                      <p class="small margin-clear">Team Member</p>
                    </div>
                  </div>
                  <div class="body">
                    <h3 class="margin-clear">Elijah Pilones</h3>
                    <small>Developer</small>
                    <div class="separator mt-10"></div>
                    <ul class="social-links circle colored margin-clear">
                      <li class="skype">
                        <a href="skype:elijahpilones15?userinfo">
                          <i class="fa fa-skype"></i>
                        </a>
                      </li>
                      <li class="facebook">
                        <a href="{{ url('https://fb.com/elijahJek2') }}" target="_blank">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="googleplus">
                        <a href="#">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="image-box team-member style-2 shadow-2 bordered mb-20 text-center">
                  <div class="overlay-container overlay-visible">
                    <img src='{{ asset("storage/team/gmmt.jpg") }}' alt="">
                    <div class="overlay-bottom">
                      <p class="small margin-clear">Team Member</p>
                    </div>
                  </div>
                  <div class="body">
                    <h3 class="margin-clear">Gleza Mae Tudtud</h3>
                    <small>Developer</small>
                    <div class="separator mt-10"></div>
                    <ul class="social-links circle colored margin-clear">
                      <li class="skype">
                        <a href="skype:fbbf85624d790400?userinfo">
                          <i class="fa fa-skype"></i>
                        </a>
                      </li>
                      <li class="facebook">
                        <a href="{{ url('https://fb.com/gesshchamix') }}" target="_blank">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="googleplus">
                        <a href="#">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- section end -->

        <!-- section start -->
        <!-- ================ -->

        <!-- .subfooter end -->

      @include('user.templates.layouts.footer')
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->


  </body>
</html>
