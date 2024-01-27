<div class="col-md-2">
	<br>
	<img class="card-img-top" style="border-radius: 100%" src="{{ (!empty($user->profile_photo_path)) ? url($user->profile_photo_path) : url('upload/no_image.jpg') }}" width="100%" height="100%" alt="">
	<br>
	<br>
	<ul class="list-group list-group-flush">
		<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
		<a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
		<a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
		<a href=" {{ route('my.orders') }} " class="btn btn-primary btn-sm btn-block">My Orders</a>
		<a href=" {{ route('return.order.list') }} " class="btn btn-primary btn-sm btn-block">Return Orders</a>
		<a href=" {{ route('cancel.order.list') }} " class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
		<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
		{{-- <a href="#" id="logout" class="btn btn-danger btn-sm btn-block">Logout</a> --}}
		{{-- <form id="logoutForm" method="POST" action="{{ route('logout') }}">
			@csrf
		</form> --}}
	</ul>
</div> {{-- end col-md-2 --}}


{{-- <img class="card-img-top" style="border-radius: 50%" src="{{ asset($user->profile_photo_path) }}" width="100%" height="100%" alt=""> --}}