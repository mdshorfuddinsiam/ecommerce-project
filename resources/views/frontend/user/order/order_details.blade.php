@extends('frontend.main_master')

@section('content')


<div class="body-content">
	<div class="container">
		<div class="row">

			{{-- User Sidebar --}}
			@include('frontend.common.user_sidebar')
			{{-- End User Sidebar --}}

			
			<div class="col-md-5">
				<div class="card" style="margin-top: 30px;">
					<div class="card-header">
						<h4>Shipping Details</h4>
					</div>
					<div class="card-body bg-info">
						<table class="table">
							<tr>
								<th>Shipping Name :</th>
								<td>{{ @$order->name }}</td>
							</tr>

							<tr>
								<th>Shipping Email :</th>
								<td>{{ @$order->email }}</td>
							</tr>

							<tr>
								<th>Shipping Phone :</th>
								<td>{{ @$order->phone }}</td>
							</tr>

							<tr>
								<th>Division :</th>
								<td>{{ @$order->division->division_name }}</td>
							</tr>
							
							<tr>
								<th>District :</th>
								<td>{{ @$order->district->district_name }}</td>
							</tr>
							
							<tr>
								<th>State :</th>
								<td>{{ @$order->state->state_name }}</td>
							</tr>

							<tr>
								<th>Post Code :</th>
								<td>{{ @$order->post_code }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div> {{-- end col-md-5 --}}

			<div class="col-md-5">
				<div class="card" style="margin-top: 30px;">
					<div class="card-header">
						<h4>Order Details</h4>
						<h4>
							<span class="text-danger"> Invoice : {{ $order->invoice_no }}</span>
						</h4>
					</div>
					<div class="card-body bg-info">
						<table class="table">
							<tr>
								<th>Name :</th>
								<td>{{ $order->user->name }}</td>
							</tr>

							<tr>
								<th>Email :</th>
								<td>{{ $order->user->email }}</td>
							</tr>

							<tr>
								<th>Payment Type :</th>
								<td>{{ $order->payment_method }}</td>
							</tr>

							<tr>
								<th>Tranx ID :</th>
								<td>{{ $order->transaction_id }}</td>
							</tr>
							
							<tr>
								<th>Invoice :</th>
								<td class="text-danger">{{ $order->invoice_no }}</td>
							</tr>
							
							<tr>
								<th>Order Total :</th>
								<td>${{ $order->amount }}</td>
							</tr>

							<tr>
								<th>Order/Status :</th>
								<td>
									<span class="badge badge-pill badge-warning" style="background-color: blue">{{ $order->status }}</span>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div> {{-- end col-md-5 --}}

		</div>

		<div class="row">
			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

			<div class="col-md-10">

				<div class="table-responsive" style="margin-top: 30px;">
					<table class="table table-hover">
						{{-- <thead>
							<h4 class="text-center">Orders</h4>
						</thead> --}}
						<tbody>
							<tr style="background: #ddd0d0;">
								<th class="col-md-2">
									<label for="">Image</label>	
								</th>
								<th class="col-md-3">
									<label for="">Product Name</label>		
								</th>
								<th class="col-md-1">
									<label for="">Product Code</label>				
								</th>
								<th class="col-md-1">
									<label for="">Color</label>				
								</th>
								<th class="col-md-1">
									<label for="">Size</label>
								</th>
								<th class="col-md-1">
									<label for="">Quantity</label>			
								</th>
								<th class="col-md-3">
									<label for="">Price</label>			
								</th>
							</tr>
							@forelse($orderItems as $orderItem)
							<tr style="background-color: #fffbfb">
								<td class="col-md-2">
									<img src="{{ asset(@$orderItem->product->product_thambnail) }}" height="50px" alt="">
								</td>
								<td class="col-md-3">
									{{ @$orderItem->product->product_name_en }}
								</td>
								<td class="col-md-2">
									{{ @$orderItem->product->product_code }}
								</td>
								<td class="col-md-1">
									{{ @$orderItem->color }}
								</td>
								<td class="col-md-1">
									{{ @$orderItem->size }}
								</td>
								<td class="col-md-1">
									{{ @$orderItem->qty }}
								</td>
								<td class="col-md-3">
									${{ @$orderItem->price }} (${{ @$orderItem->price * @$orderItem->qty}})
								</td>
							</tr>
							@empty
							@endforelse
						</tbody>
					</table>
				</div>

			</div> {{-- end col-md-10 --}}
		</div>


		@if($order->status !== "delivered")
      	@else
      		@if($order->return_reason == NULL)
			<div class="row" style="margin-top: 20px">
				<div class="col-md-10 offset-2">

					<form action="{{ route('return.order', ['order' => @$order->id]) }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="return_reason"><h4> Order Return Reason:</h4></label>
							<textarea class="form-control" name="return_reason" id="return_reason" cols="30" rows="5">Return Reason</textarea>
						</div>
						<button type="submit" class="btn btn-lg btn-danger pull-right">Submit</button>
					</form>

				</div>
			</div>
			<br><br>
			@else
			<div class="row" style="margin-bottom: 20px">
				<div class="col-md-2">
				</div>
				<div class="col-md-10">
					<span class="badge badge-pill badge-secondary">Order Already Return Requested</span>
				</div>
			</div>
			@endif
		@endif

	</div>
</div>



@endsection

{{-- @section('user-js')
	<script>
		$('#logout').click(function(event){
			event.preventDefault();
			$('#logoutForm').submit();
		});
	</script>
@endsection --}}