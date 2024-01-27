<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ @$seoSetting->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="author" content="{{ @$seoSetting->meta_author }}">
<meta name="keywords" content="{{ @$seoSetting->meta_keywords }}">
{{-- <meta name="keywords" content="MediaCenter, Template, eCommerce"> --}}
<meta name="robots" content="all">
{{-- <title>Easy Online Shop</title> --}}
<title>@yield('title')</title>


<!-- /// Google Analytics Code // -->
<script>
    {{ $seoSetting->google_analytics }}
</script>
<!-- /// Google Analytics Code // -->


<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/blue.css">
@php
  // dd(\Request::route()->getName());
@endphp

<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.transitions.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/rateit.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap-select.min.css">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/font-awesome.css">

{{-- toaster css --}}
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

@yield('front-user-css')

</head>


<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->

@yield('content')

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend') }}/assets/js/jquery-1.11.1.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>

{{-- @if(\Request::route()->getName() != 'home.blog') --}}
@if(url()->current() != 'blog' )
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script> 
@endif

<script src="{{ asset('frontend') }}/assets/js/echo.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/jquery.easing-1.3.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/bootstrap-slider.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/jquery.rateit.min.js"></script> 
<script type="text/javascript" src="{{ asset('frontend') }}/assets/js/lightbox.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/bootstrap-select.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script> 
<script src="{{ asset('frontend') }}/assets/js/scripts.js"></script>

{{-- sweetalert js --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- toaster js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
@if(Session::has('message'))
    {{-- var type = "{{ Session::get('alert-type', 'info') }}"; --}}
    var type = "{{ Session::get('alert-type') }}";
    switch(type){
      // case 'info':
      {{-- //     toastr.info("{{ Session::get('message') }}"); --}}
      //     break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;

      default:
          toastr.info("{{ Session::get('message') }}");
          break;
    }
@endif
</script>

{{-- Ajax Setup --}}
<script>
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
      // 'X-CSRF-TOKEN : $('meta[name="csrf-token"]').attr('content')
    }
  });
  
</script>
{{-- End Ajax Setup --}}

{{-- Advance Search Ajax --}}
<script>
  $(document).ready(function(){
    $('#search').keyup(function(){

      var text = $('#search').val();
      // alert(text);
      // console.log(text);
      // console.log(text.length);

      if(text.length > 0){
        $.ajax({

          method: 'POST',
          // dataType: 'json',
          data: {search:text},
          url: '{{ url("/search-product") }}',

          success:function(res){
            console.log(res);

            // $('#searchProducts').empty();
            // $.each(res.products, function(index, value){
            //   $('#searchProducts').append(`<li><a href=""><img src="${value.product_thambnail}" alt="" width="50"><span style="margin-left: 10px">${value.product_name_en}</span></a></li><hr>`);
            // });


            $('#searchProducts').addClass('serach-products');

            $('#searchProducts').html(res);
            // $('#searchProducts').append(res);

          }

        });
      }
      if(text.length < 1){
        $('#searchProducts').html('');
        $('#searchProducts').removeClass('serach-products');
      }

    });
  });



    // $("body").on("keyup", "#search", function(){

    //     let text = $("#search").val();
    //     // console.log(text);

    //     $.ajax({
    //         data: {search: text},
    //         url : '{{ url("/search-product") }}', 
    //         method : 'post',
            
    //         success:function(result){

    //             console.log(result);

    //             $("#searchProducts").html(result);

    //         }

    //     }); // end ajax 


    // }); // end one
</script>

<script>
  function search_result_show(){
    $('#searchProducts').slideDown();
  }
  function search_result_hide(){
    $('#searchProducts').slideUp();
  }
</script>
{{-- End Advance Search Ajax --}}


@yield('user-js')


</body>
</html>

