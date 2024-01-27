<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend') }}/images/favicon.ico">

    <title>Easy Ecommerce - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/css/skin_color.css">

  {{-- toaster css --}}
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.body.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  

    @yield('admin')


  </div>
  <!-- /.content-wrapper -->
  @include('admin.body.footer')
  

  <!-- Control Sidebar -->
  @include('admin.body.right-sidebar')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	{{-- All JS links --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Vendor JS -->
	<script src="{{ asset('backend') }}/js/vendors.min.js"></script>
    <script src="{{ asset('assets') }}/icons/feather-icons/feather.min.js"></script>	
	

  {{-- Data Table JS --}}
  <script src="{{ asset('assets') }}/vendor_components/datatable/datatables.min.js"></script>
  <script src="{{ asset('backend') }}/js/pages/data-table.js"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend') }}/js/template.js"></script>
	

  {{-- toaster js --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

  {{-- Sweetalert JS --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    // MY CODE
    @if(Session::has('message'))
        // const Toast = Swal.mixin({
        //   toast: true,
        //   position: 'top-end',
          
        //   showConfirmButton: false,
        //   timer: 3000
        // });

        // var type = "{{ Session::get('alert-type') }}";
        // console.log(type);

        // switch(type){
        //   case 'warning':
        //       Toast.fire({
        //           type: 'warning',
        //           icon: 'error',
        //           title: '{{ Session::get('message') }}',
        //       });
        //       break;

        //   case 'success':
        //       Toast.fire({
        //           type: 'success',
        //           icon: 'success',
        //           title: '{{ Session::get('message') }}',
        //       });
        //       break;

        //   case 'error':
        //       Toast.fire({
        //             type: 'error',
        //             icon: 'error',
        //             title: '{{ Session::get('message') }}',
        //       });
        //       break;

        //   default:
        //       Toast.fire({
        //           type: 'info',
        //           icon: 'info',
        //           title: '{{ Session::get('message') }}',
        //       });
        //       break;
        // }
    @endif
    // END MY CODE
  </script>

  @yield('admin-js')
	
</body>
</html>
