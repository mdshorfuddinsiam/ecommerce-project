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
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					@php
						// dd($data);
					@endphp

					{{-- <form method="POST" action="@route('product.store')" enctype="multipart/form-data"> --}}
					<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
													<option value="{{ @$row->id }}" >{{ @$row->brand_name_en }}</option>
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
													<option value="{{ @$row->id }}" >{{ @$row->category_name_en }}</option>
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
												
											</select>
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Name En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_name_en" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Name Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_name_bn" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 2nd --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Code <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_code" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Quantity <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="number" value="{{ old('product_qty') ?? 0 }}" min="0" name="product_qty" class="form-control" required=""> </div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Tags En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 3rd --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Tags Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_tags_bn" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Size En </h5>
										<div class="controls">
											<input type="text" name="product_size_en" value="Large,Medium,Small" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Size Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_size_bn" value="Large,Medium,Small" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 4th --}}

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Color En <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_color_en" value="Red,Green,Blue" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Product Color Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="product_color_bn" value="Red,Green,Blue" data-role="tagsinput" placeholder="add tags" /> 
										</div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Product Selling Price <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="number" value="{{ old('selling_price') ?? 0 }}" min="0" name="selling_price" class="form-control" required=""> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 5th --}}			

							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<h5>Product Discount Price </h5>
										<div class="controls">
											<input type="number" value="{{ @old('discount_price') }}"  name="discount_price" class="form-control" > 
										</div>
									</div>
								</div> {{-- end col-4 --}}
								<div class="col-4">
									<div class="form-group">
										<h5>Main Thumbnail <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="product_thambnail" class="form-control" required="" onChange="mainThamUrl(this)"> 
											<img src="" id="mainThmb">
										</div>
									</div>
								</div> {{-- end col-4 --}}

								<div class="col-4">
									<div class="form-group">
										<h5>Multiple Image</h5>
										<div class="controls">
											<input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
											<div class="row" id="preview_img">
											</div> 
										</div>
									</div>
								</div> {{-- end col-4 --}}
							</div>	{{-- end row 6th --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Short Description En <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="short_descp_en" id="short_descp_en" class="form-control" required="" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Short Description Bn <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="short_descp_bn" id="short_descp_bn" class="form-control" required="" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 7th --}}

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h5>Long Description English <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="long_descp_en" id="long_descp_en" class="form-control" required="" rows="10" cols="80" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}

								<div class="col-6">
									<div class="form-group">
										<h5>Long Description Bangla <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="long_descp_bn" id="long_descp_bn" class="form-control" required="" rows="10" cols="80" ></textarea>
										</div>
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 8th --}}			
							
							<hr>

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="hot_deals" id="hot_deals" value="1">
											<label for="hot_deals">Hot Deals</label>
										</div>					
										<div class="controls">
											<input type="checkbox" name="featured" id="featured" value="1">
											<label for="featured">Featured</label>
										</div>								
									</div>
								</div> {{-- end col-6 --}}
								<div class="col-6">
									<div class="form-group">
										<div class="controls">
											<input type="checkbox" name="special_offer" id="special_offer" value="1">
											<label for="special_offer">Special Offer</label>
										</div>			
										<div class="controls">
											<input type="checkbox" name="special_deals" id="special_deals" value="1">
											<label for="special_deals">Special Deals</label>
										</div>								
									</div>
								</div> {{-- end col-6 --}}
							</div>	{{-- end row 9th --}}	
							
						</div>
					  </div>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Product">
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
		// console.log(input);
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

@endsection