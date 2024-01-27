@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">


			<div class="col-6">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">District Create Form</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('district.update', ['ShipDistrict' => $ShipDistrict->id]) }}" >
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Divisions <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="division_id" class="form-control" >
											<option value="#" selected hidden disabled>Select Division</option>
											@foreach($divisions as $row)
											<option value="{{ $row->id }}" {{ @$row->id == @$ShipDistrict->division_id ? 'selected' : '' }} >{{ @$row->division_name }}</option>
											@endforeach
										</select>
										@error('division_id')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>

								<div class="form-group">
									<h5>District Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="district_name" class="form-control" value="{{ @$ShipDistrict->district_name }}">
										@error('district_name')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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

