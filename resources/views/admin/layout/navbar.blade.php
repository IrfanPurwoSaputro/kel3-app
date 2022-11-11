<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/admin"><img src="{{ asset('images/logo1.png') }}" class="mr-2" alt="logo" style="background-color: blue;" /></a>
        <a class="navbar-brand brand-logo-mini" href="/admin"><img src="{{ asset('images/admin/favicon.png') }}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <strong>SIBOLU - SISTEM INFORMASI BOOKING GUNUNG LAWU</strong>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a  
               href="{{ route('logout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="ti-power-off text-primary"></i>
                
            </a>
            &nbsp; Keluar
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>