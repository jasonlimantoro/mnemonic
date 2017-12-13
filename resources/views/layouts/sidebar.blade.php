<!-- Sidebar Holder -->
<nav id="sidebar">
	<div class="sidebar-header">
		<a href="{{ route('admin') }}"> 
			<h3>Mnemonic</h3>
			<strong>MN</strong>
		</a>
	</div>

	<ul class="list-unstyled components">
		<li><a href="{{ route('admin') }}">Dashboard</a></li>
		<li class="header">Website</li>
		<li>
			<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
				<i class="glyphicon glyphicon-duplicate"></i>
				Pages
			</a>
			<ul class="collapse list-unstyled" id="pageSubmenu">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Galleries</a>
					</li>
			</ul>
		</li>

		<li class="header">Theme</li>
		<li><a href="#">Photo Slideshow</a></li>
		<li class="header">Wedding</li>
		<li>
			<a href="#weddingSubmenu" data-toggle="collapse" aria-expanded="false">
				Your Wedding Day
			</a>
			<ul class="collapse list-unstyled" id="weddingSubmenu">
					<li>
						<a href="#">Groom & Bride</a>
					</li>
					<li>
						<a href="#">Event</a>
					</li>
					<li>
						<a href="#">Bridesmaid & Bestman</a>
					</li>
			</ul>
		</li>
		<li><a href="#">Vendors</a></li>
		<li><a href="#">RSVP</a></li>
		
		<li class="header">Settings</li>
		<li><a href="#">General</a></li>
		<li><a href="#">Site Info</a></li>
		<li><a href="#">Social Media & SEO</a></li>
		<li>
			<a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
				Admin & Roles
			</a>
			<ul class="collapse list-unstyled" id="adminSubmenu">
				<li>
					<a href="#">Manage Admin</a>
				</li>
				<li>
					<a href="#">Manage Roles</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>