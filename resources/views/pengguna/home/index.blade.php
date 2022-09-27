@extends('pengguna.layout.main')

@section('konten')
    {{-- kontent --}}
    <section>
        <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                <li data-target="#main_slider" data-slide-to="1"></li>
                <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1>Selamat Datang Di <strong class="color">Booking Ticket</strong></h1>
                                    <p>Gunung Lawu terletak di Pulau Jawa, Indonesia, tepatnya di perbatasan Provinsi Jawa
                                        Tengah dan Jawa Timur. Gunung Lawu terletak di antara tiga kabupaten yaitu Kabupaten
                                        Karanganyar, Jawa Tengah, Kabupaten Ngawi, dan Kabupaten Magetan, Jawa Timur.</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Masuk</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">Registrasi</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="images/coba1.png" width="100%" alt="img" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1><strong class="color">Kemudahan</strong></h1>
                                    <p>Pada website ini sudah dilengkapi dengan tata cara pemesanan tiket dan juga informasi
                                        mengenai jalur yang bisa dilewati oleh para pendaki</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Masuk</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">Registrasi</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box ">
                                    <figure><img src="images/coba2.png" alt="img" width="100%" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-caption ">
                                    <h1><strong class="color">Pengaduan</strong></h1>
                                    <p>Website ini juga dilengkapi halaman pengaduan, sehingga kami bisa terus memperbarui
                                        sistem sesuai kebutuhan para pendaki</p>
                                    <a class="btn btn-lg btn-primary" href="#" role="button">Masuk</a>
                                    <a class="btn btn-lg btn-primary" href="about.html" role="button">Registrasi</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="images/coba.png" alt="img" width="100%" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>
    <!-- plant -->
    <div id="plant" class="section  product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Peta</strong> Gunung Lawu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clothes_main section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <img src="images/candi-cetho.png" alt="img" />
                    <h4 class="text-center text-white">Candi Cetho</h4>
                    <h4 class="text-center text-white"><i class="fa fa-download" aria-hidden="true"
                            style="color:#009CFF;"></i></h4>
                </div>
                <div class="col-md-2">
                    <div>
                        <img src="images/peta-cemoro.png" alt="img" />
                        <h4 class="text-center text-white">Cemoro Sewu dan Cemoro Kandang</h4>
                        <h4 class="text-center text-white"><i class="fa fa-download" aria-hidden="true"
                                style="color:#009CFF;"></i></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end plant -->
    <!--about -->
    <div class="section about ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titlepage">
                        <h2><strong class="black"> Pemesanan</strong> Ticket</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section>
        <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                <li data-target="#main_slider" data-slide-to="1"></li>
                <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="carousel-sporrt_text ">
                                    <p class="lorem_text">Cermati tata cara dan aturan sesuai dengan SOP yang telah
                                        ditetapkan. Booking dapat dilakukan 24/7 dan proses Verifikasi Pembayaran dilakukan
                                        pada hari dan jam kerja. Sehingga disarankan untuk melakukan booking dan pembayaran
                                        dilakukan jauh hari sebelum tanggal keberangkatan.</p>
                                    <div class="btn_main">
                                        <a class="btn btn-lg btn-primary" href="#" role="button">Pesan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="images/lawu.jpg" style="max-width: 100%;" />
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                                                                                                                                                                <div class="container">
                                                                                                                                                                    <div class="row marginii">
                                                                                                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                                            <div class="carousel-sporrt_text ">
                                                                                                                                                                                <h1 class="sporrt_text">Best sports item shop our</h1>
                                                                                                                                                                                <p class="lorem_text">Tiket Pos 2</p>
                                                                                                                                                                                <div class="btn_main">
                                                                                                                                                                                    <a class="btn btn-lg btn-primary" href="#" role="button">Read More</a>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                                            <div class="img-box ">
                                                                                                                                                                                <figure><img src="images/child-image.jpg"
                                                                                                                                                                                        style="max-width: 100%; border: 15px solid #fff;" /></figure>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div> -->
                <!-- <div class="carousel-item">
                                                                                                                                                                <div class="container">
                                                                                                                                                                    <div class="row marginii">
                                                                                                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                                            <div class="carousel-sporrt_text ">
                                                                                                                                                                                <h1 class="sporrt_text">Best sports item shop our</h1>
                                                                                                                                                                                <p class="lorem_text">Tiket Pos 3</p>
                                                                                                                                                                                <div class="btn_main">
                                                                                                                                                                                    <a class="btn btn-lg btn-primary" href="#" role="button">Read More</a>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                                                                                                            <div class="img-box">
                                                                                                                                                                                <figure><img src="images/child-image.jpg"
                                                                                                                                                                                        style="max-width: 100%; border: 15px solid #fff;" /></figure>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div> -->
            </div>
        </div>
    </section>
    </div>
    <!-- end about -->
    <!--Our  Clients -->
    <div id="plant" class="section_Clients layout_padding padding_bottom_0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2> Jalur Pendakian</h2>
                        <span style="text-align: center;">Berikut Jalur Pendakian Gunung Lawu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section Clients_2 layout_padding padding-top_0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div id="testimonial" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#testimonial" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonial" data-slide-to="1"></li>
                            <li data-target="#testimonial" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach ($jalurs as $data)
                                <div class="carousel-item {{ $data['active'] }}">
                                    <div class="titlepage">
                                        <div class="john pb-4">
                                            <div class="john_image"><img src="images/basketball.jpg"
                                                    style="max-width: 100%;">
                                            </div>
                                            <div class="john_text">{{ $data['nama'] }}<span
                                                    style="color: #fffcf4;">({{ $data['kategori'] }})</span></div>
                                            <p class="lorem_ipsum_text">{{ $data['deskripsi'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#testimonial" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#testimonial" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- end Our  Clients -->
    <!-- start Contact Us-->

    <div id="plant" class="contact_us layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="black"> Form Aduan</strong> Masyarakat</h2>
                        <span style="text-align: center;">Identitas pelapor dijamin kerahasiaannya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_us_2 layout_padding paddind_bottom_0">
        <div class="container">
            <div class="row pb-5 justify-content-center">
                <div class="col-md-9">
                    <div class="email_btn">
                        <form action="/action_page.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Name" name="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Email" name="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Phone" name="Phone">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control form-control-sm" placeholder="Massage"
                                    name="text3"></textarea>
                            </div>
                            <div class="submit_btn">
                                <button type="submit" class="btn btn-primary"
                                    style="background: #081b30; color: #fff; padding: 11px;">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
