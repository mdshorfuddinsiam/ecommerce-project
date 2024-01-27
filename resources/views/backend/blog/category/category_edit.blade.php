@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">


			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Blog Category Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('blog.category.update', @$blogCategory->id) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Blog Category Name En <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="blog_category_name_en" class="form-control" value="{{ @$blogCategory->blog_category_name_en }}"> 
										@error('blog_category_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Blog Category Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="blog_category_name_bn" class="form-control" value="{{ @$blogCategory->blog_category_name_bn }}"> 
										@error('blog_category_name_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>

								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" class="form-control" aria-invalid="false">
											<option value="#" selected hidden disabled>Select Blog Category Status</option>
											<option value="1" {{ @$blogCategory->status == '1' ? 'selected' : ' ' }}>Active</option>
											<option value="0" {{ @$blogCategory->status == '0' ? 'selected' : ' ' }}>Inactive</option>
										</select>
									</div>
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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


@endsection