@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Selamat Datang {{Auth::user()->nama}}</h3>
          <h6 class="font-weight-normal mb-0">Semoga hari anda menyenangkan</h6>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white " type="button">
              Today {{\Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->format('d F Y')}}
            </button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{url('images/admin/dashboard/people.svg')}}" alt="people">
          <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 class="mb-0 font-weight-normal" id="suhu" style="display: none;">
                  <i class="fa fa-sun-o mr-2"></i>31<sup >C</sup>
                </h2>
                <h2 class="mb-0 font-weight-normal" id="awal">Proses pengambilan data BMKG API...</h2>
              </div>
              <div class="ml-2">
                <h4 class="location font-weight-normal">Indonesia</h4>
                 <h6 class="font-weight-normal">Ngawi <span id="jam"></span></h6>
                 <h6 class="font-weight-normal" id="sumber">Sumber : </h6>
                 <h6 class="font-weight-normal" id="pusat">Pusat : </h6>
                 <h6 class="font-weight-normal" id="lihat"><a style="cursor:pointer;">Lihat Sumber &nbsp;<i class="fa fa-link"></i></a></h6>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Total Booking Hari ini</p>
              <p class="fs-30 mb-2">{{$bookingToday}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Keseluruhan Booking</p>
              <p class="fs-30 mb-2">{{$bookingAll}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Total Anggota</p>
              <p class="fs-30 mb-2">{{$anggota}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Total Pengaduan</p>
              <p class="fs-30 mb-2">{{$pengaduan}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   $(document).ready(function() {
    $.ajax({
        type: 'get',
        url: "{{url('/admin_suhu_ngawi_get')}}",
        dataType: 'json',
          success: function (data) {
            $('#awal').hide();
            $('#suhu').show();
            $('#suhu').empty();
            $('#suhu').append(data.suhu);
            $('#sumber').empty();
            $('#sumber').append(data.sumber);
            $('#pusat').empty();
            $('#pusat').append(data.pusat);
            $('#lihat').empty();
            $('#lihat').append(data.lihat);
            $('#jam').empty();
            $('#jam').append(data.jam);
          },
          error: function (data) {
            console.log('Error:', data);
        }
    });
 });
</script>
@endsection
