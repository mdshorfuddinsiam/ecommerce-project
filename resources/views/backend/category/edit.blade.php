@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Category Update Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('category.update', ['category' => $category->id]) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Category Name En <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="category_name_en" class="form-control" value="{{ @$category->category_name_en }}"> 
										@error('category_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Category Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="category_name_bn" class="form-control" value="{{ @$category->category_name_bn }}"> 
										@error('category_name_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Category Icon <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="category_icon" class="form-control" value="{{ @$category->category_icon }}">
										@error('category_icon')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" class="form-control" aria-invalid="false">
											<option value="#" selected hidden disabled>Select category Status</option>
											<option {{ @$category->status == '1' ? 'selected' : '' }} value="1">Active</option>
											<option {{ @$category->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
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

