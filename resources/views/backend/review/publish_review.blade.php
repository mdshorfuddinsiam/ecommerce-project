@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Published Reviews <span class="badge badge-pill badge-success">{{ count($publishReviews) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Summary</th>
									<th>Comment</th>
									<th>User Name</th>
									<th>Product Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($publishReviews);
								@endphp
								@foreach($publishReviews as $row)
								<tr>
									<td>{{ @$row->summary }}</td>
									<td>${{ @$row->comment }}</td>
									<td>{{ @$row->user->name }}</td>
									<td>{{ @$row->product->product_name_en }}</td>
									<td>
										@if($row->status == 0)
										<span class="badge badge-pill badge-primary" >Pending</span>
										@elseif($row->status == 1)
										<span class="badge badge-pill badge-success" >Publish</span>
										@endif
									</td>
									<td>
										<a href="{{ route('delete.publish.review', @$row->id) }}" class="btn btn-danger mr-5">Delete</a>
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