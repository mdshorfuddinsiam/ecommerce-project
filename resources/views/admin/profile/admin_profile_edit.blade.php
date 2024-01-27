@extends('admin.admin_master')

@section('admin')


<div class="container-full">

	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Admin Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">


					<form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
						@csrf

					  <div class="row">
						<div class="col-12">	
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Admin User Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" class="form-control" value="{{ @$editData->name }}" required=""> </div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Admin Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="email" name="email" class="form-control" value="{{ @$editData->email }}" required=""> </div>
									</div>
								</div> {{-- end col-6 --}}
							</div> {{-- end row --}}
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Profile Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input id="image" type="file" name="profile_photo_path" class="form-control" > </div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<img id="showImage" src="{{ (!empty($editData->profile_photo_path)) ? url($editData->profile_photo_path) : url('upload/no_image.jpg') }}" width="100" height="100" alt="User Avatar">
								</div> {{-- end col-6 --}}
							</div> {{-- end row --}}	
						</div>	
					  </div>							
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	<!-- /.content -->
</div>


@endsection

@section('admin-js')
	<script>
		$(document).ready(function(){
			$('#image').change(function(e){
				// console.log(e);
				var reader = new FileReader();
				reader.onload = function(e){
					$('#showImage').attr('src', e.target.result);
				}
				reader.readAsDataURL(e.target.files['0']);
			});
		});
	</script>
@endsection