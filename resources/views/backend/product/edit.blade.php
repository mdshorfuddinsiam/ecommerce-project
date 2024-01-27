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
			  <h4 class="box-title">Edit Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					@php 
						// dd($product);
					@endphp

					{{-- <form method="POST" action="@route('product.store')" enctype="multipart/form-data"> --}}
					<form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" >
						@csrf

					  <div class="row">
						<div class="col-12">	

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Brand Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="brand_id" id="brand_id" required="" class="form-control select2" style="width: 100%;">
												<option value="" hidden selected disabled>Select Brand</option>
												
												@forelse($brands as $row)
													<option value="{{ @$row->id }}" {{ @$product->brand_id == @$row->id ? 'selected' : '' }}>{{ @$row->brand_name_en }}</option>
												@empty
													{{-- <option value="">No Brands</option> --}}
												@endforelse
											</select>
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Category Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="category_id" id="category_id" required="" class="form-control select2" style="width: 100%;">
												<option value="" hidden selected disabled>Select Category</option>
												@forelse($categories as $row)
													<option value="{{ @$row->id }}" {{ @$product->category_id == @$row->id ? 'selected' : '' }}>{{ @$row->category_name_en }}</option>
												@empty
												@endforelse
											</select>
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Subcategory Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="subcategory_id" id="subcategory_id" required="" class="form-control select2" style="width: 100%;">
												<option value="" hidden selected disabled>Select Subcategory</option>
												@forelse($subcategories as $row)
													<option value="{{ @$row->id }}" {{ @$product->subcategory_id == @$row->id ? 'selected' : '' }}>{{ @$row->subcategory_name_en }}</option>
												@empty
												@endforelse
											</select>
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 1st --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Sub-Subcategory Select <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="subsubcategory_id" id="subsubcategory_id" required="" class="form-control select2" style="width: 100%;">
												<option value="" hidden selected disabled>Select Sub-Subcategory</option>
												@forelse($subsubcategories as $row)
													<option value="{{ @$row->id }}" {{ @$product->subsubcategory_id == @$row->id ? 'selected' : '' }}>{{ @$row->subsubcategory_name_en }}</option>
												@empty
												@endforelse
											</select>
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Name En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_name_en" class="form-control" value="{{ @$product->product_name_en }}"> </div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Name Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_name_bn" class="form-control" value="{{ @$product->product_name_bn }}"> </div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 2nd --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Code <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_code" class="form-control" value="{{ @$product->product_code }}"> </div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Quantity <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="number" name="product_qty" class="form-control" value="{{ @$product->product_qty }}"> </div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Tags En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_tags_en" value="{{ @$product->product_tags_en }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 3rd --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Tags Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_tags_bn" value="{{ @$product->product_tags_bn }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Size En </h5>
										<div class="controls">
											<input type="text" name="product_size_en" value="{{ @$product->product_size_en }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Size Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_size_bn" value="{{ @$product->product_size_bn }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 4th --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Product Color En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_color_en" value="{{ @$product->product_color_en }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Product Color Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_color_bn" value="{{ @$product->product_color_bn }}" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 5th --}}			

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Product Selling Price <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="number" name="selling_price" class="form-control" value="{{ @$product->selling_price }}"> 
										</div>
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<h5>Product Discount Price </h5>
										<div class="controls">
											<input type="number" name="discount_price" class="form-control" value="{{ @$product->discount_price }}"> 
										</div>
									</div>
								</div> {{-- end col-6 --}}
								{{--  --}}
								{{--  --}}
							</div>	{{-- end row 6th --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Short Description En <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="short_descp_en" id="short_descp_en" class="form-control">{{ @$product->short_descp_en }}</textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Short Description Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="short_descp_bn" id="short_descp_bn" class="form-control">{{ @$product->short_descp_bn }}</textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 7th --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Long Description English <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="long_descp_en" id="long_descp_en" class="form-control" required="" rows="10" cols="80" >{{ @$product->long_descp_en }}</textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Long Description Bangla <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="long_descp_bn" id="long_descp_bn" class="form-control" required="" rows="10" cols="80" >{{ @$product->long_descp_bn }}</textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 8th --}}			
							
							<hr>

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="hot_deals" id="hot_deals" value="1" {{ @$product->hot_deals == '1' ? 'checked' : '' }}>
											<label for="hot_deals">Hot Deals</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="featured" id="featured" value="1" {{ @$product->featured == '1' ? 'checked' : '' }}>
											<label for="featured">Featured</label>
										</div>								
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="special_offer" id="special_offer"  {{ @$product->special_offer == '1' ? 'checked' : '' }} value="1">
											<label for="special_offer">Special Offer</label>
										</div>			
										<div class="controls">
											<input type="checkbox" name="special_deals" id="special_deals" value="1" {{ @$product->special_deals == '1' ? 'checked' : '' }}>
											<label for="special_deals">Special Deals</label>
										</div>								
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 9th --}}	
							
						</div>
					  </div>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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


	  {{-- ////////// Multi Images Update ////////// --}}
	  <section class="content">
		<div class="row">
		  <div class="col-md-12">
		  	<div class="box bt-3 border-info">
		  	  <div class="box-header">
		  		<h4 class="box-title">Porduct Images <strong>Update</strong></h4>
		  	  </div>

		  	  <div class="box-body">

		  		<form method="POST" action="{{ route('product-image.update') }}" enctype="multipart/form-data">
		  		    @csrf

		  		  <div class="row">
		  			@forelse($multiImages as $img)
		  			  <div class="col-3">
		  				<div class="card" >
		  				  <img src="{{ asset(@$img->photo_name) }}" class="card-img-top" width="130" height="280">
		  				  <div class="card-body">
		  				    <h5 class="card-title">
		  				    	<a href="{{ route('product-image.delete', ['multiImg'=>@$img->id]) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
		  				    </h5>
		  				    <p class="card-text">
		  				    	<div class="form-group">
		  				    		<label class="col-form-label">Update Image</label>
		  				    		<input type="file" name="multi_img[{{$img->id}}]" class="form-control">
		  				    	</div>
		  				    </p>
		  				  </div>
		  				</div>
		  			  </div>
		  			@empty
		  			@endforelse
		  		  </div>
		  		  <div class="text-xs-right">
		  		  	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		  		  </div>
		  		</form>

		  	  </div>
		  	</div>
		  </div>	
		</div>	
	  </section>
	  {{-- ////////// End Multi Images Update ////////// --}}


	  {{-- ////////// Product Thambnail Update ////////// --}}
	  <section class="content">
		<div class="row">
		  <div class="col-md-12">
		  	<div class="box bt-3 border-info">
		  	  <div class="box-header">
		  		<h4 class="box-title">Porduct Thambnail <strong>Update</strong></h4>
		  	  </div>

		  	  <div class="box-body">

		  		<form method="POST" action="{{ route('product-thambnail.update', ['product'=>@$product->id]) }}" enctype="multipart/form-data">
		  		    @csrf	

		  		  <div class="row">
		  			  <div class="col-3">
		  				<div class="card" >
		  				  <img src="{{ asset(@$product->product_thambnail) }}" class="card-img-top" width="130" height="280">
		  				  <div class="card-body">
		  				    <h5 class="card-title">
		  				    	<a href="{{ route('product-thambnail.delete', ['product'=>@$product->id]) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
		  				    </h5>
		  				    <p class="card-text">
		  				    	<div class="form-group">
		  				    		<label class="col-form-label">Update Image</label>
		  				    		<input type="file" name="product_thambnail" class="form-control">
		  				    	</div>
		  				    </p>
		  				  </div>
		  				</div>
		  			  </div>
		  		  </div>
		  		  <div class="text-xs-right">
		  		  	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Thambnail">
		  		  </div>
		  		</form>

		  	  </div>
		  	</div>
		  </div>	
		</div>	
	  </section>
	  {{-- ////////// End Product Thambnail Update ////////// --}}

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
	CKEDITOR.replace('long_descp_en');	
	CKEDITOR.replace('long_descp_bn');
	//bootstrap WYSIHTML5 - text editor
	// $('.textarea').wysihtml5();	
	
  });
</script>

{{-- Ajax --}}
<script>
	$(document).ready(function(){
		$('select[name="category_id"]').change(function(){
			var cat_id = $(this).val();
			// alert(cat_id);

			$.ajax({
				url:'{{ url("/category/subcategory/ajax") }}/'+cat_id,		
				type:'GET',		
				dataType:'JSON',	
				success:function(res){
					// console.log(res);

					$('select[name="subcategory_id"]').empty();
					// $('select[name="subsubcategory_id"]').empty();
					$('select[name="subsubcategory_id"]').html('');
					$.each(res, function(key, value){
						$('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
					});

				}	
			});

		});
	});

	$(document).ready(function(){
		$('select[name="subcategory_id"]').change(function(){
			var subcat_id = $(this).val();
			// alert(subcat_id);

			$.ajax({
				url:'{{ url("/category/subsubcategory/ajax") }}/'+subcat_id,		
				type:'GET',		
				dataType:'JSON',	
				success:function(res){
					console.log(res);

					$('select[name="subsubcategory_id"]').empty();
					$.each(res, function(key, value){
						$('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>');
					});

				}	
			});

		});
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


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

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