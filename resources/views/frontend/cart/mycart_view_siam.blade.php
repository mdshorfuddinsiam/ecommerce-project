<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>


			@if(session()->has('coupon'))
				<tr>
					<th>
						<div class="cart-sub-total">
							Subtotal<span class="inner-left-md">${{ \Cart::total() }}</span>
						</div>
						<div class="cart-sub-total">
							Coupon<span class="inner-left-md">{{ session()->get('coupon')['coupon_name'] }}</span>
						</div>
						<div class="cart-sub-total">
							Discount<span class="inner-left-md">${{ session()->get('coupon')['discount_amount'] }}</span>
						</div>
						<div class="cart-grand-total">
							Grand Total<span class="inner-left-md">${{ session()->get('coupon')['total_amount'] }}</span>
						</div>
					</th>
				</tr>
			@else
				<tr>
					<th>
						<div class="cart-sub-total">
							Subtotal<span class="inner-left-md">${{ \Cart::total() }}</span>
						</div>
						<div class="cart-grand-total">
							Grand Total<span class="inner-left-md">${{ \Cart::total() }}</span>
						</div>
					</th>
				</tr>
			@endif


		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->


