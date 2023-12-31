<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form action="{{ route('dashboardProductsSearchResult.index') }}" class="form-inline mr-auto searchform text-muted">
      <input size="40" class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" name="dashboard_search_query" placeholder="Want to search for a specific item?" aria-label="Search">
    </form>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item nav-notif">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
          <span class="fe fe-bell fe-16"></span>
          <span class="dot dot-md bg-success"></span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="avatar avatar-sm mt-2">
            <img src="./assets/avatars/face-1.jpg" alt="{{ auth()->user()->name }}" class="avatar-img rounded-circle">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="javascript:void(0);">
            <i class="fe fe-user fe-16"></i> Profile
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
            <i class="fe fe-log-out"></i> Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: ;">
                @csrf
            </form>
        </a>
        </div>
      </li>
    </ul>
  </nav>
