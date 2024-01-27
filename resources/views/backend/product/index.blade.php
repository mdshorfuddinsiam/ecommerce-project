@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Products <span class="badge badge-pill badge-success">{{ count($products) }}</span></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Image </th>
									<th>Product En</th>
									<th>Product Price </th>
									<th>Quantity </th>
									<th>Discount </th>
									<th>Status </th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($products);
								@endphp
								@foreach($products as $row)
								<tr>
									<td>
										<img src="{{ asset(@$row->product_thambnail) }}" width="80" height="80" alt="">
									</td>
									<td>{{ @$row->product_name_en }}</td>
									<td>{{ @$row->selling_price }}</td>
									<td>{{ @$row->product_qty }}</td>
									<td>
										@if(@$row->discount_price == Null)
											<span class="badge badge-pill badge-danger">No Discount</span>
										@else
											{{-- @php
											$amount = $item->selling_price - $item->discount_price;
											$discount = ($amount/$item->selling_price) * 100;
											@endphp --}}
											@php 
												$amount = $row->selling_price - $row->discount_price;
												$discount = ($amount/$row->selling_price) * 100;
												// $discount = ($row->discount_price/$amount) * 100;
												// dd($discount); 
											@endphp
											<span class="badge badge-pill badge-danger">{{ round($discount) }} %</span>
										@endif
									</td>
									<td>
										@if(@$row->status == 1)
											<span class="badge badge-pill badge-success">Active</span>
										@else
											<span class="badge badge-pill badge-danger">In-Active</span>
										@endif
									</td>
									<td>
										<a href="" class="btn btn-primary mr-5" title="Product Details Data"><i class="fa fa-eye"></i></a>
										<a href="{{ route('product.edit', ['product'=>@$row->id]) }}" class="btn btn-info mr-5" title="Edit Data"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('product.delete', ['product'=>@$row->id]) }}" class="btn btn-danger mr-5" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
										@if(@$row->status == 1)
											<a href="{{ route('product.inactive', ['product'=>@$row->id]) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
										@else
											<a href="{{ route('product.active', ['product'=>@$row->id]) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						  </table>
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
</script>

@endsection