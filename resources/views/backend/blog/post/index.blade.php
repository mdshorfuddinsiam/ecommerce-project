@extends('admin.admin_master')

@section('admin')

<div class="container-full">
	<section class="content">
		<div class="row">

			<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">All Blog Posts <span class="badge badge-pill badge-success">{{ count($blogPosts) }}</span></h3>
					  <a href="{{ route('blog.post.create') }}" class="btn btn-success float-right">Add Post</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Image </th>
									<th>Blog Category </th>
									<th>Post Title En</th>
									<th>Post Title Bn</th>
									<th>Status </th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									// dd($blogPosts);
								@endphp
								@foreach($blogPosts as $row)
								<tr>
									<td>
										<img src="{{ asset(@$row->post_image) }}" width="80" height="80" alt="">
									</td>
									<td>{{ @$row->blogCategory->blog_category_name_en }}</td>
									<td>{{ @$row->post_title_en }}</td>
									<td>{{ @$row->post_title_bn }}</td>
									<td>
										@if(@$row->status == 1)
											<span class="badge badge-pill badge-success">Active</span>
										@else
											<span class="badge badge-pill badge-danger">In-Active</span>
										@endif
									</td>
									<td width="20%">
										<a href="" class="btn btn-primary mr-5" title="Blog Post Details Data"><i class="fa fa-eye"></i></a>
										<a href="{{ route('blog.post.edit', @$row->id) }}" class="btn btn-info mr-5" title="Edit Data"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('blog.post.delete', @$row->id) }}" class="btn btn-danger mr-5" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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