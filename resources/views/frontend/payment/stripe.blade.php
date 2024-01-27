@extends('frontend.main_master')

@section('title')
  Stripe Payment Page 
@endsection

@section('content')

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
  
</style>


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

									<form action="{{ route('stripe.order') }}" method="post" id="payment-form">
										@csrf
										<div class="form-row">
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

											<div id="card-element">
												<!-- A Stripe Element will be inserted here. -->
											</div>
											<!-- Used to display form errors. -->
											<div id="card-errors" role="alert"></div>
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

	<script src="https://js.stripe.com/v3/"></script>
	<script>
		// Set your publishable key: remember to change this to your live publishable key in production
		// See your keys here: https://dashboard.stripe.com/apikeys
		var stripe = Stripe('pk_test_51KuyjDKdjtHDQMO1Pmb3lDIThAIUX2bqvb5JxhfGnavyhm0wfgptcfJHk1MUwskwvKd5Qrg5a4evXifenafwP2ax00TQ6HpFa1');
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		var style = {
		  base: {
		    // Add your base input styles here. For example:
		    fontSize: '16px',
		    color: '#32325d',
		  },
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
	</script>

@endsection
