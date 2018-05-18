<!-- Sidebar Holder -->
<nav id="sidebar" class="active">
  <div class="sidebar-header">
    <a href="{{ route('admin') }}">
      <h3>Mnemonic</h3>
      <strong>MN</strong>
    </a>
  </div>
  
  <ul class="list-unstyled components">
    <li><a href="{{ route('admin') }}">Dashboard</a></li>
		<li class="header">Website</li>

		@can('read-carousel-image')
			<li><a href="{{ route('carousel.images.index', ['carousel' => 1]) }}">Main Carousel</a></li>
		@endcan

		@can('read', App\Post::class)
			<li>
				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
					<i class="glyphicon glyphicon-duplicate"></i>
					Pages
				</a>
				<ul class="collapse list-unstyled" id="pageSubmenu">
					<li><a href="{{ route('posts.index', ['page' => 1]) }}">Home</a></li>
					<li><a href="{{ route('posts.index', ['page' => 2]) }}">About Us</a></li>
				</ul>
			</li>
		@endcan

		@can('manage-gallery')
			<li>
				<a href="#galleriesSubmenu" data-toggle="collapse" aria-expanded="false">Galleries</a>
				<ul class="collapse list-unstyled" id="galleriesSubmenu">
					<li><a href="{{ route('images.index') }}">View all photos</a></li>
					<li><a href="{{ route('albums.index') }}">Manage Album</a></li>
				</ul>
			</li>
		@endcan
    
		<li class="header">Wedding</li>

    <li>
      <a href="#weddingSubmenu" data-toggle="collapse" aria-expanded="false"> Your Wedding Day </a>
      <ul class="collapse list-unstyled" id="weddingSubmenu">
				@can('read', App\Couple::class)
					<li><a href="{{ route('couple.edit') }}">Couple</a></li>
				@endcan

				@can('read', App\Event::class)
					<li><a href="{{ route('events.index') }}">Event</a></li>
				@endcan

				@can('read', App\BridesBest::class)
					<li><a href="{{ route('bridesmaid-bestmans.index') }}">Bridesmaid & Bestman</a></li>
				@endcan
			</ul>
		</li>
		
		<li>
      <a href="#vendorSubMenu" data-toggle="collapse" aria-expanded="false">Vendors</a>
      <ul class="collapse list-unstyled" id="vendorSubMenu">
				@can('read', App\Vendor::class)
					<li><a href="{{ route('vendors.index') }}">Vendor Lists</a></li>
				@endcan

				@can('read', App\Category::class)
					<li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
				@endcan
      </ul>
		</li>

		@can('read', App\RSVP::class)
			<li><a href="{{ route('rsvps.index') }}">RSVP</a></li>
		@endcan
    
		<li class="header">Settings</li>
		@can('read-site-info')
			<li><a href="{{ route('siteinfo.edit') }}">Site Info</a></li>
		@endcan

		@can('read-site-social')
			<li><a href="{{ route('socials.edit') }}">Social Media Info</a></li>
		@endcan

		@can('read-site-seo')
			<li><a href="{{ route('seo.edit') }}">SEO</a></li>
		@endcan

    <li>
      <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false"> Admin & Roles </a>
      <ul class="collapse list-unstyled" id="adminSubmenu">
				@can('read', App\User::class)
					<li><a href="{{ route('users.index') }}">Manage Users</a></li>
				@endcan

				@can('read', App\Role::class)
					<li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
				@endcan
      </ul>
		</li>
  </ul>
</nav>