<!-- Nav items -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('user/dashboard*') ? 'active' : '' }}" href="{{ route('user.dashboard.index') }}">
     <i class="fi fi-rs-dashboard"></i>
      <span class="nav-link-text">{{ __('Dashboard') }}</span>
    </a>
  </li>
</ul>

<!-- Divider -->
<hr class="my-3 mt-6">
<!-- Heading -->
<h6 class="navbar-heading p-0 text-muted">{{ __('Pengaturan') }}</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/user/profile') }}">
      <i class="ni ni-settings-gear-65"></i>
      <span class="nav-link-text">{{ __('Profil') }}</span>
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link {{ Request::is('user/auth-key*') ? 'active' : '' }}" href="{{ url('/user/auth-key') }}">
      <i class="ni ni-key-25"></i>
      <span class="nav-link-text">{{ __('Auth Key') }}</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link logout-button" href="#" >
      <i class="ni ni-button-power"></i>
      <span class="nav-link-text">{{ __('Keluar') }}</span>
    </a>
  </li>
</ul>
