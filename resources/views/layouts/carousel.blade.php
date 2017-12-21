<div id="{{ $carouselId }}" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		{{ $carouselIndicators }}
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		{{ $carouselSlides }}
	</div>

	<!-- Controls -->
	<div class="control">

		{{ $carouselControls }}
		{{--  <a class="left carousel-control" href="#{{ $carouselId }}" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#{{ $carouselId }}" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>  --}}
	</div>
	
</div>