@extends('pengguna.layout.main')
@section('konten')
    <!--about -->
    <div class="section about ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titlepage">
                        <h2>{{ $judul }}</h2>
                        <span>{{ $tgl }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                    <div>
                        <img src="{{ $gambar }}" class="card-img-top" alt="...">
                        <p class="text-black text-justify">
                            <?php echo $isi?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end about -->
@endsection
