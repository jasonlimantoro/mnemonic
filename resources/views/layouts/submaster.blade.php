<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Styles -->
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	</head>

	<body>

		<div class="wrapper">
			@include('layouts.sidebar')

			<!-- Page Content Holder -->
            <div class="container">
                <div id="content">
                    @include('layouts.header')
                    @yield('content')
                </div>
            </div>
		</div>

		{{--  Asset Scripts  --}}
		<script src="{{ asset('js/main.js') }}"></script>

        {{--  General scripts  --}}
        <script>
            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });

            });
        </script>
        {{--  page-specific scripts  --}}
		@yield('script')
	</body>

</html>