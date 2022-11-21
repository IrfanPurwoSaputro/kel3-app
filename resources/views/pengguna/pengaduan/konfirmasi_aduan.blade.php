@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="contact_us layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    {{-- <div class="titlepage">
                        <h2 style="text-align: center; margin-top: 145px;">Form Aduan <strong
                                style="color: #111315;">Masyarakat</strong></h2>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="contact_us_2 layout_padding paddind_bottom_0" style="background: #ffff">
        <div class="container">
            <div class="row pb-5 justify-content-center">
                <div class="col-md-9">
                    <div class=" justify-content-center mb-2">
                        <h1 style="text-align: center;">Pesan Berhasil Terkirim</h1>
                        <div class="submit_btn">                
                            <a href="{{ url('/') }}" class="btn btn-warning btn-md">Kembali ke halaman beranda</a>  
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $('#form_pengaduan').on('submit', function(e) {
            e.preventDefault();
            swal(
                'Success!',
                'Pesan berhasil terkirim',
                'success'
            )
        });
    </script> --}}
@endsection
