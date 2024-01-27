@extends('frontend.main_master')

@section('title')
  Easy Online Shop - Home
@endsection

@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('frontend.common.vertical_menu')
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

              <div class="item">
                <div class="products special-product">
                  {{-- Special Offer --}}
                  @foreach($specialOffer as $row)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"> <img src="{{ asset(@$row->product_thambnail) }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                  </div>
                  @endforeach
                  {{-- End Special Offer --}}

                </div>
              </div>

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 



        <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('frontend.common.product_tags')
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 



        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


              <div class="item">
                <div class="products special-product">
                  {{-- Special Deals --}}
                  @foreach($specialDeals as $row)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"> <img src="{{ asset(@$row->product_thambnail) }}"  alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                  </div>
                  @endforeach
                  {{-- End Special Deals --}}
                </div>
              </div>


            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member3.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member2.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @foreach($sliders as $row)
            <div class="item" style="background-image: url('{{ asset(@$row->slider_image) }}');">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  {{-- <div class="slider-header fadeInDown-1">Top Brands</div> --}}
                  <div class="big-text fadeInDown-1"> @if(session()->get('language') == 'bangla') {{ @$row->title_bn }} @else {{ @$row->title_en }} @endif </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>@if(session()->get('language') == 'bangla') {{ @$row->description_bn }} @else {{ @$row->description_en }} @endif </span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            @endforeach     

          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if(session()->get('language') == 'bangla') সব @else All @endif</a></li>
              {{-- Category Name --}}
              @foreach($categories as $row)
              <li><a data-transition-type="backSlide" href="#category{{ @$row->id }}" data-toggle="tab">@if(session()->get('language') == 'bangla') {{ @$row->category_name_bn }} @else {{ @$row->category_name_en }} @endif</a></li>
              @endforeach
              {{-- End Category Name --}}

              {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
            </ul>
            <!-- /.nav-tabs --> 
          </div>


          <div class="tab-content outer-top-xs">

            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  {{-- All Products --}}
                  @foreach($products as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @php
                            $amount = $row->selling_price - $row->discount_price;
                            $discount = ($amount/$row->selling_price) * 100;
                          @endphp

                          @if($row->discount_price == null)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if($row->discount_price == null)
                          <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">

                              <li class="add-cart-button btn-group">
                                <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('{{ @$row->id }}')"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>

                              <li class="wishlist"> 
                                <button type="submit" class="btn btn-primary icon" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                              </li>

                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach
                  {{-- End All Products --}}
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->

            {{-- Category wise tab Generating with setting id --}}
            @foreach($categories as $row)
            <div class="tab-pane" id="category{{ @$row->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                  @php
                    $catWiseProduct = App\Models\Product::whereStatus(1)->where('category_id', $row->id)->orderBy('id', 'DESC')->get();
                  @endphp
                  {{-- Category Wise Products --}}
                  @forelse($catWiseProduct as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @php
                            $amount = $row->selling_price - $row->discount_price;
                            $discount = ($amount/$row->selling_price) * 100;
                          @endphp

                          @if($row->discount_price == null)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if($row->discount_price == null)
                          <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @empty
                  <h5 class="text-danger">No Products Found</h5>
                  @endforelse
                  {{-- End Categroy Wise Products --}}

                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            @endforeach
            {{-- End Category wise tab Generating with setting id --}}
            <!-- /.tab-pane -->
                       
          </div>
          <!-- /.tab-content --> 


        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/banners/home-banner1.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            {{-- Featured Product --}}
            @foreach($featured as $row)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $row->selling_price - $row->discount_price;
                      $discount = ($amount/$row->selling_price) * 100;
                    @endphp

                    @if($row->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($row->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">

                        <li class="add-cart-button btn-group">
                          <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('{{ @$row->id }}')"> <i class="fa fa-shopping-cart"></i> </button>

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>

                        {{-- <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> --}}
                        {{-- <li class="lnk wishlist"> 
                          <button type="submit" class="add-to-cart" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                        </li> --}}

                        <li class="wishlist"> 
                          <button type="submit" class="btn btn-primary icon" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                        </li>

                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>

                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @endforeach
            {{-- End Featured Product --}}
            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 


        <!-- ============================================== skip_product_0 PRODUCTS ============================================== -->
        @php
          // dd($skip_category_0);
          // dd($skip_category_0->id);
          // dd($skip_product_0);
        @endphp
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if(session()->get('language') == 'bangla') {{ @$skip_category_0->category_name_bn }} @else {{ @$skip_category_0->category_name_en }} @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @php
              $skip_product_0 = App\Models\Product::whereStatus(1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(6)->get();
              // dd($skip_product_0);
            @endphp

            {{-- Featured Product --}}
            @foreach($skip_product_0 as $row)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $row->selling_price - $row->discount_price;
                      $discount = ($amount/$row->selling_price) * 100;
                    @endphp

                    @if($row->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($row->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">

                        <li class="add-cart-button btn-group">
                          <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('{{ @$row->id }}')"> <i class="fa fa-shopping-cart"></i> </button>

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>

                        <li class="wishlist"> 
                          <button type="submit" class="btn btn-primary icon" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                        </li>

                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>

                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @endforeach
            {{-- End Featured Product --}}
            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== skip_product_0 PRODUCTS : END ============================================== --> 

        <!-- ============================================== skip_product_1 PRODUCTS ============================================== -->
        @php
          // dd($skip_category_1);
          // dd($skip_category_1->id);
        @endphp
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if(session()->get('language') == 'bangla') {{ @$skip_category_1->category_name_bn }} @else {{ @$skip_category_1->category_name_en }} @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @php
              $skip_product_1 = App\Models\Product::whereStatus(1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->limit(6)->get();
              // dd($skip_product_1);
            @endphp

            {{-- Featured Product --}}
            @foreach($skip_product_1 as $row)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $row->selling_price - $row->discount_price;
                      $discount = ($amount/$row->selling_price) * 100;
                    @endphp

                    @if($row->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($row->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">

                        <li class="add-cart-button btn-group">
                          <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('{{ @$row->id }}')"> <i class="fa fa-shopping-cart"></i> </button>

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>

                        <li class="wishlist"> 
                          <button type="submit" class="btn btn-primary icon" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                        </li>

                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>

                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @endforeach
            {{-- End Featured Product --}}
            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== skip_product_1 PRODUCTS : END ============================================== --> 


        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/banners/home-banner.jpg" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 


        <!-- ============================================== skip_brand_product_3 PRODUCTS ============================================== -->
        @php
          // dd($skip_brand_3);
          // dd($skip_brand_3->id);
        @endphp
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if(session()->get('language') == 'bangla') {{ @$skip_brand_3->brand_name_bn }} @else {{ @$skip_brand_3->brand_name_en }} @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @php
              $skip_brand_product_3 = App\Models\Product::whereStatus(1)->where('brand_id', $skip_brand_3->id)->orderBy('id', 'DESC')->limit(6)->get();
              // dd($skip_brand_product_3);
            @endphp

            {{-- Featured Product --}}
            @foreach($skip_brand_product_3 as $row)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img  src="{{ asset(@$row->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $row->selling_price - $row->discount_price;
                      $discount = ($amount/$row->selling_price) * 100;
                    @endphp

                    @if($row->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->product_name_bn }} @else {{ @$row->product_name_en }} @endif </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($row->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">

                        <li class="add-cart-button btn-group">
                          <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('{{ @$row->id }}')"> <i class="fa fa-shopping-cart"></i> </button>

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>

                        <li class="wishlist"> 
                          <button type="submit" class="btn btn-primary icon" title="Wishlist" id="{{ @$row->id }}" onclick="addWishlistAjax(this.id)"> <i class="icon fa fa-heart"></i> </button> 
                        </li>

                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>

                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @endforeach
            {{-- End Featured Product --}}
            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== skip_brand_product_3 PRODUCTS : END ============================================== --> 


        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p20.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p21.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p22.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p23.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p24.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p25.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p26.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend') }}/assets/images/products/p27.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">


              @forelse($blogPosts as $row)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="{{ route('home.blog') }}"><img src="{{ asset(@$row->post_image) }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="{{ route('blog.details', @$row->id) }}">@if(session()->get('language') == 'bangla')  {!! Str::limit($row->post_title_bn, 100) !!} @else {!! Str::limit($row->post_title_en, 50) !!} @endif</a></h3>
                    <span class="info">By {{ @$row->author }} &nbsp;|&nbsp; {{ Carbon\Carbon::parse( @$row->created_at)->diffForHumans() }} </span>
                    {{-- <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span> --}}
                    <p class="text">@if(session()->get('language') == 'bangla')  {!! Str::limit($row->post_details_bn, 100) !!} @else {!! Str::limit($row->post_details_en, 100) !!} @endif</p>
                    <a href="{{ route('blog.details', @$row->id) }}" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              @empty
                <h2 class="text-danger">No Blog Post Found!</h2>
              @endforelse
              

              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p19.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p28.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p30.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p1.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p2.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend') }}/assets/images/products/p3.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="productTitle" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="productTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img id="pImage" src="" class="card-img-top" style="width: 200px; height: 200px" alt="...">
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pPrice"></span></strong>&emsp;<del id="oldPrice"></del> </li>
              <li class="list-group-item">Product Code: <strong id="pCode"></strong> </li>
              <li class="list-group-item">Category: <strong id="pCategory"></strong> </li>
              <li class="list-group-item">Brand: <strong id="pBrand"></strong> </li>
              {{-- <li class="list-group-item">Stock: <span class="badge badge-pill " id="pStock"></span></li> --}}
              <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
              <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
              </li> 
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="pColor">Choose Color</label>
              <select class="form-control" id="pColor" name="color">
                {{-- <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option> --}}
              </select>
            </div>
            <div class="form-group" id="sizeArea">
              <label for="pSize">Choose Size</label>
              <select class="form-control" id="pSize" name="size">
                {{-- <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option> --}}
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="pQty" value="1" min="1">
            </div>

            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary" onclick="addToCart()" >Add To Cart</button>

          </div>
        </div>

      </div>

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}

    </div>
  </div>
</div>


@endsection

@section('user-js')

<script>

  // Product View With Ajax
  function productViewAjax(id){
    // alert(id);

    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '{{ url('product/view/ajax') }}/'+id,
        success:function(res){
          // console.log(res);

          @if(session()->get('language') == 'bangla')
            $('#productTitle').text(res.product.product_name_bn);
            $('#pCategory').text(res.product.category.category_name_bn);
            $('#pBrand').text(res.product.brand.brand_name_bn);
          @else
            $('#productTitle').text(res.product.product_name_en);
            $('#pCategory').text(res.product.category.category_name_en);
            $('#pBrand').text(res.product.brand.brand_name_en);
          @endif

          $('#pImage').attr('src', '/'+res.product.product_thambnail);
          $('#pPrice').text(res.product.selling_price);
          $('#pCode').text(res.product.product_code);


          // Product Price
          if(res.product.discount_price == null){
            $('#pPrice').text('');
            $('#oldPrice').text('');
            $('#pPrice').text(res.product.selling_price);
          }
          else{
            $('#pPrice').text('');
            $('#oldPrice').text('');
            $('#pPrice').text(res.product.discount_price);
            $('#oldPrice').text('$'+res.product.selling_price);
          }


          // Color
          $('select[name="color"]').empty();
          // $('#pColor').empty();
          $.each(res.color, function(key, value){
            $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
            // $('#pColor').append('<option value="'+value+'">'+value+'</option>');
          });
          // end Color

          // Size
          if(res.size == ""){
            $('#sizeArea').hide();
          } 
          else{
            $('#sizeArea').show();
            $('select[name="size"]').empty();
            $.each(res.size, function(key, value){
              $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
            });
          }
          // end Color

          // Stock
          // if(res.product.product_qty > 0){
          //   $('#pStock').removeClass('badge-warning');
          //   $('#pStock').addClass('badge-success');
          //   $('#pStock').text('Available');
          // }
          // else{
          //   $('#pStock').removeClass('badge-success');
          //   $('#pStock').addClass('badge-primary');
          //   $('#pStock').text('Stock Out');
          // }

          // Stock
          if(res.product.product_qty > 0){
               $('#aviable').text('');
               $('#stockout').text('');
               $('#aviable').text('aviable');
          }
          else{
               $('#aviable').text('');
               $('#stockout').text('');
               $('#stockout').text('stockout');
          } // end Stock Option 

          // Product id & quantity
          $('#product_id').val(id);
          $('#pQty').val(1);
          // End Product id & quantity
         
        }
    });

  }
  // End Product View With Ajax


  // Add To Cart Product with Ajzx
  function addToCart(){
      var id = $('#product_id').val();
      var product_name = $('#productTitle').text();
      var color = $('#pColor option:selected').text();
      var size = $('#pSize option:selected').text();
      var qty = $('#pQty').val();

      // alert(id);
      // console.log(id);
      // console.log(product_name);
      // console.log(color);
      // console.log(size);
      // console.log(qty);

      $.ajax({
          type: 'POST',
          dataType: 'JSON',
          data: {product_name:product_name, color:color, size:size, qty:qty},
          url: '{{ url('/cart/data/store') }}/'+id,
          success:function(res){
              // console.log(res);
              // $('#exampleModal').modal('hide');
              $('#closeModal').click();

              // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                  })
              if ($.isEmptyObject(res.error)) {
                  Toast.fire({
                      type: 'success',
                      title: res.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: res.error
                  })
              }
              // End Message 

              // mini cart 
              miniCart();
          }
      });

  }
  // End Add To Cart Product with Ajzx


</script>


<script>
  
  {{-- Add product into Mini Cart --}}
  function miniCart(){
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '{{ url('/product/mini/cart') }}',
        success:function(res){
            // console.log(res);

            $('#cartQty').text(res.cartQty);
            $('#subTotal').text('$'+res.cartTotal);
            $('#cartTotal').text(res.cartTotal);

            var miniCart = "";

            $.each(res.carts, function(key, value){
              miniCart += (`<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">$${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> 
                        <button type="submit" id="${value.rowId}" onclick="removeMiniCart(this.id)"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`);
            });

            $('#miniCart').html(miniCart);

        }
    });
  }

  miniCart();
  {{-- End Add product into Mini Cart --}}

</script>

<script>
  {{-- Remove product into Mini Cart --}}
  function removeMiniCart(rowId){
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '{{ url('/minicart/product-remove') }}/'+rowId,
        success:function(res){
            console.log(res);

            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(res.error)) {
                Toast.fire({
                    type: 'success',
                    title: res.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: res.error
                })
            }
            // End Message 

            miniCart();
        }
      });
  }
  {{-- End Remove product into Mini Cart --}}
</script>

<script>
  
  {{-- Add product into Mini Cart --}}
  // function miniCart(){
  //   $.ajax({
  //       type: 'GET',
  //       dataType: 'JSON',
  {{-- //       url: '{{ url('/product/mini/cart') }}', --}}
  //       success:function(res){
  //           console.log(res);

  //           $.each(res.carts, function(key, value){
  //             $('#miniCart').append(`<div class="cart-item product-summary">
  //                 <div class="row">
  //                   <div class="col-xs-4">
  //                     <div class="image"> <a href="detail.html"><img src="${value.options.image}" alt=""></a> </div>
  //                   </div>
  //                   <div class="col-xs-7">
  //                     <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
  //                     <div class="price">$${value.price} * ${value.qty}</div>
  //                   </div>
  //                   <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
  //                 </div>
  //               </div>
  //               <!-- /.cart-item -->
  //               <div class="clearfix"></div>
  //               <hr>`);
  //           });

  //           $('#cartQty').text(res.cartQty);
  //           $('#subTotal').text('$'+res.cartTotal);
  //           $('#cartTotal').text(res.cartTotal);
  //       }
  //   });
  // }

  // miniCart();
  {{-- End Add product into Mini Cart --}}

</script>


<script>
  {{-- Add to Wishlist --}}
  function addWishlistAjax(id){
      // alert(id);

      $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: '{{ url('/add-to-wishlist') }}/'+id,
        success:function(res){
            // alert(res.prop(res));
            console.log(res);
            console.log($.isEmptyObject(res.error));


            // MY CODE
            // if($.isEmptyObject(res.error)){
            //   Swal.fire({
            //     position: 'top-end',
            //     icon: 'success',
            //     title: res.success,
            //     showConfirmButton: false,
            //     timer: 3000
            //   });
            // }else{
            //   Swal.fire({
            //     position: 'top-end',
            //     icon: 'error',
            //     title: res.error,
            //     showConfirmButton: false,
            //     timer: 3000
            //   });
            // }


            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top-end',
            //     width: '250px',
            //     showConfirmButton: false,
            //     timer: 3000,
            //     timerProgressBar: true,
            //     didOpen: (toast) => {
            //       toast.addEventListener('mouseenter', Swal.stopTimer)
            //       toast.addEventListener('mouseleave', Swal.resumeTimer)
            //     }
            //   })
            // if($.isEmptyObject(res.error)){
            //   Toast.fire({
            //     icon: 'success',
            //     title: res.success,
            //   });
            // }else{
            //   Toast.fire({
            //     icon: 'error',
            //     title: res.error,
            //   });
            // }
            // END MY CODE



            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(res.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: res.success
                });
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: res.error
                });
            }
            // End Message 
        }
      });
  }
  {{-- End Add to Wishlist --}}


</script>



@endsection