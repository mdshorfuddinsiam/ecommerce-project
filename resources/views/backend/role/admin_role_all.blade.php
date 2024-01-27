@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Admin User Role <span class="badge badge-pill badge-success">{{ count($adminUsers) }}</span></h3>
					  <a href="{{ route('add.admin.user') }}" class="btn btn-success float-right">Add Admin User</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>Email</th>
									<th>Access</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($adminUsers);
								@endphp
								@foreach($adminUsers as $row)
								<tr>
									<td>
										<img src="{{ !empty(@$row->profile_photo_path) ? asset(@$row->profile_photo_path) : asset('upload/no_image.jpg') }}" width="100" height="80" alt="">
									</td>
									<td>{{ @$row->name }}</td>
									<td>{{ @$row->email }}</td>
									<td>

										@if(@$row->brand == 1)
										<span class="badge badge-primary">Brand</span>
										@else
										@endif

										@if(@$row->category == 1)
										<span class="badge badge-secondary">Category</span>
										@else
										@endif
										
										@if(@$row->product == 1)
										<span class="badge badge-success">Product</span>
										@else
										@endif
										
										@if(@$row->slider == 1)
										<span class="badge badge-danger">Slider</span>
										@else
										@endif
										
										@if(@$row->coupon == 1)
										<span class="badge badge-warning">Coupon</span>
										@else
										@endif
										
										@if(@$row->shipping == 1)
										<span class="badge badge-info">Shipping Area</span>
										@else
										@endif
										
										@if(@$row->blog == 1)
										<span class="badge badge-light">Blog</span>
										@else
										@endif
										
										@if(@$row->setting == 1)
										<span class="badge badge-dark">Setting</span>
										@else
										@endif
										
										@if(@$row->orders == 1)
										<span class="badge badge-success">Orders</span>
										@else
										@endif
										
										@if(@$row->returnorder == 1)
										<span class="badge badge-primary">Return Order</span>
										@else
										@endif
										
										@if(@$row->stock == 1)
										<span class="badge badge-secondary">Product Stock</span>
										@else
										@endif
										
										@if(@$row->review == 1)
										<span class="badge badge-info">Review</span>
										@else
										@endif
										
										@if(@$row->reports == 1)
										<span class="badge badge-success">All Reports</span>
										@else
										@endif
										
										@if(@$row->alluser == 1)
										<span class="badge badge-danger">All Users</span>
										@else
										@endif
										
										@if(@$row->adminuserrole == 1)
										<span class="badge badge-warning">Admin Role</span>
										@else
										@endif
										
									</td>
									<td>
										<a href="{{ route('edit.admin.user', ['id'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('delete.admin.user', ['id'=>@$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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