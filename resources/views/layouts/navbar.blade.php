<nav class="navbar navbar-default navbar-frontend">
	<div class="container">
		<div class="row visible-xs">
			<div class="col-xs-12">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ route('front.index') }}">
						<img src="{{ url('/imagecache/logo/' . $settings['site-info']->logo) }}" alt="logo" class="img-responsive">
					</a>
				</div>
			
			</div>
		</div>


		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="row">
			<div class="col-xs-12">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="{{ route('front.index') }}" 
								 class="{{ Route::currentRouteNamed('front.index') ? 'active': '' }}">Home
							</a>
							</li>
						<li>
							<a href="{{ route('front.about') }}" 
								 class="{{ Route::currentRouteNamed('front.about') ? 'active': '' }}">About
							</a>
						</li>
						<li>
							<a href="{{ route('front.gallery') }}" 
								 class="{{ Route::currentRouteNamed('front.gallery') ? 'active': '' }}">Gallery
							</a>
						</li>

						<li class="hidden-xs">
							<a href="/" class="navbar-logo-center">
								<img src="{{ url('/imagecache/logo/' . $settings['site-info']->logo) }}" alt="logo" class="img-responsive">
							</a>
						</li>
						<li>
							<a href="{{ route('front.day') }}"
								 class="{{ Route::currentRouteNamed('front.day') ? 'active': '' }}">@mode('birthday') Birthday @else Wedding Day @endmode
							</a>
						</li>
						<li>
							<a href="{{ route('front.rsvp') }}" 
								 class="{{ Route::currentRouteNamed('front.rsvp') ? 'active': '' }}">Online RSVP
							</a>
						</li>
						@auth
							<li class="visible-xs"><a href="{{ route('admin') }}" target="_blank">Backend</a></li>
						@endauth
					</ul>

					@auth
						<ul class="nav navbar-nav navbar-right visible-md visible-lg">
							<li><a href="{{ route('admin') }}" target="_blank">Backend</a></li>
						</ul>
					@endauth
				</div> <!-- /.navbar-collapse -->
			</div>
		</div>
	</div> <!-- /.container-fluid -->
</nav>