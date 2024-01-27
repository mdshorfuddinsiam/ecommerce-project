@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Divisions <span class="badge badge-pill badge-success">{{ count($divisions) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Division Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($divisions);
								@endphp
								@foreach($divisions as $row)
								<tr>
									<td>{{ ucwords(@$row->division_name) }}</td>
									<td>
										@if($row->status == '1')
											<span class="badge badge-pill badge-success">Active</span>
										@else
											<span class="badge badge-pill badge-danger">In-Active</span>
										@endif
									</td>
									<td width="30%">
										<a href="{{ route('division.edit', ['ShipDivision'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('division.delete', ['ShipDivision'=>@$row->id]) }}" id="delete" class="btn btn-danger mr-5"><i class="fa fa-trash"></i></a>

										@if($row->status == '1')
											<a href="{{ route('division.inactive', ['ShipDivision'=>@$row->id]) }}" class="btn btn-warning mr-5" title="In-Active Now"><i class="fa fa-arrow-down"></i></a>
										@else
											<a href="{{ route('division.active', ['ShipDivision'=>@$row->id]) }}" class="btn btn-success mr-5" title="Active Now"><i class="fa fa-arrow-up"></i></a>

										@endif
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
					  <h3 class="box-title">Division Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('division.store') }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Division Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="division_name" class="form-control"> 
										@error('division_name')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
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