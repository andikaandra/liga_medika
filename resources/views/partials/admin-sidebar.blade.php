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
          <span class="text-secondary text-small">Commitee</span>
        </div>
      </a>
    </li>
    <li class="nav-item" id="admin-home">
      <a class="nav-link" href="{{url('admin')}}">
        <span class="menu-title">Home</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item" id="admin-inamsc">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
        <span class="menu-title">INAMSC</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic4">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.symposium')}}">Symposium & Workshop</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.edukasi')}}">Educational Video</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.publication')}}">Public Poster</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.literature')}}">Literature Review</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.research')}}"> Research Paper</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-imarc">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
        <span class="menu-title">IMARC</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic6">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.photography')}}">Photography</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.traditional.dance')}}">Traditional Dance</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.vocal-group')}}">Vocal Group</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.band')}}">Band</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-imsso">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
        <span class="menu-title">IMSSO</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic7">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.men.basketball')}}">Men Basketball</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.women.basketball')}}">Women Basketball</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.men.futsal')}}">Mini Soccer</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-hfgm">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic8" aria-expanded="false" aria-controls="ui-basic8">
        <span class="menu-title">HFGM</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic8">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.campaign')}}">Campaign</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('verif.concert')}}">Concert</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-submissions">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
        <span class="menu-title">Submissions</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic5">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/submissions/educational-videos')}}">Educational Video</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/submissions/public-poster')}}">Public Poster</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/submissions/literature-review')}}">Literature Review</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/submissions/research-paper')}}"> Research Paper</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/imarcs/submissions/photography')}}"> Photography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-finalist">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic9">
        <span class="menu-title">Finalist</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-library-books menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic9">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/finalist/educational-videos')}}">Educational Video</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/finalist/public-poster')}}">Public Poster</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/finalist/literature-review')}}">Literature Review</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/admin/inamscs/finalist/research-paper')}}"> Research Paper</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item" id="admin-account">
      <a class="nav-link" href="{{url('admin/account')}}">
        <span class="menu-title">Account</span>
        <i class="mdi mdi-account-settings-variant menu-icon"></i>
      </a>
    </li>
{{--     <li class="nav-item">
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
