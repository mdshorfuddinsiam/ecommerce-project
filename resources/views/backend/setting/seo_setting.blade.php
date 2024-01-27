@extends('admin.admin_master')

@section('admin')


<div class="container-full">

	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Seo Setting Update</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="post" action="{{ route('update.seo.setting', @$seoSetting->id) }}" enctype="multipart/form-data">
						@csrf

					  <div class="row">
						<div class="col-12">	
							<div class="row">
								<div class="col-6">


									<div class="form-group">
										<h5>Meta Title <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="meta_title" class="form-control" value="{{ @$seoSetting->meta_title }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Meta Author <span class="text-danger"></span></h5>
										<div class="controls">
											<input type="text" name="meta_author" class="form-control" value="{{ @$seoSetting->meta_author }}"> 
										</div>
									</div>

									<div class="form-group">
										<h5>Meta Keywords <span class="text-danger"></span></h5>
										<div class="controls">
											{{-- <input type="text" name="meta_keywords" class="form-control" >  --}}
											<textarea name="meta_keywords"  cols="30" rows="5" class="form-control" >{{ @$seoSetting->meta_keywords }}</textarea>
										</div>
									</div>

									<div class="form-group">
										<h5>Phone Two <span class="text-danger"></span></h5>
										<div class="controls">
											{{-- <input type="text" name="phone_two" class="form-control" value="{{ @$seoSetting->phone_two }}">  --}}
											<textarea name="meta_description"  cols="30" rows="5" class="form-control" >{{ @$seoSetting->meta_description }}</textarea>
										</div>
									</div>

									<div class="form-group">
										<h5>Facebook <span class="text-danger"></span></h5>
										<div class="controls">
											{{-- <input type="url" name="facebook" class="form-control" value="{{ @$seoSetting->facebook }}">  --}}
											<textarea name="google_analytics"  cols="30" rows="5" class="form-control" >{{ @$seoSetting->google_analytics }}</textarea>
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

