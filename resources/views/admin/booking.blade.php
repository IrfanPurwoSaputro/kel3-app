@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Booking Tiket Masuk Gunung Lawu &nbsp;  @if($message=Session::get('success'))
                    <div class="badge badge-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
                  @endif</h4>
                  <p class="card-description">
                  <form action="{{url('booking_list')}}">
                   <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <button class="input-group-text" id="search">
                        <i class="icon-search"></i>&nbsp; Cari
                      </button>
                    </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari berdasarkan kode pemesanan" value="{{$request->filter}}" aria-label="search" aria-describedby="search" name="filter">
                  </div>
                </form>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Jalur</th>
                          <th>Nama Ketua</th>
                          <th>Tanggal Naik</th>
                          <th>Grand Total</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $key => $item)
                        <tr>
                          <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>
                          <td>{{$item->kode}}</td>
                          <td>{{$item->nama_jalur}}</td>
                          <td>{{$item->nama_anggota}}</td>
                          <td>{{\Carbon\Carbon::parse($item->created_at)->format('d F Y')}}</td>
                          <td>Rp{{number_format($item->total_harga, 0, ",", ".")}}</td>
                          <td>
                            @if($item->status == 'belum dibayar')
                            <a class="badge badge-danger btn-sm">{{ucwords($item->status)}}</a>
                            <a class="badge badge-success btn-sm" 
                               onclick="return confirm('Yakin untuk membuat pemesanan lunas?')" 
                               href="{{url('booking_list_update/'.$item->id_pemesanan)}}">
                             Jadikan lunas
                           </a>
                            @else
                            <a class="badge badge-success btn-sm">{{ucwords(str_replace('_',' ',$item->status))}}</a>
                            @endif
                            <a class="badge badge-info btn-sm" type="button" 
                                    data-toggle="modal" data-target="#myModal"
                                    onclick="getDetail('<?php echo $item->kode?>')">
                              <i class="fa fa-eye"></i> Detail
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
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail</h4>
          <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body" >
            <p align="center" id="proses_data">Proses pengambilan data, mohon tunggu...!</p>
            <div id="konten_body">
              
            </div>
         </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   $(document).ready(function() {

 });

function getDetail(id)
{
  $('#proses_data').show();
  $('#konten_body').empty();
  $.ajax({
        type: 'get',
        url: "{{url('/booking_list_detail')}}"+"/"+id,
        dataType: 'json',
          success: function (data) {
            $('#proses_data').hide();
            $('#konten_body').append(data.html);
          },
          error: function (data) {
            console.log('Error:', data);
        }
    });
}
</script>
@endsection
