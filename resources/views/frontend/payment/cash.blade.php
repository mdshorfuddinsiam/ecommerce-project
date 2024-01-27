@extends('frontend.main_master')

@section('title')
  Cash On Delivery Page 
@endsection

@section('content')


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

				<!-- checkout-progress-sidebar -->
				<div class="col-md-6">
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Shopping Amount</h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">


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
				</div>
				<!-- checkout-progress-sidebar -->	

				<!-- checkout-PAYMENT-METHOD -->
				<div class="col-md-6">
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">SELECT PAYMENT METHOD</h4>
								</div>
								<div class="row">

									<form action="{{ route('cash.order') }}" method="post" id="payment-form">
										@csrf

										<div class="form-row">

											<img src="{{ asset('frontend') }}/assets/images/payments/cash.png" alt="">

											<label for="card-element">

												@php
													// dd($data);
													// dd($data['shipping_email']);
												@endphp

												{{-- Credit or debit card --}}
												<input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
												<input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
												<input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
												<input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
												<input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
												<input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
												<input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
												<input type="hidden" name="notes" value="{{ $data['notes'] }}">
												<input type="hidden" name="payment_method" value="{{ $data['payment_method'] }}">

											</label>
										</div>
										<br>
										<button class="btn btn-primary">Submit Payment</button>
									</form>

								</div>
							</div>
						</div> 
					</div>
				</div>
				<!-- checkout-PAYMENT-METHOD -->			

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection


@section('user-js')

@endsection
