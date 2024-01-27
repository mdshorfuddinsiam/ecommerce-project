@extends('admin.admin_master')

@section('admin')


<div class="container-full">

	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Admin User Role</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">


					<form method="post" action="{{ route('update.admin.user', @$adminUser->id) }}" enctype="multipart/form-data">
						@csrf

					  <div class="row">
						<div class="col-12">


							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Admin User Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" class="form-control" value="{{ @$adminUser->name }}" > </div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Admin Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="email" name="email" class="form-control" value="{{ @$adminUser->email }}" > </div>
									</div>
								</div> {{-- end col-6 --}}
							</div> {{-- end row --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Admin Phone <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="phone" class="form-control" value="{{ @$adminUser->phone }}" > </div>
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
									<img id="showImage" src="{{ (!empty($adminUser->profile_photo_path)) ? url($adminUser->profile_photo_path) : url('upload/no_image.jpg') }}" width="100" height="100" alt="User Avatar">
								</div> {{-- end col-6 --}}
							</div> {{-- end row --}}	

							<br>

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="brand" id="brand" value="1" {{ @$adminUser->brand == 1 ? 'checked' : '' }} >
											<label for="brand">Brand</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="category" id="category" value="1" {{ @$adminUser->category == 1 ? 'checked' : '' }} >
											<label for="category">Category</label>
										</div>								
										<div class="controls">
											<input type="checkbox" name="product" id="product" value="1" {{ @$adminUser->product == 1 ? 'checked' : '' }} >
											<label for="product">Product</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="slider" id="slider" value="1" {{ @$adminUser->slider == 1 ? 'checked' : '' }} >
											<label for="slider">Slider</label>
										</div>	
										<div class="controls">
											<input type="checkbox" name="coupon" id="coupon" value="1" {{ @$adminUser->coupon == 1 ? 'checked' : '' }} >
											<label for="coupon">Coupon</label>
										</div>								
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="shipping" id="shipping" value="1" {{ @$adminUser->shipping == 1 ? 'checked' : '' }} >
											<label for="shipping">Shipping Area</label>
										</div>			
										<div class="controls">
											<input type="checkbox" name="blog" id="blog" value="1" {{ @$adminUser->blog == 1 ? 'checked' : '' }} >
											<label for="blog">Blog</label>
										</div>		
										<div class="controls">
											<input type="checkbox" name="setting" id="setting" value="1" {{ @$adminUser->setting == 1 ? 'checked' : '' }} >
											<label for="setting">Setting</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="orders" id="orders" value="1" {{ @$adminUser->orders == 1 ? 'checked' : '' }} >
											<label for="orders">Orders</label>
										</div>	
										<div class="controls">
											<input type="checkbox" name="returnorder" id="returnorder" value="1" {{ @$adminUser->returnorder == 1 ? 'checked' : '' }} >
											<label for="returnorder">Return Order</label>
										</div>						
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="stock" id="stock" value="1" {{ @$adminUser->stock == 1 ? 'checked' : '' }} >
											<label for="stock">Product Stock</label>
										</div>			
										<div class="controls">
											<input type="checkbox" name="review" id="review" value="1" {{ @$adminUser->review == 1 ? 'checked' : '' }} >
											<label for="review">Review</label>
										</div>		
										<div class="controls">
											<input type="checkbox" name="reports" id="reports" value="1" {{ @$adminUser->reports == 1 ? 'checked' : '' }} >
											<label for="reports">All Reports</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="alluser" id="alluser" value="1" {{ @$adminUser->alluser == 1 ? 'checked' : '' }} >
											<label for="alluser">All Users</label>
										</div>	
										<div class="controls">
											<input type="checkbox" name="adminuserrole" id="adminuserrole" value="1" {{ @$adminUser->adminuserrole == 1 ? 'checked' : '' }} >
											<label for="adminuserrole">Admin Role</label>
										</div>						
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row  --}}	


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