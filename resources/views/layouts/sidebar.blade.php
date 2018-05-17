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
		<li><a href="{{ route('carousel.images.index', ['carousel' => 1]) }}">Main Carousel</a></li>
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
    <li>
      <a href="#galleriesSubmenu" data-toggle="collapse" aria-expanded="false">Galleries</a>
      <ul class="collapse list-unstyled" id="galleriesSubmenu">
        <li><a href="{{ route('images.index') }}">View all photos</a></li>
        <li><a href="{{ route('albums.index') }}">Manage Album</a></li>
      </ul>
    </li>
    
		<li class="header">Wedding</li>

    <li>
      <a href="#weddingSubmenu" data-toggle="collapse" aria-expanded="false"> Your Wedding Day </a>
      <ul class="collapse list-unstyled" id="weddingSubmenu">
        <li> <a href="{{ route('couple.edit') }}">Couple</a> </li>
        <li> <a href="{{ route('events.index') }}">Event</a> </li>
        <li> <a href="{{ route('bridesmaid-bestmans.index') }}">Bridesmaid & Bestman</a> </li>
			</ul>
		</li>
		
		<li>
      <a href="#vendorSubMenu" data-toggle="collapse" aria-expanded="false">Vendors</a>
      <ul class="collapse list-unstyled" id="vendorSubMenu">
				<li><a href="{{ route('vendors.index') }}">Vendor Lists</a></li>
				<li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
      </ul>
		</li>

    <li><a href="{{ route('rsvps.index') }}">RSVP</a></li>
    
    <li class="header">Settings</li>
    <li><a href="{{ route('siteinfo.edit') }}">Site Info</a></li>
    <li><a href="{{ route('socials.edit') }}">Social Media Info</a></li>
    <li><a href="{{ route('seo.edit') }}">SEO</a></li>

    <li>
      <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false"> Admin & Roles </a>
      <ul class="collapse list-unstyled" id="adminSubmenu">
        <li> <a href="{{ route('users.index') }}">Manage Users</a> </li>
        <li> <a href="{{ route('roles.index') }}">Manage Roles</a> </li>
      </ul>
		</li>
		
  </ul>
</nav>