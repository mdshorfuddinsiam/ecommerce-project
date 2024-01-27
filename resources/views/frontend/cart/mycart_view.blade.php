@extends('frontend.main_master')

@section('title')
  My Cart Page
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">

				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-description item">Image</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-edit item">Color</th>
									<th class="cart-total last-item">Size</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Subtotal</th>
									<th class="cart-romove item">Remove</th>
								</tr>
							</thead><!-- /thead -->
							<tbody id="mycart">


							</tbody>
						</table>
					</div>
				</div>	

				<div class="col-md-4 col-sm-12 estimate-ship-tax">
				</div>

				<div class="col-md-4 col-sm-12 estimate-ship-tax">

					@if(session()->has('coupon'))

					@else
					<table class="table" id="couponField">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Discount Code</span>
									<p>Enter your coupon code if you have one..</p>
								</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td>
										<div class="form-group">
											<input type="text" id="coupon_name" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
										</div>
										<div class="clearfix pull-right">
											<button type="submit" class="btn-upper btn btn-primary" onclick="couponApply()" >APPLY COUPON</button>
										</div>
									</td>
								</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
					@endif

				</div><!-- /.estimate-ship-tax -->

				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table">
						<thead id="couponCalField">

							

						</thead><!-- /thead -->
						<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
											{{-- <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button> --}}
											<a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
										</div>
									</td>
								</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div><!-- /.cart-shopping-total -->

			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.body.brands')
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection


@section('user-js')

<script>
	{{-- Show All My Cart Products --}}
	function myCart(){
	  $.ajax({
	      type: 'GET',
	      dataType: 'JSON',
	      url: '{{ url('/user/get-mycart-product') }}',
	      success:function(res){
	          // console.log(res);

	          miniCart();

	          var rows = "";

	          $.each(res.carts, function(key, value){
	            rows += (`<tr>
					<td class="col-md-2"><img src="/${value.options.image}" style="height:100px; width:100px;" alt="imga"></td>
					<td class="col-md-2">
						<div class="product-name">
							<a href="#">
							  	${value.name}
							</a>
						</div>
						{{-- <div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div> --}}
					</td>
					<td class="col-md-2">
						<strong>
							${value.options.color}
						</strong>
					</td>
					<td class="col-md-2">
						<strong>
							${value.options.size}
						</strong>
					</td>
					<td class="col-md-2">

						${value.qty == '1'
							? 
							`<button type="submit" class="btn btn-sm btn-danger" id="${value.rowId}"  onclick="mycartDecrement(this.id)" disabled><strong> - </strong></button>`
							:
							`<button type="submit" class="btn btn-sm btn-danger" id="${value.rowId}"  onclick="mycartDecrement(this.id)"><strong> - </strong></button>`
						}
						<input type="text" value="${value.qty}" style="width:25px;" min="1" max="100" disabled>
						<button type="submit" class="btn btn-sm btn-info" id="${value.rowId}"  onclick="mycartIncrement(this.id)"><strong> + </strong></button>

					</td>
					<td class="col-md-2">
						<strong>
							$${value.subtotal}
						</strong>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.rowId}" onclick="removeMyCart(this.id)"><i class="fa fa-times"></i></button>
					</td>
				</tr>`);
	          });

	          $('#mycart').html(rows);
	      }
	  });
	}

	myCart();
	{{-- End Show All My Cart Products --}}

	{{-- Remove product into My Cart --}}
	function removeMyCart(rowId){
	  $.ajax({
	      type: 'GET',
	      dataType: 'JSON',
	      url: '{{ url('/user/mycart/remove') }}/'+rowId,
	      success:function(res){
	          // console.log(res);

	          myCart();
	          couponCalulation();
	          // $('#couponField').show();
			  // $('#coupon_name').val('');


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
	              })
	          }else{
	              Toast.fire({
	                  type: 'error',
	                  icon: 'error',
	                  title: res.error
	              })
	          }
	          // End Message 

	          myCart();
	      }
	    });
	}
	{{-- End Remove product into My Cart --}}

	{{-- My Cart Product Quantity Increment --}}
	function mycartIncrement(rowId){
		// alert(rowId);

		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '{{ url('/user/mycart-increment') }}/'+rowId,
			success:function(res){
			  // console.log(res);

			  myCart();
			  miniCart();
			  couponCalulation();

			}
		});
  	}     
	{{-- Show My Cart Product Quantity Increment --}}
		{{-- My Cart Product Quantity Increment --}}
		function mycartDecrement(rowId){
			// alert(rowId);

			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '{{ url('/user/mycart-decrement') }}/'+rowId,
				success:function(res){
				  // console.log(res);

				  myCart();
				  miniCart();
			  	  couponCalulation();

				}
			});
	  	}     
		{{-- Show My Cart Product Quantity Increment --}}
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

<script>
	{{-- Coupon Apply --}}
	function couponApply(){
		var coupon_name = $('#coupon_name').val();
		// alert(coupon_name);

		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			data: {coupon_name:coupon_name},
			url: '{{ url("/coupon-apply") }}',
			success:function(res){
			  // console.log(res);

			  couponCalulation();
			  $('#couponField').hide();

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
	              })
	          }else{
	              Toast.fire({
	                  type: 'error',
	                  icon: 'error',
	                  title: res.error
	              })
	          }
	          // End Message 

			}
	    });
	}
	{{-- End Coupon Apply --}}

	{{-- Coupon Calculation Show --}}
	function couponCalulation(){
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: '{{ url("/coupon-calculation") }}',
			success:function(res){
				// console.log(res);

				if(res.total){
					$('#couponCalField').html(`
						<tr>
							<th>
								<div class="cart-sub-total">
									Subtotal<span class="inner-left-md">$${res.total}</span>
								</div>
								<div class="cart-grand-total">
									Grand Total<span class="inner-left-md">$${res.total}</span>
								</div>
							</th>
						</tr>
						`);
				}
				else{
					$('#couponCalField').html(`
						<tr>
							<th>
								<div class="cart-sub-total">
									Subtotal<span class="inner-left-md">$${res.subtotal}</span>
								</div>
								<div class="cart-sub-total">
									Coupon<span class="inner-left-md">$${res.coupon_name}</span>
									<button type="submit" class="btn btn-sm btn-danger" onclick="removeCoupon()"><i class="fa fa-times"></i></button>
								</div>
								<div class="cart-sub-total">
									Discount<span class="inner-left-md">${res.discount_amount}</span>
								</div>
								<div class="cart-grand-total">
									Grand Total<span class="inner-left-md">$${res.total_amount}</span>
								</div>
							</th>
						</tr>
						`);
				}

			}
	    });
	}

	couponCalulation();
	{{-- End Coupon Calculation Show --}}

	{{-- Remove Coupon --}}
	function removeCoupon(){
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: '{{ url("/coupon-remove") }}',
			success:function(res){
				// console.log(res);

				couponCalulation();
				$('#couponField').show();
				$('#coupon_name').val('');

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
					})
				}else{
					Toast.fire({
						type: 'error',
						icon: 'error',
						title: res.error
					})
				}
	          // End Message 

			}
	    });
	}
	{{-- End Remove Coupon --}}

</script>

@endsection