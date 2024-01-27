@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">SubSubcategory Edit Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('subsubcategory.update', ['subsubcategory' => $subsubcategory->id]) }}" >
								@csrf

								@php 
									// dd($subcategories);
								@endphp

								<div class="form-group">
									<h5>Categories <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="category_id" class="form-control" >
											<option value="#" selected hidden disabled>Select Catgory</option>
											@foreach($categories as $row)
											<option value="{{ $row->id }}" {{ @$subsubcategory->category_id == @$row->id ? 'selected' : '' }}>{{ @$row->category_name_en }}</option>
											@endforeach
										</select>
										@error('category_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<h5>Subcategories <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="subcategory_id" class="form-control" >
											<option value="#" selected hidden disabled>Select Subcatgory</option>
											@foreach($subcategories as $row)
											<option value="{{ $row->id }}" {{ @$subsubcategory->subcategory_id == @$row->id ? 'selected' : '' }}>{{ @$row->subcategory_name_en }}</option>
											@endforeach
										</select>
										@error('subcategory_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<h5>SubSubcategory Name En <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="subsubcategory_name_en" class="form-control" value="{{ @$subsubcategory->subsubcategory_name_en }}"> 
										@error('subsubcategory_name_en')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>subSubcategory Name Bn <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="subsubcategory_name_bn" class="form-control" value="{{ @$subsubcategory->subsubcategory_name_bn }}"> 
										@error('subsubcategory_name_bn')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>
								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" class="form-control" >
											<option value="#" selected hidden disabled>Select subsubcategory Status</option>
											<option {{ @$subsubcategory->status == '1' ? 'selected' : '' }} value="1">Active</option>
											<option {{ @$subsubcategory->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
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

	$(document).ready(function(){
		$('select[name="category_id"]').on('change', function(){
			var cat_id = $(this).val();
			// console.log(cat_id);
			// alert(cat_id);

			if(cat_id){
				$.ajax({
					url:'{{ url("/category/subcategory/ajax") }}/'+cat_id, 
					type:'GET',
					dataType: 'json',
					success:function(res){
						console.log(res);
						$('select[name="subcategory_id"]').empty();
						$.each(res, function(key, value){
							$('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
						});
					},
				});
			}
			else{
				alert('danger');
			}

		});
	});
</script>

@endsection