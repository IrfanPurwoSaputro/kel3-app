@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="section  product mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="black"> Pembayaran</strong> Pendakian</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Pembayaran</strong>
                        </div>
                        <div class="card-body">
                            <table class="table" id="userList">
                                @foreach($data_pemesanan as $dp)
                                <thead>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col" class="">: {{ $dp->status }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Bank Tujuan</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: Bank {{ $dp->pembayaran }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Virtual Account Number</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: 123456789</th>
                                </thead>
                                <thead>
                                    <th scope="col">Kode Booking</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: {{ $dp->kode }}</th>
                                </thead>
                                <thead>
                                    <th scope="col">Total Pembayaran</th>
                                    {{-- <th scope="col">Kebangsaan</th> --}}
                                    <th scope="col">: Rp. {{ $dp->total_harga }}</th>
                                </thead>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection