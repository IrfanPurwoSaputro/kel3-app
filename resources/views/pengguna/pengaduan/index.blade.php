@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="contact_us layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2 style="text-align: center; margin-top: 145px;">Form Aduan <strong
                                style="color: #111315;">Masyarakat</strong></h2>
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
