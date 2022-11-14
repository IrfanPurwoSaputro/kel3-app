@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="section  product mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="black"> Kode</strong> Booking</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Hasil Pencarian</strong>
                        </div>
                        <div class="card-body">
                            <table class="table" id="userList">
                                @foreach($hasil as $hl)
                                    @if(is_null($hl))
                                        <thead>
                                            <th scope="col">
                                                <h4>Kode Booking Salah</h4>
                                                <p>Data tidak dtemukan</p>
                                            </th>
                                        </thead>
                                    @else
                                        <thead>
                                            <th scope="col">Status</th>
                                            @if ($hl->status == 'belum dibayar')
                                                <th scope="col">
                                                    : <i class="badge badge-danger  btn-sm">{{ucwords($hl->status)}}</i>
                                                </th>
                                            @else
                                                <th scope="col">
                                                    : <i class="badge badge-success btn-sm">{{ucwords(str_replace('_',' ',$hl->status))}}</i>
                                                </th>
                                            @endif
                                        </thead>
                                        <thead>
                                            <th scope="col">Bank Tujuan</th>
                                            {{-- <th scope="col">Kebangs    aan</th> --}}
                                            <th scope="col">: Bank {{ $hl->pembayaran }}</th>
                                        </thead>
                                        <thead>
                                            <th scope="col">Virtual Account Number</th>
                                            <th scope="col">: 123456789</th>
                                        </thead>
                                        <thead>
                                            <th scope="col">Kode Booking</th>
                                            <th scope="col">: {{ $hl->kode }}</th>
                                        </thead>
                                        <thead>
                                            <th scope="col">Total Pembayaran</th>
                                            <th scope="col">: Rp. {{ $hl->total_harga }}</th>
                                        </thead>
                                        <thead>
                                            @if ($hl->status == 'sudah_dibayar')
                                                <th scope="col">Bukti Pembayaran</th>
                                                <th scope="col">
                                                    :  <a href="{{url('get_document/'.$hl->id_pemesanan)}}" style="color: blue">Lihat Bukti Booking</a>
                                                </th>   
                                            @endif
                                        </thead>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection