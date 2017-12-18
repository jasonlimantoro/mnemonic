<nav class="navbar navbar-default">
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
					<a class="navbar-brand" href="{{ route('home') }}">
						<img src="/images/logo.png" alt="logo" class="img-responsive">
					</a>
				</div>
			
			</div>
		</div>


		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="row">
			<div class="col-xs-12">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="/">Home</a></li>
						<li><a href="/about-us">About Us</a></li>
						<li><a href="/galleries">Galleries</a></li>
						<li class="hidden-xs">
							<a href="/" class="navbar-logo-center">
								<img src="/images/logo.png" alt="logo" class="img-responsive">
							</a>
						</li>
						<li><a href="/wedding-day">Wedding Day</a></li>
						<li><a href="/online-rsvp">Online RSVP</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Route::has('login'))
							@auth
								<li>
									<a href="{{ route('admin') }}">Backend</a>
								
								</li>
							@else
								{{--  <li>
									<a href="{{ route('login') }}">Login</a>
								</li>

								<li>
									<a href="{{ route('register') }}">Register</a>
								</li>  --}}
							@endauth
						@endif
					</ul>
				</div> <!-- /.navbar-collapse -->
			</div>
		</div>
	</div> <!-- /.container-fluid -->
</nav>