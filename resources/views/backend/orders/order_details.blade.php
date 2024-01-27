@extends('admin.admin_master')

@section('admin')

{{-- Like Breadcrumb --}}
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="page-title"><strong>{{ ucfirst(@$order->status) }}</strong> Order Details</h3>
			<div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
						<li class="breadcrumb-item" aria-current="page"><strong>{{ ucfirst(@$order->status) }}</strong> &nbsp;Order Details</li>
						{{-- <li class="breadcrumb-item active" aria-current="page">Basic Box</li> --}}
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
{{-- end Like Breadcrumb --}}

<div class="container-full">
	<section class="content">
		<div class="row">


		  <div class="col-md-6 col-12">
			<div class="box box-bordered border-primary">
			  <div class="box-header with-border">
				<h4 class="box-title"><strong>Shipping Details</strong> </h4>
			  </div>
			  <div class="box-body">
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
		  </div>

		  <div class="col-md-6 col-12">
			<div class="box box-bordered border-primary">
			  <div class="box-header with-border">
				<h4 class="box-title"><strong>Order Details</strong> <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
			  </div>
			  <div class="box-body">
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

					<tr>
						<th></th>
						<td>
							@if($order->status == 'pending')
							<a href="{{ route('pending.confirm', @$order->id) }}" id="confirm" class="btn btn-block btn-success"> Confirm Order</a>

							@elseif($order->status == 'confirm')
							<a href="{{ route('confirm.processing', @$order->id) }}" id="processing" class="btn btn-block btn-success"> Processing Order</a>

							@elseif($order->status == 'processing')
							<a href="{{ route('processing.picked', @$order->id) }}" id="picked" class="btn btn-block btn-success"> Picked Order</a>
							
							@elseif($order->status == 'picked')
							<a href="{{ route('picked.shipped', @$order->id) }}" id="shipped" class="btn btn-block btn-success"> Shipped Order</a>
							
							@elseif($order->status == 'shipped')
							<a href="{{ route('shipped.delivered', @$order->id) }}" id="delivered" class="btn btn-block btn-success"> Delivered Order</a>
							
							@elseif($order->status == 'delivered')
							<a href="{{ route('delivered.cancel', @$order->id) }}" id="cancel" class="btn btn-block btn-success"> Cancel Order</a>
							
							@endif
						</td>
					</tr>

				</table>
			  </div>
			</div>
		  </div>

		  <div class="col-md-12 col-12">
			<div class="box box-bordered border-primary">
			  <div class="box-header with-border">
				<h4 class="box-title"><strong>Products</strong> </h4>
			  </div>
			  <div class="box-body">
				<table class="table ">
					{{-- <thead>
						<h4 class="text-center">Orders</h4>
					</thead> --}}
					<tbody>
						<tr >
							<th >
								<label for="">Image</label>	
							</th>
							<th >
								<label for="">Product Name</label>		
							</th>
							<th >
								<label for="">Product Code</label>				
							</th>
							<th >
								<label for="">Color</label>				
							</th>
							<th >
								<label for="">Size</label>
							</th>
							<th >
								<label for="">Quantity</label>			
							</th>
							<th >
								<label for="">Price</label>			
							</th>
						</tr>
						@forelse($orderItems as $orderItem)
						<tr >
							<td >
								<img src="{{ asset(@$orderItem->product->product_thambnail) }}" height="50px" alt="">
							</td>
							<td >
								{{ @$orderItem->product->product_name_en }}
							</td>
							<td >
								{{ @$orderItem->product->product_code }}
							</td>
							<td >
								{{ @$orderItem->color }}
							</td>
							<td >
								{{ @$orderItem->size }}
							</td>
							<td >
								{{ @$orderItem->qty }}
							</td>
							<td >
								${{ @$orderItem->price }} (${{ @$orderItem->price * @$orderItem->qty}})
							</td>
						</tr>
						@empty
						@endforelse
					</tbody>
				</table>
			  </div>
			</div>
		  </div>


		</div>
	</section>
</div>	

@endsection

@section('admin-js')

<script>
	{{-- Confirm --}}
	// $(document).ready(function(){
	// 	$('#delete').click(function(e){
	$(function(){
		$(document).on('click', '#confirm', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Confirm, You will not be able to pending again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, confirm it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Confirm!',
			      'Confirm Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Confirm --}}

	// {{-- Processing --}}
	$(function(){
		$(document).on('click', '#processing', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Processing, You will not be able to confirm again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, processing it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Processing!',
			      'Processing Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Processing --}}

	// {{-- Picked --}}
	$(function(){
		$(document).on('click', '#picked', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Picked, You will not be able to processing again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, picked it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Picked!',
			      'Picked Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Picked --}}

	// {{-- Shipped --}}
	$(function(){
		$(document).on('click', '#shipped', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Shipped, You will not be able to picked again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, shipped it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Shipped!',
			      'Shipped Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Shipped --}}

	// {{-- Delivered --}}
	$(function(){
		$(document).on('click', '#delivered', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Delivered, You will not be able to shipped again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delivered it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Delivered!',
			      'Delivered Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Delivered --}}

	// {{-- Cancel --}}
	$(function(){
		$(document).on('click', '#cancel', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "Once Cancel, You will not be able to delivered again!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, cancel it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Cancel!',
			      'Cancel Changes.',
			      'success'
			    )
			  }
			});

		});
	});
	// {{-- End Cancel --}}

</script>

@endsection