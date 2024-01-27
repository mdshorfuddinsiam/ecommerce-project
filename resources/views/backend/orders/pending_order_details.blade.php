@extends('admin.admin_master')

@section('admin')

{{-- Like Breadcrumb --}}
<div class="content-header">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="page-title">Pending Order Details</h3>
			<div class="d-inline-block align-items-center">
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
						<li class="breadcrumb-item" aria-current="page">Pending Order Details</li>
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

@endsection