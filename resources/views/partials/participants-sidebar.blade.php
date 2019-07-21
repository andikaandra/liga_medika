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


    @if(Auth::user()->lomba_verified == 1)
      <li class="nav-item" id="user-announcement">
        <a class="nav-link" href="#">
          <span class="menu-title">Announcements</span>
          <i class="mdi mdi-bell menu-icon"></i>
        </a>
      </li>
    @else
      <li class="nav-item unclickable" id="user-announcement">
        <a class="nav-link" href="#">
          <span class="menu-title">Announcements</span>
          <i class="mdi mdi-bell menu-icon"></i>
        </a>
      </li>
      @endif


    @if(Auth::user()->cabang==3 &&(Auth::user()->cabang_spesifik==2 || Auth::user()->cabang_spesifik==3 || Auth::user()->cabang_spesifik==4 || Auth::user()->cabang_spesifik==5))
      @if (Auth::user()->lomba_verified != 1)
        <li class="nav-item unclickable" id="user-team">
          <a class="nav-link" href="#">
            <span class="menu-title">
              My Team
            </span>
            <i class="mdi mdi-account-multiple menu-icon"></i>
          </a>
        </li>

        <li class="nav-item unclickable" id="user-files">
          <a class="nav-link" href="#">
            <span class="menu-title">Upload Your Work</span>
            <i class="mdi mdi-folder-upload menu-icon"></i>
          </a>
        </li>
      @else
        <li class="nav-item" id="user-team">
          <a class="nav-link" href="{{url('users/participants')}}">
            <span class="menu-title">
              My Team
            </span>
            <i class="mdi mdi-account-multiple menu-icon"></i>
          </a>
        </li>
        <li class="nav-item" id="user-files">
        <a class="nav-link" href="{{route('users.upload.karya')}}">
          <span class="menu-title">Submissions</span>
          <i class="mdi mdi-folder-upload menu-icon"></i>
        </a>
      </li>
      @endif

    @elseif(Auth::user()->cabang == 1)
      @if (Auth::user()->lomba_verified != 1)
        <li class="nav-item unclickable" id="user-team">
        <a class="nav-link" href="#">
      @else
        <li class="nav-item" id="user-team">
        <a class="nav-link" href="{{url('users/participants')}}">
      @endif  
          <span class="menu-title">
            My Team
          </span>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>

    @elseif(Auth::user()->cabang == 2)
      @if (Auth::user()->lomba_verified != 1)
      <li class="nav-item unclickable" id="user-team">
        <a class="nav-link" href="#">
          <span class="menu-title">
            My Team
          </span>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>
      @if(Auth::user()->cabang_spesifik==9)
      <li class="nav-item unclickable" id="user-files">
        <a class="nav-link" href="#">
          <span class="menu-title">Upload Your Work</span>
          <i class="mdi mdi-folder-upload menu-icon"></i>
        </a>
      </li>
      @endif
      @else
        <li class="nav-item" id="user-team">
          <a class="nav-link" href="{{url('users/participants')}}">
            <span class="menu-title">
              My Team
            </span>
            <i class="mdi mdi-account-multiple menu-icon"></i>
          </a>
        </li>
        @if(Auth::user()->cabang_spesifik==9)
        <li class="nav-item" id="user-files">
          <a class="nav-link" href="{{route('users.upload.karya')}}">
            <span class="menu-title">Submissions</span>
            <i class="mdi mdi-folder-upload menu-icon"></i>
          </a>
        </li>
        @endif
      @endif    

    @endif

    @if (Auth::user()->status_lolos==1 || (Auth::user()->cabang==1 && Auth::user()->lomba_verified==1))
      <li class="nav-item" id="travel-plan-sidebar">
        <a class="nav-link" href="{{url('users/travel-plan')}}">
          <span class="menu-title">
            Finalists Requirements
          </span>
          <i class="mdi mdi-ticket menu-icon"></i>
        </a>
      </li>
    @endif


    @if (Auth::user()->cabang == 4)
      <li class="nav-item unclickable" id="user-team">
        <a class="nav-link" href="#">
          <span class="menu-title">
            E-tickets
          </span>
          <i class="mdi mdi-ticket menu-icon"></i>
        </a>
      </li>
    @endif
  </ul>
</nav>
