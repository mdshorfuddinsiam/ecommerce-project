@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Edit Slider Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('slider.update', ['slider' => @$slider->id]) }}" enctype="multipart/form-data">
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Title En <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="title_en" class="form-control"> --}}
										<textarea name="title_en" id="title_en" class="form-control">{{ @$slider->title_en }}</textarea> 
										@error('title_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Title Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="title_bn" class="form-control">  --}}
										<textarea name="title_bn" id="title_bn" class="form-control">{{ @$slider->title_bn }}</textarea> 
										@error('title_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Description En <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="description_en" class="form-control"> --}}
										<textarea name="description_en" id="description_en" class="form-control">{{ @$slider->description_en }}</textarea>
										@error('description_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Description Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										{{-- <input type="text" name="description_bn" class="form-control"> --}}
										<textarea name="description_bn" id="description_bn" class="form-control">{{ @$slider->description_bn }}</textarea>
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
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Slider">
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