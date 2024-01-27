@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Districts <span class="badge badge-pill badge-success">{{ count($districts) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Division Name</th>
									<th>District Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($districts);
								@endphp
								@foreach($districts as $row)
								<tr>
									{{-- <td>{{ @$row->division_id }}</td> --}}
									<td>{{ ucwords(@$row->division->division_name) }}</td>
									<td>{{ ucwords(@$row->district_name) }}</td>
									<td>
										@if($row->status == '1')
											<span class="badge badge-pill badge-success">Active</span>
										@else
											<span class="badge badge-pill badge-danger">In-Active</span>
										@endif
									</td>
									<td width="30%">
										<a href="{{ route('district.edit', ['ShipDistrict'=>@$row->id]) }}" class="btn btn-info mr-5"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('district.delete', ['ShipDistrict'=>@$row->id]) }}" id="delete" class="btn btn-danger mr-5"><i class="fa fa-trash"></i></a>

										@if($row->status == '1')
											<a href="{{ route('district.inactive', ['ShipDistrict'=>@$row->id]) }}" class="btn btn-warning mr-5" title="In-Active Now"><i class="fa fa-arrow-down"></i></a>
										@else
											<a href="{{ route('district.active', ['ShipDistrict'=>@$row->id]) }}" class="btn btn-success mr-5" title="Active Now"><i class="fa fa-arrow-up"></i></a>

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
					  <h3 class="box-title">District Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('district.store') }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Divisions <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="division_id" class="form-control" >
											<option value="" selected hidden disabled>Select Division</option>
											@foreach($divisions as $row)
											<option value="{{ $row->id }}" >{{ @$row->division_name }}</option>
											@endforeach
										</select>
										@error('division_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>

								{{-- {{ @$row->id == @$district->division_id ? 'selected' : '' }} --}}

								<div class="form-group">
									<h5>District Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="district_name" class="form-control"> 
										@error('district_name')
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