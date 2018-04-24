<div id="{{ $carouselId or "myCarousel" }}" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		{{ $carouselIndicators or null }}
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		{{ $carouselSlides }}
	</div>

	<!-- Controls -->
	<div class="control">
		<a class="left carousel-control" href="#{{ $carouselId or "myCarousel" }}" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#{{ $carouselId or "myCarousel" }}" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
</div>