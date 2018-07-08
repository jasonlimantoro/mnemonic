<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') . ' | Admin' }}</title>
		<link rel="shortcut icon" type="image/png" href="/images/logo.png"/>

    <!-- Styles -->
    <link href="{{ asset('css/backend/main.css') }}" rel="stylesheet">
  </head>

  <body>
		@auth
			<div class="wrapper">
				@include('backend.layouts.sidebar')
				<div class="container backend" id="content">
					@include('backend.layouts.header')
					@include('backend.layouts.success')
					@include('backend.layouts.error')
					@yield('content')
				</div>
			</div>
		@else
			@yield('content')
		@endauth

    {{--  Asset Scripts  --}}
    <script src="{{ asset('js/manifest.js') }}"></script>
		<script src="{{ asset('js/vendor.js') }}"></script>
		<script src="{{ asset('js/backend/main.js') }}"></script>

		@yield('scripts')
  </body>

</html>