<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    {!! $settings['site-seo']->g_script !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="{{ $settings['site-seo']->meta_description }}"/>
		<meta name="title" content="{{ $settings['site-seo']->meta_title }}" />

		<title>{{ $settings['site-info']->title . ' - ' . ucfirst($pageTitle ?? '') }}</title>
		<link rel="shortcut icon" type="image/png" href={{ $settings['site-info']->favicon }}/>

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
