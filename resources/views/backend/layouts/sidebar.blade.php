<!-- Sidebar Holder -->
<nav id="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin') }}">
      <h3>Mnemonic</h3>
      <strong>MN</strong>
    </a>
  </div>
  
  <ul class="list-unstyled components">
    <li><a href="{{ route('admin') }}" data-menu="menu"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="header">Website</li>

		@can('read-carousel-image')
			<li><a href="{{ route('carousel.images.index', ['carousel' => 1]) }}" data-menu="menu">Carousel</a></li>
		@endcan

		@can('read', App\Models\Post::class)
			<li>
				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" data-menu="menu">
					<i class="glyphicon glyphicon-duplicate"></i>
					Posts
				</a>
				<ul class="collapse list-unstyled" id="pageSubmenu">
					<li><a href="{{ route('posts.index', ['page' => 1]) }}">Home</a></li>
					<li>
            <a href="{{ route('posts.index', ['page' => 2]) }}">
              About
            </a>
          </li>
				</ul>
			</li>
		@endcan
    @can('manage-gallery')
			<li>
				<a href="#galleriesSubmenu" data-toggle="collapse" aria-expanded="false" data-menu="menu"><i class="fa fa-picture-o"></i>Galleries</a>
				<ul class="collapse list-unstyled" id="galleriesSubmenu">
					<li><a href="{{ route('images.index') }}">View all photos</a></li>
					<li><a href="{{ route('albums.index') }}">Manage Album</a></li>
				</ul>
			</li>
		@endcan
    
		<li class="header">Your Day</li>

    <li>
      <a href="#weddingSubmenu" data-toggle="collapse" aria-expanded="false" data-menu="menu">
        {{ $mode === 'birthday' ? 'Birthday' : 'Wedding Day' }}
      </a>
      <ul class="collapse list-unstyled" id="weddingSubmenu">
				@can('read', App\VIP::class)
					<li>
            <a href="{{ route('vip.edit') }}">
              {{ $mode === 'birthday' ? 'Birthday Person' : 'Couple' }}
            </a>
          </li>
				@endcan

				@can('read', \App\Models\Event::class)
					<li><a href="{{ route('events.index') }}">Event</a></li>
				@endcan

        @if($mode === 'wedding')
          @can('read', \App\Models\BridesBest::class)
            <li><a href="{{ route('bridesmaid-bestmans.index') }}">Bridesmaid & Bestman</a></li>
          @endcan
        @endif

				@can('read-embed-video')
					<li><a href="{{ route('embedVideo.edit') }}">Embed Video</a></li>
				@endcan
			</ul>
		</li>

    @if($mode === 'wedding')
      <li>
        <a href="#vendorSubMenu" data-toggle="collapse" aria-expanded="false" data-menu="menu">Vendors</a>
        <ul class="collapse list-unstyled" id="vendorSubMenu">
          @can('read', App\Models\Vendor::class)
            <li><a href="{{ route('vendors.index') }}">Vendor Lists</a></li>
          @endcan

          @can('read', \App\Models\Category::class)
            <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
          @endcan
        </ul>
      </li>
    @endif

		@can('read', App\Models\RSVP::class)
			<li><a href="{{ route('rsvps.index') }}" data-menu="menu">RSVP</a></li>
		@endcan
    
		<li class="header">Settings</li>
		@can('read-site-info')
			<li><a href="{{ route('siteinfo.edit') }}" data-menu="menu"><i class="fa fa-info"></i>Site Info</a></li>
		@endcan

		@can('read-site-social')
			<li><a href="{{ route('sitesocial.edit') }}" data-menu="menu"><i class="fa fa-share-square-o"></i>Site Social Media</a></li>
		@endcan

		@can('read-site-seo')
			<li><a href="{{ route('siteseo.edit') }}" data-menu="menu"><i class="fa fa-search"></i>Site SEO</a></li>
		@endcan

    <li>
      <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" data-menu="menu"><i class="fa fa-user"></i>Users & Roles </a>
      <ul class="collapse list-unstyled" id="adminSubmenu">
				@can('read', App\Models\User::class)
					<li><a href="{{ route('users.index') }}">Manage Users</a></li>
				@endcan

				@can('read', App\Models\Role::class)
					<li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
				@endcan
      </ul>
		</li>

    @can('manage-package-settings')
      <li class="header">Package</li>
      <li><a href="{{ route('package.edit') }}" data-menu="menu">Default Values</a></li>
    @endcan
  </ul>
</nav>