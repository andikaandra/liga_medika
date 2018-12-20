<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{asset('img/avatar.png')}}" alt="image">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
        </div>
      </a>
    </li>
    <li class="nav-item" id="user-home">
      <a class="nav-link" href="{{url('users')}}">
        <span class="menu-title">
          @if(Auth::user()->cabang_spesifik)
            Home
          @else
            Registration
          @endif
        </span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    @if(Auth::user()->lomba_verified)
      <li class="nav-item" id="user-team">
        <a class="nav-link" href="{{url('users/participants')}}">
          <span class="menu-title">
            My Team
          </span>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>
      <li class="nav-item" id="user-announcement">
        <a class="nav-link" href="#">
          <span class="menu-title">Announcements</span>
          <i class="mdi mdi-bell menu-icon"></i>
        </a>
      </li>
    @endif
    
    @if(Auth::user()->cabang==3 &&(Auth::user()->cabang_spesifik==2 || Auth::user()->cabang_spesifik==3))
      @if (Auth::user()->lomba_verified != 1)
        <li class="nav-item unclickable" id="user-files">
          <a class="nav-link" href="#">
            <span class="menu-title">Upload Files</span>
            <i class="mdi mdi-folder-upload menu-icon"></i>
          </a>
        </li>
      @else
        <li class="nav-item" id="user-files">
        <a class="nav-link" href="{{route('users.upload.karya')}}">
          <span class="menu-title">Upload Files</span>
          <i class="mdi mdi-folder-upload menu-icon"></i>
        </a>
      </li>
      @endif

    @endif
    {{-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-title">Icons</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <span class="menu-title">Forms</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <span class="menu-title">Tables</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Sample Pages</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-3">Projects</h6>
        </div>
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
        <div class="mt-4">
          <div class="border-bottom">
            <p class="text-secondary">Categories</p>
          </div>
          <ul class="gradient-bullet-list mt-4">
            <li>Free</li>
            <li>Pro</li>
          </ul>
        </div>
      </span>
    </li> --}}
  </ul>
</nav>
