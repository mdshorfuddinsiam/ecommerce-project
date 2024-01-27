@extends('frontend.main_master')

@section('content')


<div class="body-content">
	<div class="container">
		<div class="row">

			{{-- User Sidebar --}}
			@include('frontend.common.user_sidebar')
			{{-- End User Sidebar --}}

			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

			<div class="col-md-8">

				<div class="table-responsive" style="margin-top: 30px;">
					<table class="table table-hover">
						<thead>
							<h4 class="text-center" style="font-weight: 900;">Return Orders</h4>
						</thead>
						<tbody>
							<tr style="background: #ddd0d0;">
								<th class="col-md-1">
									<label for="">Date</label>	
								</th>
								<th class="col-md-2">
									<label for="">Total</label>		
								</th>
								<th class="col-md-1">
									<label for="">Payment</label>				
								</th>
								<th class="col-md-3">
									<label for="">Invoice</label>				
								</th>
								<th class="col-md-1">
									<label for="">Order/Status</label>
								</th>
								<th class="col-md-4">
									<label for="">Action</label>			
								</th>
							</tr>
							@forelse($orders as $order)
							<tr style="background-color: #fffbfb">
								<td class="col-md-1">
									{{ @$order->order_date }}
								</td>
								<td class="col-md-2">
									${{ @$order->amount }}
								</td>
								<td class="col-md-1">
									{{ @$order->payment_method }}
								</td>
								<td class="col-md-3">
									{{ @$order->invoice_no }}
								</td>
								<td class="col-md-1">
									<span class="badge badge-pill badge-warning" style="background-color: #418DB9;">{{ @$order->status }}</span>
								</td>
								<td class="col-md-4">
									<a href="{{ url('user/my/order-details/'.@$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
									<a href="{{ url('user/my/invoice-download/'.@$order->id) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download"></i> Invoice</a>
								</td>
							</tr>

							{{-- <tr style="background-color: white">
								<td class="col-md-1">
									<label for="">{{ @$order->order_date }}</label>
								</td>
								<td class="col-md-2">
									<label for="">${{ @$order->amount }}</label>
								</td>
								<td class="col-md-1">
									<label for="">{{ @$order->payment_method }}</label>
								</td>
								<td class="col-md-3">
									<label for="">{{ @$order->invoice_no }}</label>
								</td>
								<td class="col-md-1">
									<label for="">{{ @$order->status }}</label>
								</td>
								<td class="col-md-4">
									Action
								</td>
							</tr> --}}
							@empty
							<h2 class="text-danger">Order Not Found</h2>
							@endforelse
						</tbody>
					</table>
				</div>
				
			</div> {{-- end col-md-8 --}}

			

		</div>
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