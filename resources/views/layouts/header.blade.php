<nav class="navbar navbar-default navbar-backend">
  <div class="navbar-header">
    <span class="glyphicon glyphicon-menu-hamburger sidebar-toggle" id="sidebarCollapse" role="button"></span>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a dusk="profile-toggle" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
          {{ Auth::user()->name }}
          <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
          <li>
            <a dusk="logout-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          <li>
            <a href="/">Visit Website</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>