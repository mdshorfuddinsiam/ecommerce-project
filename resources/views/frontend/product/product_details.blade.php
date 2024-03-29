@extends('frontend.main_master')

@section('title')
{{ $product->product_name_en }} - Product Details
@endsection

@section('front-user-css')
<link href="{{ asset('frontend') }}/assets/css/lightbox.css" rel="stylesheet">
@endsection

@section('content')


	@php
		// dd($product_color_en);
		// // dd($product_color_bn);
		// // dd($product_size_en);
		// // dd($product_size_en);
	@endphp

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="{{ asset('frontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
					</div>		



					<!-- ============================================== HOT DEALS ============================================== -->
					@include('frontend.common.hot_deals')
					<!-- ============================================== HOT DEALS: END ============================================== -->					

					<!-- ============================================== NEWSLETTER ============================================== -->
					<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
						</div><!-- /.sidebar-widget-body -->
					</div><!-- /.sidebar-widget -->
					<!-- ============================================== NEWSLETTER: END ============================================== -->

					<!-- ============================================== Testimonials============================================== -->
					<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
						<div id="advertisement" class="advertisement">
							<div class="item">
								<div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member1.png" alt="Image"></div>
								<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
							</div><!-- /.item -->

							<div class="item">
								<div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member3.png" alt="Image"></div>
								<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
							</div><!-- /.item -->

							<div class="item">
								<div class="avatar"><img src="{{ asset('frontend') }}/assets/images/testimonials/member2.png" alt="Image"></div>
								<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
								<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
							</div><!-- /.item -->

						</div><!-- /.owl-carousel -->
					</div>

					<!-- ============================================== Testimonials: END ============================================== -->



				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				<div class="detail-block">
					<div class="row  wow fadeInUp">

						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
									@php
										// dd($multiImages)
									@endphp
									@foreach($multiImages as $row)
									<div class="single-product-gallery-item" id="slide{{ @$row->id }}">
										<a data-lightbox="image-1" data-title="Gallery" href="{{ asset(@$row->photo_name) }}">
											<img class="img-responsive" alt="" src="{{ asset(@$row->photo_name) }}" data-echo="{{ asset(@$row->photo_name) }}" />
										</a>
									</div><!-- /.single-product-gallery-item -->
									@endforeach
								</div><!-- /.single-product-slider -->


								<div class="single-product-gallery-thumbs gallery-thumbs">
									<div id="owl-single-product-thumbnails">
										@foreach($multiImages as $row)
										<div class="item">
											<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ @$row->id }}">
												<img class="img-responsive" width="85" alt="" src="{{ asset(@$row->photo_name) }}" data-echo="{{ asset(@$row->photo_name) }}" />
											</a>
										</div>
										@endforeach
									</div><!-- /#owl-single-product-thumbnails -->

								</div><!-- /.gallery-thumbs -->

							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->        			
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name" id="productTitle">@if(session()->get('language') == 'bangla') {{ @$product->product_name_bn }} @else {{ @$product->product_name_en }} @endif</h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											<div class="rating rateit-small"></div>
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">(13 Reviews)</a>
											</div>
										</div>
									</div><!-- /.row -->		
								</div><!-- /.rating-reviews -->

								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-2">
											<div class="stock-box">
												<span class="label">Availability :</span>
											</div>	
										</div>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value">In Stock</span>
											</div>	
										</div>
									</div><!-- /.row -->	
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
									@if(session()->get('language') == 'bangla') {{ @$product->short_descp_bn }} @else {{ @$product->short_descp_en }} @endif
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">


										<div class="col-sm-6">
											<div class="price-box">
												@if($product->discount_price == null)
												<span class="price">${{ @$product->selling_price }}</span>
												@else
												<span class="price">${{ @$product->discount_price }}</span>
												<span class="price-strike">${{ @$product->selling_price }}</span>
												@endif
											</div>
										</div>

										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
													<i class="fa fa-heart"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
													<i class="fa fa-signal"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
													<i class="fa fa-envelope"></i>
												</a>
											</div>
										</div>

									</div><!-- /.row -->
								</div><!-- /.price-container -->


								{{-- Product Color & Size --}}
								<div style="padding-top: 20px">
									<div class="row">

										<div class="col-sm-6">
											<div class="form-group">
												<label class="info-title control-label">Choose Color </label>
												<select class="form-control unicase-form-control selectpicker" id="pColor">
													<option disabled="" selected="" hidden="">--Choose Color--</option>

													@if(session()->get('language') == 'bangla')
														@foreach($product_color_bn as $item)
														<option value="">{{ $item }}</option>
														@endforeach
													@else
														@foreach($product_color_en as $item)
														<option value="">{{ $item }}</option>
														@endforeach
													@endif

												</select>
											</div>
										</div>

										<div class="col-sm-6">
											@if($product->product_size_en == null && $product->product_size_bn == null)

											@else
												<div class="form-group">
													<label class="info-title control-label">Choose Size </label>
													<select class="form-control unicase-form-control selectpicker" id="pSize">
														<option disabled="" selected="" hidden="">--Choose Size--</option>
														
														@if(session()->get('language') == 'bangla')
															@foreach($product_size_bn as $item)
															<option value="">{{ $item }}</option>
															@endforeach
														@else
															@foreach($product_size_en as $item)
															<option value="">{{ $item }}</option>
															@endforeach
														@endif

													</select>
												</div>
											@endif
										</div>
										
									</div>
								</div>
								{{-- End Product Color & Size --}}


								<div class="quantity-container info-container">
									<div class="row">

										<div class="col-sm-2">
											<span class="label">Qty :</span>
										</div>

										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
													<div class="arrows">
														<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
													</div>
													<input type="text" id="pQty" value="1" min="1">
												</div>
											</div>
										</div>

										{{-- Product Id (hidden) --}}
										<input type="hidden" id="product_id" value="{{ $product->id }}">
										{{-- End Product Id (hidden) --}}

										<div class="col-sm-7">
											{{-- <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a> --}}
											<button type="submit" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
										</div>


									</div><!-- /.row -->
								</div><!-- /.quantity-container -->





							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->
				</div>

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">

								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">@if(session()->get('language') == 'bangla') {!! @$product->long_descp_bn !!} @else {!! @$product->long_descp_en !!} @endif</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">


										
										<div class="product-reviews">
											@if(count($reviews) > 0)
											<h4 class="title">Customer Reviews</h4>
											@endif

											<div class="reviews">
												{{-- <div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
												</div> --}}


												@forelse($reviews as $row)
												<div class="review">
													<div class="row" style="margin-bottom: 10px">
														<div class="col-md-3">
															<img src="{{ (!empty($row->user->profile_photo_path)) ? asset($row->user->profile_photo_path) : url('upload/no_image.jpg') }}" style="border-radius: 50%" width="50" alt="">
														</div>
														<div class="col-md-9">
															
														</div>
													</div>
													<div class="review-title"><span class="summary">{{ $row->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span></span></div>
													<div class="text">"{{ $row->comment }}"</div>
												</div>
												@empty
												@endforelse

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->



										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>

											@guest

											<p> <b> For Add Product Review. You Need to Login First <u><a href="{{ url('/login') }}">Login Here</a></u> </b> </p>												

											@else

											<div class="review-table">
												<div class="table-responsive">

													{{-- Start Reivew Form --}}
													<form action="{{ route('review.store', $product->id) }}" method="POST" role="form" class="cnt-form">
														@csrf

													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality_rating" class="radio" value="1"></td>
																<td><input type="radio" name="quality_rating" class="radio" value="2"></td>
																<td><input type="radio" name="quality_rating" class="radio" value="3"></td>
																<td><input type="radio" name="quality_rating" class="radio" value="4"></td>
																<td><input type="radio" name="quality_rating" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price_rating" class="radio" value="1"></td>
																<td><input type="radio" name="price_rating" class="radio" value="2"></td>
																<td><input type="radio" name="price_rating" class="radio" value="3"></td>
																<td><input type="radio" name="price_rating" class="radio" value="4"></td>
																<td><input type="radio" name="price_rating" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="value_rating" class="radio" value="1"></td>
																<td><input type="radio" name="value_rating" class="radio" value="2"></td>
																<td><input type="radio" name="value_rating" class="radio" value="3"></td>
																<td><input type="radio" name="value_rating" class="radio" value="4"></td>
																<td><input type="radio" name="value_rating" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->

											<div class="review-form">
												<div class="form-container">
													{{-- <form role="form" class="cnt-form"> --}}

														<div class="row">
															<div class="col-sm-6">
																{{-- <div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div> --}}
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->

														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
													{{-- Start Reivew Form --}}



												</div><!-- /.form-container -->
											</div><!-- /.review-form -->


											@endguest

										</div><!-- /.product-add-review -->										

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">

										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">

												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">


												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">upsell products</h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


					  {{-- Upsell(Category Wise) Products --}}
				      @forelse($upsellProducts as $row)
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
				      {{-- End Upsell(Category Wise) Products --}}


					</div><!-- /.home-owl-carousel -->
				</section><!-- /.section -->
				<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->




{{-- Brands Slider --}}
@include('frontend.body.brands')
{{-- End Brands Slider --}}


	</div>
</div>


@endsection


@section('user-js')


<script>
	
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
            console.log(res);

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


@endsection