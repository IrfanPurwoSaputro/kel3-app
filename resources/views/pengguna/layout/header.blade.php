 <!-- header inner -->
 <style>
        .cts {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
        margin: 4px 2px;
        cursor: pointer;
        }

        .button1 {border-radius: 2px;}
        .button2 {border-radius: 4px;}
</style>
 <div class="header_main">
    <div class="header_main">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"> <a href="index.html"><img src="{{ asset('images/logo1.png') }}" width="60%" alt="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li><a class="{{ Request::path() === '/' ? 'text-white' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                                    <li><a class="{{ Request::path() === 'about' ? 'text-white' : '' }}" href="{{ url('about') }}">Informasi</a></li>
                                    <li><a class="{{ Request::path() === 'booking' ? 'text-white' : '' }}" href="{{ url('booking') }}" href="{{ url('booking') }}">Pemesanan</a></li>
                                    <li><a class="{{ Request::path() === 'pengaduan' ? 'text-white' : '' }}" href="{{ url('pengaduan') }}" href="{{ url('contact') }}">Pengaduan</a></li>
                                    <li class="mb-3 ml-3">
                                        <form action="/find_code" method="GET" enctype="multipart/form-data">
                                            <input type="text" class="form-control-md" name="cari" style="width: 200px" placeholder="Cek kode booking">
                                            <input type="submit" value="kirim" class="btn btn-warning btn-sm" type="button" id="button-addon2">
                                        </form>
                                        <!-- <button class="btn btn-info btn-sm" id="button-addon2"><a href="{{url('admin/login')}}" >Admin</a></button>
                                        <button class="btn btn-success btn-sm" id="button-addon2"><a href="{{url('admin/login')}}" >Petugas</a></button> -->
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header inner -->
