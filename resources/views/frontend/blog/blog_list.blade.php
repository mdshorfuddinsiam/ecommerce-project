@extends('frontend.main_master')

@section('title')
  Blog List Page
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
	<div class="container">


		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">

					@forelse($blogPosts as $row)
					<div class="blog-post  wow fadeInUp">
						<a href="{{ route('blog.details', @$row->id) }}">
							<img class="img-responsive" src="{{ asset(@$row->post_image) }}" alt="">
						</a>
						<h1>
							<a href="{{ route('blog.details', @$row->id) }}">@if(session()->get('language') == 'bangla')  {{ @$row->post_title_bn }} @else {{ @$row->post_title_en }} @endif</a>
						</h1>
						<span class="author">{{ @$row->author }}</span>
						<span class="review">6 Comments</span>
						<span class="date-time">{{ Carbon\Carbon::parse( @$row->created_at)->diffForHumans() }}</span>
						{{-- <span class="date-time">14/06/2016 10.00AM</span> --}}
						<p>@if(session()->get('language') == 'bangla')  {!! Str::limit($row->post_details_bn, 440) !!} @else {!! Str::limit($row->post_details_en, 440) !!} @endif</p>
						<a href="{{ route('blog.details', @$row->id) }}" class="btn btn-upper btn-primary read-more">read more</a>
					</div>
					@empty
					<h2 class="text-danger">No Post Found!</h2>
					@endforelse

					

					<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

						<div class="text-right">
							<div class="pagination-container">
								<ul class="list-inline list-unstyled">
									<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
									<li><a href="#">1</a></li>	
									<li class="active"><a href="#">2</a></li>	
									<li><a href="#">3</a></li>	
									<li><a href="#">4</a></li>	
									<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul><!-- /.list-inline -->
							</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

						</div><!-- /.filters-container -->				</div>
						<div class="col-md-3 sidebar">



							<div class="sidebar-module-container">
								<div class="search-area outer-bottom-small">
									<form>
										<div class="control-group">
											<input placeholder="Type to search" class="search-field">
											<a href="#" class="search-button"></a>   
										</div>
									</form>
								</div>		

								<div class="home-banner outer-top-n outer-bottom-xs">
									<img src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
								</div>
																<!-- ==============================================CATEGORY============================================== -->
								<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
									<h3 class="section-title">Category</h3>
									<div class="sidebar-widget-body m-t-10">
										<div class="accordion">


									        @forelse($blogCategories as $row)
									        <div class="accordion-group">
									          <div class="accordion-heading">
									            <a href="#collapse{{ @$row->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
									              @if(session()->get('language') == 'bangla')  {{ @$row->blog_category_name_bn }} @else {{ @$row->blog_category_name_en }} @endif
									            </a>
									          </div><!-- /.accordion-heading -->
									          <div class="accordion-body collapse" id="collapse{{ @$row->id }}" style="height: 0px;">
									            <div class="accordion-inner">
									              <ul>
									                {{-- @php
									                  $blogSubCats = \App\Models\Blog\blogSubCategory::where('blogcategory_id', $row->id)->latest()->get();
									                @endphp --}}

									                {{-- @foreach($blogSubCats as $row) --}}
									                @foreach($row->blogSubCategory as $row)
									                
									                <li><a href="#">@if(session()->get('language') == 'bangla')  {{ @$row->blog_subcategory_name_bn }} @else {{ @$row->blog_subcategory_name_en }} @endif</a></li>
									                @endforeach
									              </ul>
									            </div><!-- /.accordion-inner -->
									          </div><!-- /.accordion-body -->
									        </div><!-- /.accordion-group -->
									        @empty
									        @endforelse


									    </div><!-- /.accordion -->
									</div><!-- /.sidebar-widget-body -->
								</div><!-- /.sidebar-widget -->

								<!-- ============================================== CATEGORY : END ============================================== -->						
								<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
									<h3 class="section-title">tab widget</h3>
									<ul class="nav nav-tabs">
										<li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
										<li><a href="#recent" data-toggle="tab">recent post</a></li>
									</ul>
									<div class="tab-content" style="padding-left:0">
										<div class="tab-pane active m-t-20" id="popular">
											<div class="blog-post inner-bottom-30 " >
												<img class="img-responsive" src="{{ asset('frontend') }}/assets/images/blog-post/blog_big_01.jpg" alt="">
												<h4><a href="blog-details.html">Simple Blog Post</a></h4>
												<span class="review">6 Comments</span>
												<span class="date-time">12/06/16</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

											</div>
											<div class="blog-post" >
												<img class="img-responsive" src="{{ asset('frontend') }}/assets/images/blog-post/blog_big_02.jpg" alt="">
												<h4><a href="blog-details.html">Simple Blog Post</a></h4>
												<span class="review">6 Comments</span>
												<span class="date-time">23/06/16</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

											</div>
										</div>

										<div class="tab-pane m-t-20" id="recent">
											<div class="blog-post inner-bottom-30" >
												<img class="img-responsive" src="{{ asset('frontend') }}/assets/images/blog-post/blog_big_03.jpg" alt="">
												<h4><a href="blog-details.html">Simple Blog Post</a></h4>
												<span class="review">6 Comments</span>
												<span class="date-time">5/06/16</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

											</div>
											<div class="blog-post">
												<img class="img-responsive" src="{{ asset('frontend') }}/assets/images/blog-post/blog_big_01.jpg" alt="">
												<h4><a href="blog-details.html">Simple Blog Post</a></h4>
												<span class="review">6 Comments</span>
												<span class="date-time">10/07/16</span>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

											</div>
										</div>
									</div>
								</div>
								<!-- ============================================== PRODUCT TAGS ============================================== -->
								<div class="sidebar-widget product-tag wow fadeInUp">
									<h3 class="section-title">Product tags</h3>
									<div class="sidebar-widget-body outer-top-xs">
										<div class="tag-list">					
											<a class="item" title="Phone" href="category.html">Phone</a>
											<a class="item active" title="Vest" href="category.html">Vest</a>
											<a class="item" title="Smartphone" href="category.html">Smartphone</a>
											<a class="item" title="Furniture" href="category.html">Furniture</a>
											<a class="item" title="T-shirt" href="category.html">T-shirt</a>
											<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
											<a class="item" title="Sneaker" href="category.html">Sneaker</a>
											<a class="item" title="Toys" href="category.html">Toys</a>
											<a class="item" title="Rose" href="category.html">Rose</a>
										</div><!-- /.tag-list -->
									</div><!-- /.sidebar-widget-body -->
								</div><!-- /.sidebar-widget -->
						<!-- ==================== PRODUCT TAGS : END ======================= -->	</div>
						</div>
					</div>


					

		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		
		{{-- @include('frontend.body.brands') --}}

		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection


@section('user-js')

	
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
	                    <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
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
	          myCart();
	      }
	    });
	}
	{{-- End Remove product into Mini Cart --}}
</script>


@endsection