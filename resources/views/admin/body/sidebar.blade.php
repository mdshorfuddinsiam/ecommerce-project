  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend') }}/images/logo-dark.png" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>


        @php
          // dd($route);
          // dd($prefix);

          // dd(auth()->guard('admin')->user());
          // dd(auth()->guard('admin')->id());
          // dd(auth()->id());
          // dd(auth()->user());
          // dd(auth()->guard('web')->id());
          // dd(auth()->guard('web')->user());
          // dd(auth()->guard('admin')->user()->name);
          // dd(Auth::user()->name);
        @endphp

      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ $route == 'admin.dashboard' ? 'active' : ''}}">
          <a href="{{ url('/admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		

        @php
            $adminData = auth()->guard('admin')->user();
        @endphp

        @if($adminData->brand == 1)
        <li class="treeview {{ $prefix == '/brand' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'brand.all' ? 'active' : ''}}"><a href="{{ route('brand.all') }}"><i class="ti-more"></i>All Brands</a></li>
          </ul>
        </li> 
        @else
        @endif
		  

        @if($adminData->category == 1)
        <li class="treeview {{ $prefix == '/category' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'category.all' ? 'active' : ''}}"><a href="{{ route('category.all') }}"><i class="ti-more"></i>All Categories</a></li>
            <li class="{{ $route == 'subcategory.all' ? 'active' : ''}}"><a href="{{ route('subcategory.all') }}"><i class="ti-more"></i>All Sub-categories</a></li>
            <li class="{{ $route == 'subsubcategory.all' ? 'active' : ''}}"><a href="{{ route('subsubcategory.all') }}"><i class="ti-more"></i>All Sub-SubCategories</a></li>
          </ul>
        </li>
        @else
        @endif
		

        @if($adminData->product == 1)
        <li class="treeview {{ $prefix == '/product' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'product.create' ? 'active' : ''}}"><a href="{{ route('product.create') }}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{ $route == 'product.all' ? 'active' : ''}}"><a href="{{ route('product.all') }}"><i class="ti-more"></i>All Products</a></li>
          </ul>
        </li> 		 
        @else
        @endif


        @if($adminData->slider == 1)
        <li class="treeview {{ $prefix == '/slider' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'slider.all' ? 'active' : ''}}"><a href="{{ route('slider.all') }}"><i class="ti-more"></i>All Sliders</a></li>
          </ul>
        </li>
        @else
        @endif  


        @if($adminData->coupon == 1)
        <li class="treeview {{ $prefix == '/coupon' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'coupon.all' ? 'active' : ''}}"><a href="{{ route('coupon.all') }}"><i class="ti-more"></i>All Coupons</a></li>
          </ul>
        </li>  
        @else
        @endif 


        @if($adminData->shipping == 1)
        <li class="treeview {{ $prefix == '/shipping' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'division.all' ? 'active' : ''}}"><a href="{{ route('division.all') }}"><i class="ti-more"></i>Ship Division</a></li>
            <li  class="{{ $route == 'district.all' ? 'active' : ''}}"><a href="{{ route('district.all') }}"><i class="ti-more"></i>Ship District</a></li>
            <li  class="{{ $route == 'state.all' ? 'active' : ''}}"><a href="{{ route('state.all') }}"><i class="ti-more"></i>Ship State</a></li>
          </ul>
        </li>  
        @else
        @endif

        @if($adminData->blog == 1)
        <li class="treeview {{ $prefix == 'blog' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'blog.category' ? 'active' : ''}}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li  class="{{ $route == 'blog.subcategory' ? 'active' : ''}}"><a href="{{ route('blog.subcategory') }}"><i class="ti-more"></i>All Sub-Category</a></li>
            <li  class="{{ $route == 'blog.post' ? 'active' : ''}}"><a href="{{ route('blog.post') }}"><i class="ti-more"></i>All Post</a></li>
          </ul>
        </li>  
        @else
        @endif

        @if($adminData->setting == 1)
        <li class="treeview {{ $prefix == '/setting' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'site.setting' ? 'active' : ''}}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>
            <li  class="{{ $route == 'seo.setting' ? 'active' : ''}}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>
          </ul>
        </li>
        @else
        @endif

		 
        {{-- ========================================== --}}

        <li class="header nav-small-cap">User Interface</li>


        @if($adminData->orders == 1)
        <li class="treeview {{ $prefix == '/orders' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'pending-orders' ? 'active' : ''}}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
            <li  class="{{ $route == 'confirm-orders' ? 'active' : ''}}"><a href="{{ route('confirm-orders') }}"><i class="ti-more"></i>Confiremd Orders</a></li>
            <li  class="{{ $route == 'processing-orders' ? 'active' : ''}}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
            <li  class="{{ $route == 'picked-orders' ? 'active' : ''}}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
            <li  class="{{ $route == 'shipped-orders' ? 'active' : ''}}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
            <li  class="{{ $route == 'delivered-orders' ? 'active' : ''}}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
            <li  class="{{ $route == 'cancel-orders' ? 'active' : ''}}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
          </ul>
        </li>  
        @else
        @endif


        @if($adminData->returnorder == 1)
        <li class="treeview {{ $prefix == '/return' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Return Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'return.request' ? 'active' : ''}}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>
            <li  class="{{ $route == 'all.approved.request' ? 'active' : ''}}"><a href="{{ route('all.approved.request') }}"><i class="ti-more"></i>All Approved Request</a></li>
          </ul>
        </li>
        @else
        @endif

        @if($adminData->stock == 1)
         <li class="treeview {{ $prefix == '/stock' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Product Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'product.stock' ? 'active' : ''}}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>
          </ul>
        </li>
        @else
        @endif


        @if($adminData->review == 1)
        <li class="treeview {{ $prefix == '/review' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'pending.review' ? 'active' : ''}}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
            <li  class="{{ $route == 'publish.review' ? 'active' : ''}}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Published Review</a></li>
          </ul>
        </li>
        @else
        @endif

        @if($adminData->reports == 1)
        <li class="treeview {{ $prefix == '/reports' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'reports.search' ? 'active' : ''}}"><a href="{{ route('reports.search') }}"><i class="ti-more"></i>Reports Search</a></li>
          </ul>
        </li>
        @else
        @endif


        @if($adminData->alluser == 1)
        <li class="treeview {{ $prefix == '/alluser' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>All Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'all-users' ? 'active' : ''}}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
          </ul>
        </li>
        @else
        @endif


        @if($adminData->adminuserrole == 1)
        <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Admin User Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ $route == 'all.admin.user' ? 'active' : ''}}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin Users</a></li>
          </ul>
        </li>
        @else
        @endif


		  
        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>   --}}
		         		  		  
		  
		<li class="header nav-small-cap">EXTRA</li>		  
		  
		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>