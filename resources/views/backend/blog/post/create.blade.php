@extends('admin.admin_master')

@section('admin')

<style>
	.select2-container--default .select2-selection--single {
		background-color: #272e48;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		color: #8a99b5;
	}
	.select2-container--default .select2-selection--single {
		border: 1px solid rgba(255, 255, 255, 0.12);
	}
	
	.bootstrap-tagsinput {
		background-color: #272e48;
		border: 1px solid rgba(255, 255, 255, 0.12);
	}
	.bootstrap-tagsinput input {
		color: #8a99b5;
	}
	.cke_top {
		background: #272e48;
	}
	.cke_bottom {
		background: #272e48;
		color: #8a99b5;
	}
	.cke_editable {
		color: #8a99b5;
		background: #272e48;
	}
	.cke_reset_all, .cke_reset_all * {
    background: #272e48;
}
</style>

<div class="container-full">
			  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Blog Post</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					{{-- <form method="POST" action="@route('product.store')" enctype="multipart/form-data"> --}}
					<form method="POST" action="{{ route('blog.post.store') }}" enctype="multipart/form-data">
						@csrf

					  <div class="row">
						<div class="col-12">	



							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Post Title En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="post_title_en" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Post Title Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="post_title_bn" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 1st --}}


							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Blog Category Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="blogcategory_id" id="blogcategory_id" required="" class="form-control select2" style="width: 100%;">
												<option value="" hidden selected disabled>Select BLog Category</option>
												@forelse($blogCategories as $row)
													<option value="{{ @$row->id }}" >{{ @$row->blog_category_name_en }}</option>
												@empty
												@endforelse
											</select>
										</div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Post Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="post_image" class="form-control" required="" onChange="mainThamUrl(this)"> 
											<img src="" id="mainThmb">
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 2nd --}}


							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Post Details English <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="post_details_en" id="post_details_en" class="form-control" required="" rows="10" cols="80" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Long Description Bangla <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="post_details_bn" id="post_details_bn" class="form-control" required="" rows="10" cols="80" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 3rd --}}	


							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Author </h5>
										<div class="controls">
											<input type="text" name="author" class="form-control"> 
										</div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Blog Category Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="status" id="status" required="" class="form-control select2" style="width: 100%;">
												<option value="#" selected hidden disabled>Select Blog Category Status</option>
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 4th --}}	

							<br><br>	
							
							<hr>

							
						</div>
					  </div>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Post">
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

{{-- <script>
	var css = '' +
          '<style type="text/css">' +
          'body{margin:0;padding:0;background:red}' +
          '</style>';
</script> --}}
{{-- Tags Input --}}
<script src="{{ asset('assets') }}/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

{{-- Select-2 --}}
<script src="{{ asset('assets') }}/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('assets') }}/vendor_components/select2/dist/js/select2.full.js"></script>

{{-- ck editor --}}
<script src="{{ asset('assets') }}/vendor_components/ckeditor/ckeditor.js"></script>
{{-- <script src="{{ asset('assets') }}/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script> --}}
{{-- <script src="{{ asset('backend') }}/js/pages/editor.js"></script> --}}
<script>
	$(function () {
    "use strict";

    //Initialize Select2 Elements
    $('.select2').select2();

    // Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('post_details_en');	
	CKEDITOR.replace('post_details_bn');
	//bootstrap WYSIHTML5 - text editor
	// $('.textarea').wysihtml5();	
	
  });
</script>



<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>



@endsection