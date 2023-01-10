@extends('pengguna.layout.main')
@section('konten')
    <div id="plant" class="section  product mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="black"> Registrasi</strong> Pendakian</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data" id="data_form">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Booking</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jalur_pendakian">Jalur Pendakian</label>
                                    <select class="form-control" style="height: 50px" name="jalur_pendakian" id="jalur_pendakian">
                                        <option value=" " disabled selected>Pilih Jalur Pendakian</option>
                                        @foreach($jalur as $jl)
                                            <option value="{{ $jl->id_jalur }}">{{ $jl->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('jalur_pendakian')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_naik">Tanggal Berangkat</label>
                                    <input type="date" class="date form-control" name="tanggal_naik" id="tanggal_naik">
                                    @error('tanggal_naik')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_turun">Tanggal Pulang</label>
                                    <input type="date" class="date form-control" name="tanggal_turun" id="tanggal_turun">
                                    @error('tanggal_turun')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kendaraan</label>
                                    <select class="form-control" style="height: 50px" name="jenis_kendaraan">
                                        <option>Roda Dua</option>
                                        <option>Roda Empat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jumlah Kendaraan</label>
                                    <input type="number" class="form-control" name="jumlah_kendaraan">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Data Ketua</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                    @error('nama')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kebangsaan</label>
                                    <input type="text" class="form-control" name="kebangsaan">
                                </div> --}}
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" style="height: 50px" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" selected>Pilih jenis kelamin</option>
                                        <option value="Laki-laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                    <p>Usia harus lebih dari 12 tahun</p>
                                    @error('tanggal_lahir')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_identitas">Jenis Identitas</label>
                                    <select class="form-control" style="height: 50px" name="jenis_identitas" id="jenis_identitas">
                                        <option value="">Pilih Identitas</option>
                                        <option value="KTM">KTM</option>
                                        <option value="KTP">KTP</option>
                                        <option value="Passport">Passport</option>
                                    </select>
                                    @error('jenis_identitas')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_identitas">Nomor Kartu Identitas</label>
                                    <input type="text" class="form-control" name="no_identitas" id="no_identitas">
                                    @error('no_identitas')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat_rumah">Alamat Rumah</label>
                                    <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah">
                                    @error('alamat_rumah')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" style="height: 50px" name="provinsi" id="provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kota/Kabupaten</label>
                                    <select class="form-control" style="height: 50px" name="kabupaten" id="kabupaten">
                                        {{-- <option value="">Pilih Kota</option> --}}
                                    </select>
                                    @error('kabupaten')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_telepon">No. Telepon/HP</label>
                                    <input type="text" class="form-control" name="no_telepon" id="no_telepon">
                                    @error('no_telepon')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="surat_sehat">Surat Kesehatan</label>
                                    <input type="file" class="form-control" name="surat_sehat" id="surat_sehat">
                                    @error('surat_sehat')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Data Anggota</strong>
                            </div>
                            <div class="card-body">
                                <table class="table" id="userList">
                                    <thead class="thead-light">
                                        <th scope="col">Nama</th>
                                        {{-- <th scope="col">Kebangsaan</th> --}}
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Identitas</th>
                                        <th scope="col">Nomor Kartu Identitas</th>
                                        <th scope="col">Alamat Rumah</th>
                                        <th scope="col">No. Telepon/HP</th>
                                        <th scope="col">Aksi</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    <input type="button" class="btn btn-info" value="Tambah Anggota" data-toggle="modal" data-target="#anggotaModal" id="modal_anggota" disabled>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Pembayaran</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih Bank Tujuan</label>
                                    <select class="form-control" style="height: 50px" name="pembayaran" id="pembayaran">
                                        <option value=" " disabled selected>Pilih Pembayaran</option>
                                        <option value="BRI">Bank BRI</option>
                                        <option value="BNI">Bank BNI</option>
                                        <option value="BCA">Bank BCA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Konfirmasi Booking</strong>
                            </div>
                            <div class="card-body">
                                <p class="text-secondary" style="font-weight:bold">Dengan menekan tombol Kirim dibawah ini, maka Anda menyetujui segala Persyaratan dan Kebijakan TN Bromo Tengger Semeru.</p>
                                <div>
                                    <p>Rincian Booking online anda terdiri dari :</p>
                                    {{-- <p style="font-weight:bold">29 Oktober 2022</p> --}}
                                    
                                    <p style="display: inline" id="orang">0</p>Orang x Rp. 25.000
                                    <p class="text-warning" style="font-weight:bold" style="display: inline">TOTAL Rp.</p> <p id="hasil" class="text-warning" style="font-weight:bold" style="display: inline">0</p>
                                    <div style="padding: 15px 0 0 0; text-align: left;" class="ml-3">
                                        <input type="submit" name="submit" class="btn btn-warning" value="Kirim" style="width: 150px;">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="total_harga" id="total_harga">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="anggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Data Anggota</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="userEntry">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="modal_nama" id="modal_nama">
                            @error('modal_nama')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Kebangsaan</label>
                            <input type="text" class="form-control" name="kebangsaan" id="kebangsaan">
                        </div> --}}
                        <div class="form-group">
                            <label>Jenis Kelamin</label>    
                            <select class="form-control" style="height: 50px" name="modal_jenis_kelamin" id="modal_jenis_kelamin">
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('modal_jenis_kelamin')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="modal_tanggal_lahir" id="modal_tanggal_lahir">
                            @error('modal_tanggal_lahir')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Identitas</label>
                            <select class="form-control" style="height: 50px" name="modal_jenis_identitas" id="modal_jenis_identitas">
                                <option value="">Pilih Identitas</option>
                                <option value="KTM">KTM</option>
                                <option value="KTP">KTP</option>
                                <option value="Passport">Passport</option>
                            </select>
                            @error('modal_jenis_identitas')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nomor Kartu Identitas</label>
                            <input type="text" class="form-control" name="modal_no_identitas" id="modal_no_identitas">
                            @error('modal_no_identitas')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" class="form-control" name="modal_alamat_rumah" id="modal_alamat_rumah">
                            @error('modal_alamat_rumah')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control" style="height: 50px" name="modal_provinsi" id="modal_provinsi">
                                <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                    @endforeach
                            </select>
                            @error('modal_provinsi')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kota/Kabupaten</label>
                            <select class="form-control" style="height: 50px" name="modal_kabupaten" id="modal_kabupaten">

                            </select>
                            @error('modal_kabupaten')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Telepon/HP</label>   
                            <input type="text" class="form-control" name="modal_no_telepon" id="modal_no_telepon">
                            @error('modal_no_telepon')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>  
                        {{-- <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div> --}}
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        {{-- modal end --}}
    </div>

    <script>
        $(document).ready(function() {
            let counter = 0;
            let orang = 1;

            // $(function() {
            //     $("#tanggal_naik").datepicker();
            //     var tanggal_naik = $("#tanggal_naik")
            // });
            // $(function() {
            //     $("#tanggal_turun").datepicker();
            //     var tanggal_turun = $("#tanggal_turun")
            // });

            $( "#jenis_identitas" ).change(function() {
            //     tanggal_naik = new Date(tanggal_naik.value);
            //     tanggal_turun = new Date(tanggal_turun.value);
            //     var milli_secs = tanggal_naik.getTime() - tanggal_turun.getTime();
             
            //     // Convert the milli seconds to Days 
            //     var days = milli_secs / (1000 * 3600 * 24);
            //     var diff = Math.round(Math.abs(days));
            //     console.log(diff);
                var hasil = (orang * 25000);
                $('#orang').text(orang);
                $('#hasil').text(hasil);
                $('#total_harga').val(hasil);
                $('#modal_anggota').prop('disabled', false);
            });

            $('#userEntry').on('submit', function(e) {
                e.preventDefault();

                const rows = [];
                const data = [];
                $.each($(this).serializeArray(), function(i, field) {
                    if (i > 0 && field.name === rows[rows.length - 1].name) {
                        rows[rows.length - 1].value += ';' + field.value; 
                    } else {
                        rows.push(field);
                        // $("#data_form").append('<input type="hidden" name="' + field.name + '" value="' + field.value + '">');
                    }
                });
                // data.push(rows);
                // console.log(data);      

                let list = '<tr>';
                $.each(rows, function(i, field) {
                    list += '<input type="hidden" name="userEntry[' + String(counter) + '][' + field.name + ']" value="' + field.value + '"/>';
                    if (field.name != "modal_provinsi" && field.name != "modal_kabupaten") {
                        list += '<td>' + field.value + '</td>';
                    }
                });

                list += '<td><button class="del btn btn-warning">delete</button></tr>';
                $('#userList tbody').append(list);
                $('#anggotaModal').modal('hide');
                counter++;
                var rowCount = $('#userList tr').length;
                // selisih tanggal
                // tanggal_naik = new Date(tanggal_naik.value);
                // tanggal_turun = new Date(tanggal_turun.value);
                // var milli_secs = tanggal_naik.getTime() - tanggal_turun.getTime();  
                // var days = milli_secs / (1000 * 3600 * 24);
                // var diff = Math.round(Math.abs(days));

                var jum_orang = orang + (rowCount-1);
                $('#orang').text(jum_orang);
                $('.del').click(function(){
                    this.parentNode.parentNode.remove()
                    jum_orang = jum_orang-1;
                    $('#orang').text(jum_orang);
                    var total = (jum_orang*25000);
                    $('#hasil').text(total);
                    $('#total_harga').val() = total;
                });
                var total =  (jum_orang*25000);
                $('#hasil').text(total);
                $('#total_harga').val(total);
                $(this)[0].reset();
            });
            
            $(function(){
                var dtToday = new Date();
                
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10)
                    month = '0' + month.toString();
                if(day < 10)
                    day = '0' + day.toString();
                
                var maxDate = year + '-' + month + '-' + day;
                $('#tanggal_naik').attr('min', maxDate);
                var tgl_naik = $('#tanggal_naik').val()
                $('#tanggal_turun').attr('min', maxDate);
            });

            // var day = 12;
            // var month = 12;
            // var year = 2010;
            // var age = 18;
            // var setDate = new Date(year + age, month - 1, day);
            // var currdate = $('#tanggal_lahir').val();

            // if (currdate <= setDate) {
            // // you are above 18
            //     alert("below 12")
            // }



            // $(function() {
            //     $.ajaxSetup({
            //         headers: {'X-CRSF-TOKEN': $('meta[name="crsf-token"]').attr('content') }
            //     });
            // });

            // $('#provinsi').on('change', function () {
            //     var idCountry = this.value;
            //     console.log(5);
            //     $("#kabupaten").html('');
            //     $.ajax({
            //         url: "{{url('store_prov')}}",
            //         type: "POST",
            //         data: {
            //             idprovinsi: idCountry,
            //             _token: '{{csrf_token()}}'

            //     },
            //     dataType: 'json',
            //     success: function (result) {
            //         $('#kabupaten').html('<option value="">Pilih Kab/Kota</option>');
            //         $.each(result.states, function (key, value) {
            //             $("#state-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
            //         });

            //         // $('#kabupaten').html('<option value="">-- Select City --</option>');

            //     }
            // });

            $( "#provinsi" ).change(function() {
                var idprovinsi = $(this).val();
                $("#kabupaten").html('');
                $.ajax({
                    url: "{{url('store_prov')}}",
                    type: "POST",
                    data: {
                        idprovinsi: idprovinsi,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#kabupaten').html('<option value="">Pilih Kab/Kota</option>');
                        $.each(result.cities, function (key, value) {
                            $("#kabupaten").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });    
            });

            $( "#modal_provinsi" ).change(function() {
                var idprovinsi = $(this).val();
                $("#modal_kabupaten").html('');
                $.ajax({
                    url: "{{url('store_prov')}}",
                    type: "POST",
                    data: {
                        idprovinsi: idprovinsi,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#modal_kabupaten').html('<option value="">Pilih Kab/Kota</option>');
                        $.each(result.cities, function (key, value) {
                            $("#modal_kabupaten").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    // $('#kabupaten').html('<option value="">-- Select City --</option>');

                    }
                });    
            });
        });
    </script>
@endsection