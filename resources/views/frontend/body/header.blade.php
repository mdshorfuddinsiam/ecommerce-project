<header class="header-style-1"> 

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="#"><i class="icon fa fa-user"></i>@if(session()->get('language') == 'bangla') আমার অ্যাকাউন্ট @else My Account @endif</a></li>

            <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>@if(session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif</a></li>

            <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>@if(session()->get('language') == 'bangla') আমার কার্ট @else My Cart @endif </a></li>

            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i> @if(session()->get('language') == 'bangla') চেকআউট @else Checkout @endif </a></li>

            <li><a href="#" data-toggle="modal" data-target="#orderTracking"><i class="icon fa fa-check"></i> @if(session()->get('language') == 'bangla') শৃঙ্খলা ট্র্যাকিং @else Order Tracking @endif </a></li>

            {{-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderTracking">
              Launch demo modal
            </button> --}}


            @guest
            @else
            @endguest


            @auth
              @php
                $user = auth()->guard('web')->user();
              @endphp
              <li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>{{ $user->name }}</a></li>
              {{-- <li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a></li> --}}
            @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
            @endauth

          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if(session()->get('language') == 'bangla') ভাষা @else Language @endif </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                @if(session()->get('language') == 'bangla')
                <li><a href="{{ route('language.english') }}">English</a></li>
                @else
                <li><a href="{{ route('language.bangla') }}">বাংলা</a></li>
                @endif
                {{-- <li><a href="">Seission Data : {{ session()->get('language') }}</a></li> --}}
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          {{-- <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('frontend') }}/assets/images/logo.png" alt="logo"> </a> </div> --}}
          <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset(@$siteSetting->logo) }}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form action="{{ route('product.search') }}" method="POST">
              @csrf

              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Computer</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                    </ul>
                  </li>
                </ul>
                {{-- <input class="search-field" placeholder="Search here..." /> --}}
                <input type="text" name="search" id="search" class="search-field" placeholder="Search here..." onfocus="search_result_show()" onblur="search_result_hide()" />
                <button type="submit" class="search-button"></button>
                {{-- <a class="search-button" href="#" ></a>  --}}


              </div>

            </form>


            <div id="searchProducts" ></div>


          </div>
          <!-- /.search-area --> 

          

          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> 
                <span class="total-price"> <span class="sign">$</span>
                <span class="value" id="cartTotal"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                
                {{-- Single Cart Product --}}
                <div id="miniCart">
                  
                </div>
                {{-- End Single Cart Product --}}

                <div class="clearfix cart-total">
                  <div class="pull-right"> 
                    <span class="text">Sub Total :</span>
                    <span class='price' id="subTotal"></span> 
                  </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'bangla') বাড়ি @else Home @endif</a> </li>

                {{-- Categories --}}
                @foreach($categories as $row)
                <li class="dropdown yamm mega-menu"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'bangla') {{ @$row->category_name_bn }} @else {{ @$row->category_name_en }} @endif</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          {{-- Sub-Categories --}}
                          @php
                            $subcategories = App\Models\SubCategory::where('category_id', $row->id)->orderBy('subcategory_name_en', 'ASC')->get();
                          @endphp
                          @foreach($subcategories as $row)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <a href="{{ route('subcategory.product', ['subcat_id'=>$row->id, 'slug'=>$row->subcategory_slug_en]) }}">
                              <h2 class="title">@if(session()->get('language') == 'bangla') {{ @$row->subcategory_name_bn }} @else {{ @$row->subcategory_name_en }} @endif</h2>
                            </a>
                            <ul class="links">
                              {{-- Sub-Sub-Categories --}}
                              @php
                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $row->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                              @endphp
                              @forelse($subsubcategories as $row)
                              <li><a href="{{ route('subsubcategory.product', ['subsubcat_id'=>$row->id, 'slug'=>$row->subsubcategory_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->subsubcategory_name_bn }} @else {{ @$row->subsubcategory_name_en }} @endif</a></li>
                              @empty
                              @endforelse
                              {{-- end Sub-Sub-Categories --}}
                            </ul>
                          </div>
                          <!-- /.col -->
                          @endforeach
                          {{-- end Sub-Categories --}}
                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach
                {{-- end Categories --}}

                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                <li class="dropdown yamm mega-menu pull-right"> <a href="{{ route('home.blog') }}">Blog</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 




  <!-- Order Tracking Modal -->
  <div class="modal fade" id="orderTracking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Track Your Order</h4>
        </div>

        <div class="modal-body">
          <form action="{{ route('order.tracking') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="code">Invoice Code</label>
              <input type="text" name="code" id="code" class="form-control"  placeholder="Type Your Invoice Code">
            </div>
            <input type="submit" class="btn btn-primary pull-right" value="Submit">
            <br><br>
          </form>
        </div>

        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}

      </div>
    </div>
  </div>


  
</header>

{{-- @section('front-user-css') --}}
<style>
  .search-area{
    position: relative;
  }

  .serach-products {
    position: absolute;
    width: 100%;
    left: 0;
    top: 50px;
    background: #ffffff;
    padding: 10px 10px 0px 10px;
    z-index: 999;
    border-radius: 5px;
  }

  /*#searchProducts {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #ffffff;
    z-index: 999;
    border-radius: 8px;
    margin-top: 5px;
  }*/
</style>
{{-- @endsection --}}