<div class="col-md-4 blog-archives">
	<h1>Archives</h1>
	<ul class="list-unstyled">
		@foreach ($archives as $stats)
			<li>
				<a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
					{{ $stats['month'] . ' ' . $stats['year'] . ' ' . '(' . $stats['published'] . ')' }}
				</a>
			</li>	
		@endforeach
	</ul>
</div>