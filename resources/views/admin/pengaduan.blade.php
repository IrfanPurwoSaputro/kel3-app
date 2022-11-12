@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Pengaduan Gunung Lawu 
                  &nbsp;  @if($message=Session::get('success'))
                    <div class="badge badge-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
                  @endif</h4>
                  <p class="card-description">
                  <form action="{{url('pengaduan_list')}}">
                   <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <button class="input-group-text" id="search">
                        <i class="icon-search"></i>&nbsp; Cari
                      </button>
                    </div>
                  <input type="text" class="form-control" id="navbar-search-input"
                   placeholder="Cari berdasarkan kode booking atau nama" value="{{$request->filter}}" aria-label="search" aria-describedby="search" name="filter">
                  </div>
                </form>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Kode Booking</th>
                          <th>No Telepon</th>
                          <th>Pesan</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $key => $item)
                        <tr>
                          <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->kode}}</td>
                          <td>{{$item->no_telepon}}</td>
                          <td>{{$item->pesan}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex justify-content-center">
                      {!! $data->links() !!}
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')

@endsection
