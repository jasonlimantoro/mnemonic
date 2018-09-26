<nav class="navbar navbar-static-top">
  <span class="glyphicon glyphicon-menu-hamburger sidebar-toggle" id="sidebarCollapse" role="button"></span>
  <div class="navbar-custom-menu pull-right">
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a dusk="profile-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"
           aria-haspopup="true">
          {{ Auth::user()->name }}
        </a>

        <ul class="dropdown-menu">
          <li class="user-header">
						<img src="/images/user.png" alt="user" class="circle" height="90" width="90">
						<div class="user-info">
							<p>{{ auth()->user()->role->name }}</p>
						</div>
					</li>
          <li class="user-footer clearfix">
						<div class="pull-right">
							<a href="{{ subdomainRoute('front.index') }}" target="_blank" class="btn btn-default">Visit Website</a>
	            <a dusk="logout-link" href="{{ subdomainRoute('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();" class="btn btn-default">
	              Logout
	            </a>
						</div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<form id="logout-form" action="{{ subdomainRoute('logout') }}" method="POST" style="display: none;">
	{{ csrf_field() }}
</form>