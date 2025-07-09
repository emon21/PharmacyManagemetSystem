<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - Pharmacy M.S</title>
  <meta content="Pharmacy Management System" name="author">
  <meta content="Pharmacy Management System" name="Pharmacy Management System">
  
  {{-- <title>{{ $title }}</title> --}}
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  <link href="{{ asset('admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Toastr Notification --->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.22.2/sweetalert2.css"/>

  <!-- Template Main CSS File -->
  {{-- <link href="{{ asset('admin') }}/assets/css/custom.css" rel="stylesheet"> --}}
  <link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
  
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  
  <!-- End Sidebar-->

  <main id="main" class="main" style="min-height: 100vh">

      @yield('content')

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')
  <!-- End Footer -->

 <!-- jQuery (required by Toastr) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/quill/quill.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('admin') }}/assets/vendor/php-email-form/validate.js"></script>
 <!-- Toastr Notification --->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 

  <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin') }}/assets/js/main.js"></script>
 
  <script>
    // @if (session('success'))
    //   toastr.success("{{ session('success') }}");
    // @endif

    // @if (session('error'))
    //   toastr.error("{{ session('error') }}");
    // @endif

    // @if (session('info'))
    //   toastr.info("{{ session('info') }}");
    // @endif

    // @if (session('warning'))
    //   toastr.warning("{{ session('warning') }}");
    // @endif

    // @if (session('message'))
    //   toastr.info("{{ session('message') }}");
    // @endif

    // @if (session('messages'))
    //   toastr.info("{{ session('messages') }}");
    // @endif

    // @if (session('errors'))
    //   toastr.error("{{ session('errors') }}");
    // @endif

    @if(session('notification'))
        const notify = {!! json_encode(session('notification')) !!};

        toastr.options = {
            "closeButton": notify.closeButton,
            "progressBar": notify.progressBar,
            "positionClass": "toast-" + notify.position,
            "timeOut": notify.timeOut,
            "extendedTimeOut": notify.extendedTimeOut,
            "showMethod": notify.showMethod,
            "hideMethod": notify.hideMethod,
        };

        toastr[notify.type](notify.message, notify.title);
    @endif
    

    // # switch case
        // switch (session('type')) {
        //   case 'success':
        //     toastr.success("{{ session('message') }}");
        //     break;
        //   case 'error':
        //     toastr.error("{{ session('message') }}");
        //     break;
        //   case 'info':
        //     toastr.info("{{ session('message') }}");
        //     break;
        //   case 'warning':
        //     toastr.warning("{{ session('message') }}");
        //     break;
        //   default:
        //     toastr.info("{{ session('message') }}");
        // }

    // @if(Session::has('message'))
    //     toastr.info("{{ Session::get('message') }}");
    // @endif

    // @if(Session::has('success'))
    //     toastr.success("{{ Session::get('success') }}");
    // @endif

    // @if(Session::has('error'))
    //     toastr.error("{{ Session::get('error') }}");
    // @endif

    // @if(Session::has('info'))
    //     toastr.info("{{ Session::get('info') }}");
    // @endif

    // @if(Session::has('warning'))
    //     toastr.warning("{{ Session::get('warning') }}");
    // @endif

  </script>


<!-- SweetAlert2 CSS & JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.22.2/sweetalert2.min.js" ></script>
<!-- SweetAlert2 JS -->
<script src="{{ asset('js') }}/custom.js"></script>
<script>
  @if(session('success'))
      Swal.fire({
          icon: 'success',
          title: '{{ session("success") }}',
          showConfirmButton: false,
          timer: 2000
      });
  @endif

  @if(session('info'))
      Swal.fire({
          icon: 'success',
          title: '{{ session("info") }}',
          showConfirmButton: false,
          timer: 2000,
          position: "top-end",

      });
  @endif

//   Swal.fire({
//   title: "Drag me!",
//   icon: "success",
//   draggable: true
// });

// Swal.fire({
//   position: "top-end",
//   icon: "success",
//   title: "Your work has been saved",
//   showConfirmButton: false,
//   timer: 1500
// });

  @if(session('error'))
      Swal.fire({
          icon: 'error',
          title: '{{ session("error") }}',
          showConfirmButton: false,
          timer: 2000
      });
  @endif

// <!-- Delete Medicine --->
  function deleteConfirm(id) {
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
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>


{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

@stack('scripts')
</body>

</html>