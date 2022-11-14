<!DOCTYPE html>
<html>
<head>
	<title>Bukti Booking Online Gunung Lawu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
	table {
		font-size: 11px;
	}

	#pendaki {
		font-size: 10px;
	}

	#pendaki thead th td{
		padding: 10px;
	}
	</style>
<body>
	<center>
		<h5>Bukti Booking Online Gunung Lawu</h4>
	</center>
	<br>
	@foreach ($ketua as $data)
	<div>
		<table>
			<tr>
				<td>Kode Booking</td>
				<td>: <b>{{ $data->kode }}</b></td>
			</tr>
			<tr>
				<td>Jalur Masuk</td>
				<td>: {{ $data->nama_jalur	 }}</td>
			</tr>
			<tr>
				<td>Tanggal Naik</td>
				<td>: {{ \Carbon\Carbon::parse($data->tanggal_naik)->format('d F Y') }}</td>
			</tr>
			<tr>
				<td>Tanggal Turun</td>
				<td>: {{ \Carbon\Carbon::parse($data->tanggal_turun)->format('d F Y') }}</td>
			</tr>
			<tr>
				<td>Total Pembayaran</td>
				<td>: Rp {{ number_format($data->total_harga, 0, ",", ".") }}</td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td>: {{ucwords(str_replace('_',' ',$data->status))}}</td>
			</tr>
		</table>
	</div>
	@endforeach
	<br>		
	<h6> Data Pendaki</h6>
 
	<table class='table table-bordered' id="pendaki">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Identitas</th>
				<th>No. Identitas</th>
				<th>Alamat</th>
				<th>Kota</th>
				<th>Provinsi</th>
				<th>Telepon</th>
				{{-- <th>Email</th> --}}
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($anggota as $p	)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->jenis_kelamin}}</td>
				<td>{{$p->jenis_identitas}}</td>
				<td>{{$p->no_identitas}}</td>
				<td>{{$p->alamat_rumah}}</td>
				<td>{{$p->nama_kabupaten}}</td>
				<td>{{$p->nama_provinsi}}</td>
				<td>{{$p->no_telepon}}</td>
				{{-- <td>{{$p->email}}</td> --}}
				@if ($p->email != null)
					<td>Ketua</td>
				@else
					<td>Anggota</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>