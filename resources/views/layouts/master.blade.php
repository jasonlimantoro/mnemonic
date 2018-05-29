<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" type="image/png" href={{ $faviconUrl }}/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  </head>
  <body>

		@frontend
			@include('layouts.navbar')
			<div class="web-container">
				@yield('content')
				@include('layouts.footer')
			</div>
		@else
			@yield('content')
		@endfrontend
    

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js')}}"></script>
    <script src="{{ asset('js/vendor.js')}}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('scripts')
  </body>
</html>
