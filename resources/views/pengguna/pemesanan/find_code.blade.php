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
                                @if($hasil == null)
                                <thead>
                                    <th scope="col">
                                        <h4>Kode Booking Salah</h4>
                                        <p>Data tidak dtemukan</p>
                                    </th>
                                </thead>
                                @else
                                <thead>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col" class="">: {{ $hl->status }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Bank Tujuan</th>
                                    {{-- <th scope="col">Kebangs    aan</th> --}}
                                    <th scope="col">: Bank {{ $hl->pembayaran }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Virtual Account Number</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: 123456789</th>
                                </thead>
                                <thead>
                                    <th scope="col">Kode Booking</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: {{ $hl->kode }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Total Pembayaran</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: Rp. {{ $hl->total_harga }}</th>
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