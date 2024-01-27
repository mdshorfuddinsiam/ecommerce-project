@extends('frontend.main_master')

@section('content')


<div class="body-content">
	<div class="container">
		<div class="row">

			{{-- User Sidebar --}}
			@include('frontend.common.user_sidebar')
			{{-- End User Sidebar --}}

			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

			<div class="col-md-6">

				<div class="card">
					<h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{  Auth::user()->name }}</strong> Welcome To Easy Online Shop</h3>
				</div>
			</div> {{-- end col-md-6 --}}

			<div class="col-md-2">
			</div> {{-- end col-md-2 --}}

		</div>
	</div>
</div>



@endsection

{{-- @section('user-js')
	<script>
		$('#logout').click(function(event){
			event.preventDefault();
			$('#logoutForm').submit();
		});
	</script>
@endsection --}}