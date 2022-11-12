<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
  @if(Auth::user()->role == 'admin')
    <li class="nav-item {{Request::segment(1) === 'admin'?'active':''}}">
      <a class="nav-link " href="{{url('admin')}}">
         <i class="fa fa-dashboard"></i>&nbsp;&nbsp;
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{Request::segment(1) === 'booking_list'?'active':''}}">
      <a class="nav-link" href="{{url('booking_list')}}" >
         <i class="fa fa-ticket"></i>&nbsp;&nbsp;
        <span class="menu-title">Booking Tiket</span>
      </a>
    </li>

    <li class="nav-item {{Request::segment(1) === 'informasi_list'?'active':''}}">
      <a class="nav-link" href="{{url('informasi_list')}}">
         <i class="fa fa-book"></i>&nbsp;&nbsp;
        <span class="menu-title">Informasi</span>
      </a>
    </li>

     <li class="nav-item {{Request::segment(1) === 'pengaduan_list'?'active':''}}">
      <a class="nav-link" href="{{url('pengaduan_list')}}">
         <i class="fa fa-users"></i>&nbsp;&nbsp;
        <span class="menu-title">Pengaduan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('/')}}" target="_blank">
        <i class="fa fa-globe"></i>&nbsp;&nbsp;
        <span class="menu-title">Halaman Depan</span>
      </a>
    </li>
    <!-- petugas -->
  @else 
  <li class="nav-item {{Request::segment(1) === 'booking_list'?'active':''}}">
      <a class="nav-link" href="{{url('booking_list')}}" >
         <i class="fa fa-ticket"></i>&nbsp;&nbsp;
        <span class="menu-title">Validasi Booking Tiket</span>
      </a>
    </li>
  @endif
  </ul>
</nav>