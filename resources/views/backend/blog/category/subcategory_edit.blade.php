@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">



			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Blog Sub-Category Edit Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('blog.subcategory.update', @$blogSubCategory->id) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp


								<div class="form-group">
									<h5>Blog Categories <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="blogcategory_id" class="form-control" >
											<option value="#" selected hidden disabled>Select Catgory</option>
											@foreach($blogCategories as $row)
											<option value="{{ $row->id }}" {{ @$blogSubCategory->blogcategory_id == @$row->id ? 'selected' : ''}}>{{ @$row->blog_category_name_en }}</option>
											@endforeach
										</select>
										@error('blogcategory_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<h5>Blog Sub-Category Name En <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="blog_subcategory_name_en" class="form-control" value="{{ @$blogSubCategory->blog_subcategory_name_en }}"> 
										@error('blog_subcategory_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Blog Sub-Category Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="blog_subcategory_name_bn" class="form-control" value="{{ @$blogSubCategory->blog_subcategory_name_bn }}"> 
										@error('blog_subcategory_name_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>

								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" class="form-control" aria-invalid="false">
											<option value="#" selected hidden disabled>Select Blog  Sub-Category Status</option>
											<option value="1" {{ @$blogSubCategory->status == '1' ? 'selected' : ' ' }}>Active</option>
											<option value="0" {{ @$blogSubCategory->status == '0' ? 'selected' : ' ' }}>Inactive</option>
										</select>
									</div>
								</div>

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