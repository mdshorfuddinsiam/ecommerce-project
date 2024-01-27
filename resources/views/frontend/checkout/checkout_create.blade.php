@extends('frontend.main_master')

@section('title')
  Checkout Page
@endsection

@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.css" integrity="sha512-g2SduJKxa4Lbn3GW+Q7rNz+pKP9AWMR++Ta8fgwsZRCUsawjPvF/BxSMkGS61VsR9yinGoEgrHPGPn2mrj8+4w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/select2.css">


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">



						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">

							<!-- panel-heading -->
							{{-- <div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a class=""  href="#">
										<span>Checkout Method</span>
									</a>
								</h4>
							</div> --}}
							<!-- panel-heading -->

							<div id="collapseOne" class="panel-collapse collapse in">

								<!-- panel-body  -->
							    <div class="panel-body">
									<div class="row">		


										<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle">Shipping Information</h4>
											
											{{-- Start Checkout Form --}}
											<form action="{{ route('checkout.store') }}" method="POST" class="register-form">
												@csrf

												<div class="form-group">
													<label class="info-title" for="shipping_name">Shipping Name <span>*</span></label>
													<input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="shipping_name" placeholder="Full Name" value="{{ auth()->user()->name }}">
												</div>
												<div class="form-group">
													<label class="info-title" for="shipping_email">Shipping Email <span>*</span></label>
													<input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="shipping_email" placeholder="Email" value="{{ auth()->user()->email }}">
												</div>
												<div class="form-group">
													<label class="info-title" for="shipping_phone">Shipping Phone <span>*</span></label>
													<input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="shipping_phone" placeholder="Phone" value="{{ auth()->user()->phone }}">
												</div>
												<div class="form-group">
													<label class="info-title" for="post_code">Post Code <span>*</span></label>
													<input type="number" name="post_code" class="form-control unicase-form-control text-input" id="post_code" placeholder="Post Code">
												</div>

										</div>	
										<!-- already-registered-login -->

										<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">

											<div class="form-group">
												<label class="info-title" for="division_id">Division Options <span>*</span></label>

												<select name="division_id" id="division_id" class="form-control unicase-form-control selectpicker select2" style="width: 100%;">
													<option value="" hidden selected disabled>--Select options--</option>
													
													@foreach($divisions as $row)
														<option value="{{ @$row->id }}" >{{ @$row->division_name }}</option>
													@endforeach
												</select>
											</div>

											<div class="form-group">
												<label class="info-title" for="district_id">District Options <span>*</span></label>

												<select name="district_id" id="district_id" class="form-control unicase-form-control selectpicker select2" style="width: 100%;">
													<option value="" hidden selected disabled>--Select options--</option>
													
												</select>
											</div>

											<div class="form-group">
												<label class="info-title" for="state_id">District Options <span>*</span></label>

												<select name="state_id" id="state_id" class="form-control unicase-form-control selectpicker select2" style="width: 100%;">
												<option value="" hidden selected disabled>--Select options--</option>
													
												</select>
											</div>

											<div class="form-group">	
												<label class="info-title" for="notes">Notes <span>*</span></label>
												{{-- <input type="number" name="post_code" class="form-control unicase-form-control text-input" id="post_code" placeholder=""> --}}
												<textarea name="notes" id="notes" class="form-control unicase-form-control text-input" cols="30" rows="5" placeholder="Notes"></textarea>
											</div>

										</div>	
										<!-- already-registered-login -->		

									</div>			
								</div>
								<!-- panel-body  -->

							</div><!-- row -->
						</div>
						<!-- checkout-step-01  -->


					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">

										@php
											// dd($carts)
										@endphp

										@foreach($carts as $row)
										<li>
											<strong>Image: &emsp;</strong>
											<img src="{{ asset($row->options->image) }}" height="50" width="100" alt="">
										</li>
										<li>
											<strong>Qty: </strong>
											<span> ({{ $row->qty }}) &emsp;</span>

											<strong>Color: </strong>
											<span> {{ $row->options->color }} &emsp;</span>

											<strong>Size: </strong>
											<span> {{ $row->options->size }} </span>
										</li>
										<hr>
										@endforeach

										@if(session()->has('coupon'))
											<li>
												<strong>SubTotal: &emsp;</strong>
												<span> ${{ $cartTotal }} </span>
											</li>
											<hr>
											<li>
												<strong>Coupon Name: &emsp;</strong>
												<span> {{ session()->get('coupon')['coupon_name'] }} </span>
												<span> ( {{ session()->get('coupon')['coupon_discount'] }}% ) </span>
											</li>
											<hr>
											<li>
												<strong>Coupon Discount: &emsp;</strong>
												<span> ${{ session()->get('coupon')['discount_amount'] }} </span>
											</li>
											<hr>
											<li>
												<strong>Grand Total: &emsp;</strong>
												<span> ${{ session()->get('coupon')['total_amount'] }} </span>
											</li>
											<hr>
										@else
											<li>
												<strong>SubTotal : &emsp;</strong>
												<span> ${{ $cartTotal }} </span>
											</li>
											<hr>
											<li>
												<strong>Grand Total : &emsp;</strong>
												<span> ${{ $cartTotal }} </span>
											</li>
											<hr>
										@endif

									</ul>		
								</div>
							</div>
						</div>
					</div> 
					<!-- checkout-progress-sidebar -->	

					<!-- checkout-PAYMENT-METHOD -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">SELECT PAYMENT METHOD</h4>
								</div>
								<div class="row">

									<div class="col-md-4">
										<div class="form-group">
											<label for="stripe">Stripe</label>
											<input type="radio" name="payment_method" value="stripe">
											<img src="{{ asset('frontend') }}/assets/images/payments/4.png" alt="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="card">Card</label>
											<input type="radio" name="payment_method" value="card">
											<img src="{{ asset('frontend') }}/assets/images/payments/3.png" alt="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cash">Cash</label>
											<input type="radio" name="payment_method" value="cash">
											<img src="{{ asset('frontend') }}/assets/images/payments/6.png" alt="">
										</div>
									</div> 

								</div>
								<hr>

									<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
									{{-- <input type="" type="submit" class="btn-upper btn btn-primary checkout-page-button" value="Payment Step"> --}}

								</form>

							</div>
						</div>
					</div> 
					<!-- checkout-PAYMENT-METHOD -->			
				</div>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection


@section('user-js')
	
{{-- Select-2 --}}
<script src="{{ asset('assets') }}/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('assets') }}/vendor_components/select2/dist/js/select2.full.js"></script>


<script>
	$(function () {
    "use strict";

    //Initialize Select2 Elements
    $('.select2').select2();

	
  });
</script>

{{-- Ajax --}}
<script>
	$(document).ready(function(){
		$('select[name="division_id"]').change(function(){
			var division_id = $(this).val();
			// alert(division_id);

			$.ajax({
				type: 'GET',		
				dataType: 'JSON',	
				url: '{{ url("/district-get/ajax") }}/'+division_id,		
				success:function(res){
					console.log(res);

					$('select[name="district_id"]').empty();
					// // $('select[name="state_id"]').empty();
					$('select[name="state_id"]').html('');
					$.each(res, function(key, value){
						$('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
					});

				}	
			});

		});
	});

	$(document).ready(function(){
		$('select[name="district_id"]').change(function(){
			var district_id = $(this).val();
			// alert(district_id);

			$.ajax({
				url:'{{ url("/state-get/ajax") }}/'+district_id,		
				type:'GET',		
				dataType:'JSON',	
				success:function(res){
					console.log(res);

					$('select[name="state_id"]').empty();
					$.each(res, function(key, value){
						$('select[name="state_id"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');
					});

				}	
			});

		});
	});
</script>

@endsection
