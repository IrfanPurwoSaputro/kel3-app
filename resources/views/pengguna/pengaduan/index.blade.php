@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="contact_us layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2 style="text-align: center; margin-top: 145px;">Form Aduan <strong
                                style="color: #111315;">Masyarakat</strong></h2>
                        {{-- <span style="text-align: center;">Identitas pelapor dijamin kerahasiaannya</span> --}}
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
                        <form method="POST" action="{{ route('pengaduan.store') }}" id="form_pengaduan">
                            @csrf
                            <div class="form-group">
                                <input type="text" style="color: black" class="form-control form-control-sm" placeholder="Nama" name="nama">
                            </div>
                            <div class="form-group">
                                <input type="text" style="color: black" class="form-control form-control-sm" placeholder="Phone" name="no_telepon">
                            </div>
                            <div class="form-group">
                                <input type="text" style="color: black" class="form-control form-control-sm" placeholder="Kode Booking(Opsional)" name="kode">
                            </div>
                            <div class="form-group">
                                <textarea type="text" style="color: black" class="form-control form-control-sm" placeholder="Pesan" name="pesan"></textarea>
                            </div>
                            <div class="submit_btn">
                                <input type="submit" name="submit" class="btn btn-warning" value="Kirim" style="width: 150px;">
                            </div>p
                        </form>
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
