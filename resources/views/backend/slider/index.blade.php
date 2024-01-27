@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-8">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Sliders <span class="badge badge-pill badge-success">{{ count($sliders) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Slider Image</th>
									<th>Title En</th>
									<th>Description En</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($sliders);
								@endphp
								@foreach($sliders as $row)
								<tr>
									<td>
										<img src="{{ asset(@$row->slider_image) }}" width="100" height="80" alt="">
									</td>
									<td>
							            @if($row->title_en == NULL)
									 	<span class="badge badge-pill badge-danger"> No Title </span>
									 	@else
							             {{ $row->title_en }}
									 	@endif
									</td>
									<td>
							            @if($row->description_en == NULL)
									 	<span class="badge badge-pill badge-danger"> No Description </span>
									 	@else
							             {{ $row->description_en }}
									 	@endif
									</td>
									{{-- <td>{{ @$row->status == '1' ? 'Active' : 'Inactive' }}</td> --}}
									<td>
										@if($row->status == 1)
											<span class="badge badge-pill badge-success"><i class="fa fa-toggle-on"></i></span>
										@else
											<span class="badge badge-pill badge-danger"><i class="fa fa-toggle-off"></i></span>
										@endif
									</td>
									<td style="width: 22%">
										<a href="{{ route('slider.edit', ['slider'=>@$row->id]) }}" class="btn btn-sm btn-info mr-5" title="Slider Edit"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('slider.delete', ['slider'=>@$row->id]) }}" id="delete" class="btn btn-sm btn-danger mr-5" title="Slider Delete"><i class="fa fa-trash"></i></a>
										@if($row->status == 1)
											<a href="{{ route('slider.inactive', ['slider'=>@$row->id]) }}" class="btn btn-sm btn-danger" title="Active Now"><i class="fa fa-arrow-down"></i></a>
										@else
											<a href="{{ route('slider.active', ['slider'=>@$row->id]) }}" class="btn btn-sm btn-success" title="In-Active Now"><i class="fa fa-arrow-up"></i></a>
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
					  <h3 class="box-title">Add Slider Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Title En <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="title_en" class="form-control"> --}}
										<textarea name="title_en" id="title_en" class="form-control"></textarea> 
										@error('title_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Title Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="title_bn" class="form-control">  --}}
										<textarea name="title_bn" id="title_bn" class="form-control"></textarea> 
										@error('title_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Description En <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="description_en" class="form-control"> --}}
										<textarea name="description_en" id="description_en" class="form-control"></textarea>
										@error('description_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Description Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="description_bn" class="form-control"> --}}
										<textarea name="description_bn" id="description_bn" class="form-control"></textarea>
										@error('description_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Slider Image <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="file" name="slider_image" class="form-control" >
										@error('slider_image')
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