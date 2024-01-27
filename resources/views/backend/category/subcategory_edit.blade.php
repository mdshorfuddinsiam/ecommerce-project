@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Subcategory Edit Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('subcategory.update', ['subcategory' => $subcategory->id]) }}" >
								@csrf

								@php 
									// dd($subcategories);
								@endphp

								<div class="form-group">
									<h5>Categories <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="category_id" class="form-control" >
											<option value="#" selected hidden disabled>Select Catgory</option>
											@foreach($categories as $row)
											<option value="{{ $row->id }}" {{ @$subcategory->category_id == @$row->id ? 'selected' : '' }}>{{ @$row->category_name_en }}</option>
											@endforeach
										</select>
										@error('category_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<h5>Subcategory Name En <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="subcategory_name_en" class="form-control" value="{{ @$subcategory->subcategory_name_en }}"> 
										@error('subcategory_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Subcategory Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="subcategory_name_bn" class="form-control" value="{{ @$subcategory->subcategory_name_bn }}"> 
										@error('subcategory_name_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" class="form-control" >
											<option value="#" selected hidden disabled>Select subcategory Status</option>
											<option {{ @$subcategory->status == '1' ? 'selected' : '' }} value="1">Active</option>
											<option {{ @$subcategory->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
										</select>
									</div>
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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