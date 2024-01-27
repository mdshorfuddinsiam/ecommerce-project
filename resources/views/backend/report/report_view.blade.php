@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Order List By Date <span class="badge badge-pill badge-success">{{ count($orders) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Data</th>
									<th>Invoice</th>
									<th>Payment</th>
									<th>Invoice</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($orders);
								@endphp
								@foreach($orders as $row)
								<tr>
									<td>{{ @$row->order_date }}</td>
									<td>${{ @$row->amount }}</td>
									<td>{{ @$row->payment_method }}</td>
									<td>{{ @$row->invoice_no }}</td>
									<td>
										<span class="badge badge-pill badge-warning" style="background-color: #418DB9;">{{ @$row->status }}</span>
									</td>
									<td>
										<a href="{{ route('order.details', ['orderId'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-eye"></i></a>
										{{-- <a href="{{ route('pending-order.details', ['orderId'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-eye"></i></a> --}}

										<a target="_blank" href="{{ route('invoice.download', ['orderId'=>@$row->id]) }}" class="btn btn-danger" title="Invoice Download"><i class="fa fa-download"></i></a>
										{{-- <a href="{{ route('coupon.delete', ['coupon'=>@$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
									</td>
								</tr>
								@endforeach
							</tbody>
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
			</div>


		</div>
	</section>
</div>	

@endsection

@section('admin-js')

<script>
	// $(document).ready(function(){
	// 	$('#delete').click(function(e){
	$(function(){
		$(document).on('click', '#delete', function(e){
			e.preventDefault();
			var link = $(this).attr('href');

			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	window.location.href = link;
			    Swal.fire(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    )
			  }
			});

		});
	});
</script>

@endsection