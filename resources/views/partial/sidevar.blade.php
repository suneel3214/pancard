<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('backend/images/faces/user-img.png')}}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  <span class="text-secondary text-small">Referal-code:- {{ Auth::user()->referal_code }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            @if(in_array("Admin", Auth::user()->roles->toArray()))
            <li class="nav-item">
              <a class="nav-link"  href="{{route('admin.all.users')}}">
                <span class="menu-title">User's</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
            </li>
            @else
            @if(Auth::user()->user_type != 5)
            <li class="nav-item">
              <a class="nav-link"  href="{{route('admin.index')}}">
                <span class="menu-title">User's</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
            </li>
            @endif
            @endif
            @if(in_array("Admin", Auth::user()->roles->toArray()))
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.role')}}">
                <span class="menu-title">Roles</span>
                <i class="mdi mdi-human-greeting menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#master" aria-expanded="false" aria-controls="">
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-group menu-icon"></i>
              </a>
              <div class="collapse" id="master">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('packages.create')}}">Package</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('services.index')}}">Services</a></li>
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="">
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
              <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Customer help?</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Contact</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->