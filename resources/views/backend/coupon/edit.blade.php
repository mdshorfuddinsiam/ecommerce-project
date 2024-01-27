@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			{{-- ========== Edit Coupon ========== --}}
			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Coupon Update</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('coupon.update', ['coupon' => $coupon->id]) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Coupon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}"> 
										@error('coupon_name')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="coupon_discount" class="form-control" value="{{ $coupon->coupon_discount }}"> 
										@error('coupon_discount')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Coupon Validity <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
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
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Coupon">
								</div>
							</form>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
			</div>
			{{-- ========== Edit Coupon ========== --}}

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