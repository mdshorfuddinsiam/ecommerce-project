@extends('admin.admin_master')

@section('admin')


<div class="container-full">

	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Site Setting Update</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="post" action="{{ route('update.site.setting', @$siteSetting->id) }}" enctype="multipart/form-data">
						@csrf

					  <div class="row">
						<div class="col-12">	
							<div class="row">
								<div class="col-6">

									<div class="form-group">
										<h5>Site Logo <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="file" name="logo" class="form-control" value="{{ asset(@$siteSetting->logo) }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Company Name <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="company_name" class="form-control" value="{{ @$siteSetting->company_name }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Company Address <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="company_address" class="form-control" value="{{ @$siteSetting->company_address }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Phone One <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="phone_one" class="form-control" value="{{ @$siteSetting->phone_one }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Phone Two <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="phone_two" class="form-control" value="{{ @$siteSetting->phone_two }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Facebook <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="url" name="facebook" class="form-control" value="{{ @$siteSetting->facebook }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Twitter <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="url" name="twitter" class="form-control" value="{{ @$siteSetting->twitter }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Linkedin <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="url" name="linkedin" class="form-control" value="{{ @$siteSetting->linkedin }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>youtube <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="url" name="youtube" class="form-control" value="{{ @$siteSetting->youtube }}"> 
										</div>
									</div>

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

