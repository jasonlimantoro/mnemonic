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
          <li>
            <a href="{{ route('front.index') }}" target="_blank">Visit Website</a>
          </li>
          <li>
            <a dusk="logout-link" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>