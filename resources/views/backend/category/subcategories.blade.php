@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Subcategories <span class="badge badge-pill badge-success">{{ count($subcategories) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Category Name</th>
									<th>Subcategory Name Bn</th>
									<th>Subcategory Name En</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($subcategories);
								@endphp
								@foreach($subcategories as $row)
								<tr>
									<td>{{ @$row->category->category_name_en }}</td>
									<td>{{ @$row->subcategory_name_en }}</td>
									<td>{{ @$row->subcategory_name_bn }}</td>
									<td>{{ @$row->status == '1' ? 'Active' : 'Inactive' }}</td>
									<td style="width: 18%">
										<a href="{{ route('subcategory.edit', ['subcategory'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('subcategory.delete', ['subcategory'=>@$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
					  <h3 class="box-title">subcategory Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('subcategory.store') }}" >
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
											<option value="{{ $row->id }}">{{ @$row->category_name_en }}</option>
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
										<input type="text" name="subcategory_name_en" class="form-control"> 
										@error('subcategory_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Subcategory Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="subcategory_name_bn" class="form-control"> 
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
											<option value="1">Active</option>
											<option value="0">Inactive</option>
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