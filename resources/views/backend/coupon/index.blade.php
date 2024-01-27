@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Coupons <span class="badge badge-pill badge-success">{{ count($coupons) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Coupon Name</th>
									<th>Coupon Discount(%)</th>
									<th>Coupon Validity</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($coupons);
								@endphp
								@foreach($coupons as $row)
								<tr>
									<td>{{ @$row->coupon_name }}</td>
									<td>{{ @$row->coupon_discount }}%</td>
									<td>{{ Carbon\Carbon::parse(@$row->coupon_validity)->format('D, d F Y') }}</td>
									<td>
										@if($row->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
											<span class="badge badge-pill badge-success">Active</span>
										@else
											<span class="badge badge-pill badge-danger">In-Active</span>
										@endif
									</td>
									<td>
										<a href="{{ route('coupon.edit', ['coupon'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('coupon.delete', ['coupon'=>@$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


			<div class="col-4">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Coupon Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('coupon.store') }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Coupon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="coupon_name" class="form-control"> 
										@error('coupon_name')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="coupon_discount" class="form-control"> 
										@error('coupon_discount')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Coupon Validity <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
										@error('coupon_validity')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								{{-- <div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" class="form-control" aria-invalid="false">
											<option value="#" selected hidden disabled>Select Coupon Status</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>
								</div> --}}

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
								</div>
							</form>
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