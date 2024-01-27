@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Users <span class="badge badge-pill badge-success">{{ count($users) }}</span></h3>
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
									<th>Phone</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($users);
								@endphp
								@foreach($users as $row)
								<tr>
									<td>
										<img src="{{ !empty(@$row->profile_photo_path) ? asset(@$row->profile_photo_path) : asset('upload/no_image.jpg') }}" width="100" height="80" alt="">
									</td>
									<td>{{ @$row->name }}</td>
									<td>{{ @$row->email }}</td>
									<td>{{ @$row->phone }}</td>
									<td>
										<span class="badge badge-pill badge-success">Active Now</span>
									</td>
									<td>
										<a href=" " class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href=" " id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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