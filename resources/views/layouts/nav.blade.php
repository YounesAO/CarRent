<nav class="navbar navbar-expand-lg bg-body-tertiary shadow ">
    <div class="container-fluid">
      <div>
        <img src="{{ asset('icon.ico') }}" alt="" style="height: 50px;">
        <span>Car rent</span>
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ asset('cars') }}">Catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('dashboard') }}">Dashboard</a>
          </li>
        </ul>
        @if(Auth::check())
        <ul class="navbar-nav fw d-flex justify-content-end" >
          <li class="nav-item m-1 ">
            <a title="Profile"  class= "nav-link" href="{{ asset('settings/user') }}"><i class="fa-solid fa-user"></i>{{Auth::user()->nomComplet}}</a>
          </li>
          <li class="nav-item  m-1 dropdown">
            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-bell"></i>
                  <span class="badge rounded-pill badge-notification bg-danger">1</span></a>
                <ul class="dropdown-menu nofitication">
                  <iframe src="/notification" frameborder="0"></iframe>
                </ul>
        </li>
         
          <li class="nav-item m-1">
            <a title="Paramétres"  class="nav-link" href="{{ asset('settings') }}"><i class="fa-solid fa-gear"></i></a>
          </li>
          <li class="d-flex justify-content-center align-items-center  text-danger">
            <a href="{{ asset('/logout') }}" class="nav-link d-flex justify-content-center align-items-center disconnect text-danger"><i class="fa-solid fa-door-closed "></i> <i class="fa-solid fa-door-open"></i><span class="nav-text"> Déconnecter</span></a>
          </li>
        </ul>
        @endif
      </div>
    </div>
  </nav>