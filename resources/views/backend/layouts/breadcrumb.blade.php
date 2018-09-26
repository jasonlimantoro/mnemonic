<ol class="breadcrumb">
	<li><a href="{{ route('admin') }}">Dashboard</a></li>
  {{ $slot }}
	<li class="active">{{ $current or null}}</li>
</ol>