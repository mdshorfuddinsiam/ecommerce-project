@extends('frontend.main_master')

@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Sign in</h4>
    <p class="">Hello, Welcome to your account.</p>
    <div class="social-sign-in outer-top-xs">
        <a href="{{ route('login.facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
    </div>

    <div class="social-sign-in outer-top-xs">
        <a href="{{ route('login.google') }}" class="btn btn-lg btn-danger" style="margin: 0px 10px 10px 0px;"><i class="fa fa-google"></i> Sign In with Google</a>
        <a href="{{ route('login.github') }}" class="btn btn-lg btn-warning" style="margin: 0px 0px 10px 0px;"><i class="fa fa-github"></i> Sign In with Github</a>
    </div>


    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf

        <div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
        </div>
        <div class="form-group">
            <label class="info-title" for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" id="remember_me" name="remember" value="option2">Remember me!
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
            @endif           
        </div>
        <input type="submit" class="btn-upper btn btn-primary checkout-page-button" value="Login">
    </form>      


</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>


    <form method="POST" action="{{ route('register') }}">
            @csrf

        <div class="form-group">
            <label class="info-title" for="name">Name <span>*</span></label>
            <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input type="email" id="email" name="email" class=" form-control unicase-form-control text-input">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="phone">Phone Number <span>*</span></label>
            <input type="text" id="phone" name="phone" class=" form-control unicase-form-control text-input">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="submit" class="btn-upper btn btn-primary checkout-page-button" value="Sign Up">
    </form>
    
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div>

@endsection