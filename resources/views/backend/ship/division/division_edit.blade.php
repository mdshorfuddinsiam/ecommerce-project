@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">


			{{-- Division Edit --}}
			<div class="col-6">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Division Edit Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('division.update', ['ShipDivision' => $ShipDivision->id]) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Division Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="division_name" class="form-control" value="{{ $ShipDivision->division_name }}"> 
										@error('division_name')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
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
			{{-- End Division Edit --}}


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
</script>

@endsection