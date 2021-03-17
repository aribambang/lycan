<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>School Management System - Dashboard</title>
    
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header')
  
  @include('admin.body.sidebar')

  @yield('admin')
 
  @include('admin.body.footer')
  
  <div class="control-sidebar-bg"></div>
  
</div>

	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
  
	<script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js')}}"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $(function(){
      $(document).on('click', '#delete', function(e){
        e.preventDefault()
        var link = $(this).attr('href')
        Swal.fire({
          title: 'Are you sure?',
          text: "Delete this data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link

            Swal.fire(
              'Deleted!',
              'Data has been deleted.',
              'success'
            )
          }
        })
      })
    })
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
	<script>
    @if (Session::has('message'))
      var type="{{ Session::get('alert-type','info') }}"
      switch(type){
        case 'info':
          toastr.info("{{ Session::get('message') }}")
          break
        case 'success':
          toastr.success("{{ Session::get('message') }}")
          break
        case 'warning':
          toastr.warning("{{ Session::get('message') }}")
          break
        case 'error':
          toastr.error("{{ Session::get('message') }}")
          break
      }
    @endif
  </script>
	
</body>
</html>
