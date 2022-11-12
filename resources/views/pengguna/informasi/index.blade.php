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
            <div class="row">
               
                @foreach ($informasi as $data)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <img src="{{ $data->gambar }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><strong class="price_text">{{ $data->judul }}</strong></h5>
                            <p class="card-text text-secondary">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y'); }}</p>
                            <a href="/detail_informasi/{{ $data->id_informasi }}" class="text-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>     
                @endforeach
               
            </div>
        </div>
    </div>

    <!--end about -->
@endsection
