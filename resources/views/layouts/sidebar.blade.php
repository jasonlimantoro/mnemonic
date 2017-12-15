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
					{{--  Needed for sidebar  --}}
					@php
						$pages = App\Page::orderBy('id', 'asc')->get();
					@endphp

					@foreach($pages as $page)
						<li>
							<a href="{{ route('admin') }}/pages/{{ $page->id }}">
								{{ $page->title }}
							</a>
						</li>
					@endforeach
					
			</ul>
		</li>

		<li class="header">Theme</li>
		<li><a href="{{ route('admin') }}/themes/photo-slideshow">Photo Slideshow</a></li>
		<li class="header">Wedding</li>
		<li>
			<a href="#weddingSubmenu" data-toggle="collapse" aria-expanded="false">
				Your Wedding Day
			</a>
			<ul class="collapse list-unstyled" id="weddingSubmenu">
					<li>
						<a href="{{ route('admin') }}/wedding/groom-and-bride">Groom & Bride</a>
					</li>
					<li>
						<a href="{{ route('admin') }}/wedding/event">Event</a>
					</li>
					<li>
						<a href="{{ route('admin') }}/wedding/bridesmaid-and-bestman">Bridesmaid & Bestman</a>
					</li>
			</ul>
		</li>
		<li><a href="{{ route('admin') }}/wedding/vendors">Vendors</a></li>
		<li><a href="{{ route('admin') }}/wedding/rsvp">RSVP</a></li>
		
		<li class="header">Settings</li>
		<li><a href="{{ route('admin') }}/settings/general">General</a></li>
		<li><a href="{{ route('admin') }}/settings/site-info">Site Info</a></li>
		<li><a href="{{ route('admin') }}/settings/social-media-and-seo">Social Media & SEO</a></li>
		<li>
			<a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">
				Admin & Roles
			</a>
			<ul class="collapse list-unstyled" id="adminSubmenu">
				<li>
					<a href="{{ route('admin') }}/settings/manage-admin">Manage Admin</a>
				</li>
				<li>
					<a href="{{ route('admin') }}/settings/manage-roles">Manage Roles</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>