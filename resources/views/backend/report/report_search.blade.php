@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">


			<div class="col-4">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Search By Date</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form action="{{ route('reports.by.date') }}"  method="POST">
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Select Date <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="date" name="date" class="form-control"> 
										@error('date')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror  
									</div>
								</div>


								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
								</div>
							</form>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
			</div> {{-- end col-4 --}}

			<div class="col-4">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Search By Month</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('reports.by.month') }}" enctype="multipart/form-data">
								@csrf

								@php 
									// dd($errors);
								@endphp

								{{-- <div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" class="form-control" aria-invalid="false">
											<option value="#" selected hidden disabled>Select Brand Status</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>
								</div> --}}

								<div class="form-group">
									<h5>Select Month<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="month" id="month" required="" class="form-control select2" style="width: 100%;">
											<option value="" hidden selected disabled>Select Month</option>
											<option value="January">January</option>
											<option value="February">February</option>
											<option value="March">March</option>
											<option value="April">April</option>
											<option value="May">May</option>
											<option value="June">June</option>
											<option value="July">July</option>
											<option value="August">August</option>
											<option value="September">September</option>
											<option value="October">October</option>
											<option value="November">November</option>
											<option value="December">December</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<h5>Select Year<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="year_name" id="year_name" required="" class="form-control select2" style="width: 100%;">
											<option value="" hidden selected disabled>Select Year</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="2032">2032</option>
										</select>
									</div>
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
								</div>
							</form>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
			</div> {{-- end col-4 --}}

			<div class="col-4">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Search By Year</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="POST" action="{{ route('reports.by.year') }}" enctype="multipart/form-data">
								@csrf

								@php 
									// dd($errors);
								@endphp

								<div class="form-group">
									<h5>Select Year<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="year" id="year" required="" class="form-control select2" style="width: 100%;">
											<option value="" hidden selected disabled>Select Year</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="2032">2032</option>
										</select>
									</div>
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
								</div>
							</form>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
			</div> {{-- end col-4 --}}


		</div>
	</section>
</div>	

@endsection

@section('admin-js')

{{-- Select-2 --}}
<script src="{{ asset('assets') }}/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('assets') }}/vendor_components/select2/dist/js/select2.full.js"></script>

<script>
	$(function () {
    "use strict";

    //Initialize Select2 Elements
    $('.select2').select2();
	
  });
</script>

@endsection