@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Blog Sub-Category<span class="badge badge-pill badge-success">{{ count($blogSubCategories) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Category Name En</th>
									<th>Category Name Bn</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($blogSubCategories);
								@endphp
								@foreach($blogSubCategories as $row)
								<tr>
									<td>{{ @$row->blogCategory->blog_category_name_en }}</td>
									<td>{{ @$row->blog_subcategory_name_en }}</td>
									<td>{{ @$row->blog_subcategory_name_bn }}</td>
									<td>{{ @$row->status == '1' ? 'Active' : 'Inactive' }}</td>
									<td>
										<a href="{{ route('blog.subcategory.edit', @$row->id) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('blog.subcategory.delete', @$row->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
					  <h3 class="box-title">Blog Category Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('blog.subcategory.store') }}" >
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
											<option value="{{ $row->id }}">{{ @$row->blog_category_name_en }}</option>
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
										<input type="text" name="blog_subcategory_name_en" class="form-control"> 
										@error('blog_subcategory_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Blog Sub-Category Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="blog_subcategory_name_bn" class="form-control"> 
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
											<option value="1">Active</option>
											<option value="0">Inactive</option>
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