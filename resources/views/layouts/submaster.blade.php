<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>
		<link rel="shortcut icon" type="image/png" href="/images/logo.png"/>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <div class="wrapper">
      @include('layouts.sidebar')

      <!-- Page Content Holder -->
      <div class="container backend" id="content">
				@include('layouts.header')
				@include('layouts.success')
				@include('layouts.error')
				@yield('content')
      </div>
    </div>

    {{--  Asset Scripts  --}}
    <script src="{{ asset('js/manifest.js')}}"></script>
		<script src="{{ asset('js/vendor.js')}}"></script>
		<script src="{{ asset('js/main.js') }}"></script>

    {{--  General scripts  --}}
    <script>
      $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
        }); 
        // get the current page
        path = window.location.href;

        // if path is empty
        if (path == '') {
          path = 'http://mnemonic.dev/admin';
        }
        
        // sidebar is targeted
        target = $('#sidebar li a[href="'+ path + '"]').parents('li');

        target.addClass('active');

        $('[data-toggle="tooltip"]').tooltip();   
      });
		</script>

		@yield('scripts')
  </body>

</html>