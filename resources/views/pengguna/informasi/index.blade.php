@extends('pengguna.layout.main')
@section('konten')
    <!--about -->
    <div class="section about ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titlepage">
                        <h2><strong class="black"> Seputar</strong> Informasi</h2>
                        <span>Berisikan informasi terkini seputar gunung lawu
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
               
                @foreach ($informasi as $data)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/ga.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><strong class="price_text">{{ $data['judul'] }}</strong></h5>
                            <p class="card-text text-secondary">{{ $data['tgl'] }}</p>
                            <a href="/detail_informasi/{{ $data['slug'] }}" class="text-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>     
                @endforeach
               
            </div>
        </div>
    </div>

    <!--end about -->
@endsection
