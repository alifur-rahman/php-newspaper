<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/css/app.min.css')}}">
  <!-- create page css  -->
  <link rel="stylesheet" href=" {{asset('public/admin_assets/bundles/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bundles/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bundles/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/bundles/jquery-selectric/selectric.css')}}">  
  <link rel="stylesheet" href="{{asset('public/admin_assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin_assets/css/components.css')}}">
  {{-- clock font famaly --}}
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Orbitron'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Aldrich'>
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('public/admin_assets/css/custom.css')}}">
  <link rel="shortcut icon" href="{{asset('public/admin_assets/img/favicon.ico')}}">

</head>
<body>
    @include('user/Layout.header')
    @yield('content')
    @include('user/Layout.footer')


<!-- General JS Scripts -->
    <script src="{{asset('public/admin_assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('public/admin_assets/bundles/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  
  <script src="{{asset('public/admin_assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <!--Post Page Specific JS File -->
  <script src="{{asset('public/admin_assets/js/page/posts.js')}}"></script>
  <!-- export datatable Specific JS File  -->
  <script src="{{asset('public/admin_assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
  <script src="{{asset('public/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('public/admin_assets/js/page/datatables.js')}}"></script>

  <!-- create Page Specific JS File -->
    <script src="{{asset('public/admin_assets/js/page/create-post.js')}}"></script>
    <script src=" {{asset('public/admin_assets/bundles/izitoast/js/iziToast.min.js')}} "></script>
  <!-- Template JS File -->
  <script src="{{asset('public/admin_assets/js/scripts.js')}}"></script>
  <!-- axios js  -->
  <script src="{{asset('public/admin_assets/js/axios.min.js')}}"></script>
  {{-- SettingPanel js  --}}
  <script src="{{asset('public/admin_assets/js/SettingPanel.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('public/user/js/custom.js')}}"></script>
  <?php 
  
  if(isset($_REQUEST['success'])):
?>
<script>
  iziToast.success({
      title: 'Successfully',
      position: 'topRight'
  });
</script>
<?php endif; ?>
</body>
</html>