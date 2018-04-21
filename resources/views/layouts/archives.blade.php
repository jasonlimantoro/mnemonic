<ul class="list-unstyled">
		<li><a href="/">All {{'(' . $postCount . ')' }}</a></li>
		<hr>
	@foreach ($archives as $stats)
		<li>
			<a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
				{{ $stats['month'] . ' ' . $stats['year'] . ' ' . '(' . $stats['published'] . ')' }}
			</a>
		</li>	
	@endforeach
</ul>