<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"><strong>Landlord</strong></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">Account Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('landlord.auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('landlord.auth.logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>