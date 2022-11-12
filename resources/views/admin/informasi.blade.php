@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Informasi Gunung Lawu 
                  &nbsp;  @if($message=Session::get('success'))
                    <div class="badge badge-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
                  @endif
                <br>
                <p align="right">
                <a class="btn btn-warning" href="{{url('informasi_create')}}">
                    Tambah
                </a>
                </p>
                  </h4>
                  <p class="card-description">
                  <form action="{{url('pengaduan_list')}}">
                   <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <button class="input-group-text" id="search">
                        <i class="icon-search"></i>&nbsp; Cari
                      </button>
                    </div>
                  <input type="text" class="form-control" id="navbar-search-input"
                   placeholder="Cari berdasarkan judul informasi" value="{{$request->filter}}" aria-label="search" aria-describedby="search" name="filter">
                  </div>
                </form>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <!-- <th>Isi</th> -->
                          <th>Gambar</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $key => $item)
                        <tr>
                          <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>
                          <td>{{$item->judul}}</td>
                          <!-- <td><?php echo mb_strimwidth($item->isi, 0, 40, "...");?></td> -->
                          <td>
                                <img src="{{$item->gambar}}" style="max-width:300px;max-height:300px;">
                          </td>
                          <td>
                            <a class="badge badge-warning btn-sm" href="{{url('informasi_edit/'.$item->id_informasi)}}">
                                Edit
                            </a>
                            &nbsp;&nbsp;
                            <a class="badge badge-danger btn-sm" 
                               onclick="return confirm('Yakin untuk menghapus informasi?')"
                               href="{{url('informasi_delete/'.$item->id_informasi)}}">
                                Delete
                            </a>
                          </td>
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
