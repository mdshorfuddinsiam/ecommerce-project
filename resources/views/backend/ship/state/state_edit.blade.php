@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			{{-- State Edit --}}
			<div class="col-6">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">State Edit Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('state.update', ['ShipState' => $ShipState->id]) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Divisions <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="division_id" class="form-control" >
											<option value="" selected hidden disabled>Select Division</option>
											@foreach($divisions as $row)
											<option value="{{ $row->id }}" {{ @$row->id == @$ShipState->division_id ? 'selected' : '' }} >{{ @$row->division_name }}</option>
											@endforeach
										</select>
										@error('division_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>

								<div class="form-group">
									<h5>Districts <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="district_id" class="form-control" >
											<option value="" selected hidden disabled>Select District</option>
											@foreach($districts as $row)
											<option value="{{ $row->id }}" {{ @$row->id == @$ShipState->district_id ? 'selected' : '' }} >{{ @$row->district_name }}</option>
											@endforeach
										</select>
										@error('district_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>								

								<div class="form-group">
									<h5>State Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="state_name" class="form-control" value="{{ @$ShipState->state_name }}">
										@error('state_name')
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

	// Ajax (Get Districts)
	$(document).ready(function(){
		$('select[name="division_id"]').on('change', function(){
			var div_id = $(this).val();
			// console.log(div_id);
			// alert(div_id);

			if(div_id){
				$.ajax({
					url:'{{ url("/shipping/district/ajax") }}/'+div_id, 
					type:'GET',
					dataType: 'json',
					success:function(res){
						// console.log(res);
						$('select[name="district_id"]').empty();
						$.each(res, function(key, value){
							$('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
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