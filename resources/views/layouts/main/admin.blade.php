<!-- Nav items -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard.index') }}">
     <i class="fi fi-rs-dashboard"></i>
      <span class="nav-link-text">{{ __('Dashboard') }}</span>
    </a>
  </li>
</ul>
<!-- Heading -->
<h6 class="navbar-heading p-0 text-muted mt-4">{{ __('Master') }}</h6>
<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="#data-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="data-forms">
      <i class="fi  fi-rs-blog-text"></i>
      <span class="nav-link-text">{{ __('Data') }}</span>
    </a>
    <div class="collapse" id="data-forms">
      <ul class="nav nav-sm flex-column">
        {{-- adding check user has roles and has permissions --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('satuan'))
        <li class="nav-item">
          <a href="{{ route('admin.satuan.index') }}" class="nav-link">{{ __('Satuan') }}</a>
        </li>
        @endif
      </ul>
    </div>
  </li>
</ul>

<h6 class="navbar-heading p-0 text-muted mt-4">{{ __('Pengaturan') }}</h6>
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('admin/admin*') || Request::is('admin/role*') ? 'active' : '' }}" href="#admin-roles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
      <i class="fi  fi-rs-shield-check"></i>
      <span class="nav-link-text">{{ __('Admin and Role') }}</span>
    </a>
    <div class="collapse" id="admin-roles">
      <ul class="nav nav-sm flex-column">
        {{-- adding check user has roles and has permissions --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('admin'))
        <li class="nav-item">
          <a href="{{ route('admin.admin.index') }}" class="nav-link">{{ __('Admin') }}</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('roles'))
        <li class="nav-item">
          <a href="{{ route('admin.role.index') }}" class="nav-link">{{ __('Roles') }}</a>
        </li>
        @endif
      </ul>
    </div>
  </li>

   <li class="nav-item">
    <a class="nav-link {{  Request::is('admin/developer-settings*') ? 'active' : '' }}" href="#dev-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
      <i class="fi  fi-rs-settings"></i>
      <span class="nav-link-text">{{ __('Developer') }}</span>
    </a>
    <div class="collapse" id="dev-settings">
      <ul class="nav nav-sm flex-column">
        {{-- adding check user has roles and has permissions --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('developer-settings'))
        <li class="nav-item">
          <a href="{{ route('admin.developer-settings.show','app-settings') }}" class="nav-link">{{ __('App') }}</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('developer-settings'))
        <li class="nav-item">
          <a href="{{ route('admin.developer-settings.show','mail-settings') }}" class="nav-link">{{ __('SMTP') }}</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('developer-settings'))
        <li class="nav-item">
          <a href="{{ route('admin.developer-settings.show','storage-settings') }}" class="nav-link">{{ __('Penyimpanan') }}</a>
        </li>
        @endif
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}" href="{{ url('/admin/profile') }}">
      <i class="fi fi fi-rs-comment-user"></i>
      <span class="nav-link-text">{{ __('Profil') }}</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link logout-button" href="#" >
      <i class="ni ni-button-power"></i>
      <span class="nav-link-text">{{ __('Keluar') }}</span>
    </a>
  </li>
</ul>
