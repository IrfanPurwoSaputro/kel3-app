<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = [
                [
                    "nama" => 'Cemoro Sewu',
                    "kategori" => 'Rute Termudah',
                    "deskripsi" => 'Cemoro Sewu terletak di jalan antara kabupaten
                Karanganyar dan Magetan tepatnya di jalan dari Tawangmangu menuju Sarangan.
                Untuk lebih mudahnya yang perlu kita tuju adalah Tawangmangu, Jawa Tengah. Jika
                kita dari arah barat maka tujulah Solo, kemudian Tawangmangu. Jika dari arah
                Timur maka tujulah arah Magetan, lalu Tawangmangu. Karena tempatnya yang populer
                maka sekiranya akan mudah untuk menuju ke sana.',
                "active" => "active"
                ],
                [
                    "nama" => 'Cemoro Kandang',
                    "kategori" => 'Rute Normal',
                    "deskripsi" => 'Cemoro Kandang terletak tidak jauh dari basecamp Cemoro
                Sewu. Untuk mencapai basecamp Cemoro Kandang tidaklah susah. Sama seperti Cemoro
                Sewu, kita hanya perlu menuju daerah Tawangmangu. Jika kita dari arah barat maka
                tujulah Solo, kemudian Tawangmangu. Jika dari arah Timur maka tujulah arah
                Magetan, lalu Tawangmangu. Karena tempatnya yang populer maka sekiranya akan
                mudah untuk menuju ke sana.',
                "active" => ""
                ],
                [
                    "nama" => 'Candi Cetho',
                    "kategori" => 'Rute Normal',
                    "deskripsi" => 'Jalur pendakian gunung lawu via cetho akhir - akhir ini
                sangat diminati karena sekalian wisata di candi cetho dan kebun teh kemuning dan
                yang paling diminati adalah jalur tracknya yang dipenuhi dengan padang savana,
                untuk bisa sampai ke titik awal pendakian gunung lawu via candi cetho kamu bisa
                menuju ke kawasan wisata candi cetho jika kamu berasal dari jakarta, bisa naik
                kereta turun di solo kemudian naik bus menuju terminal ngargoyoso dari terminal
                ini kamu bisa ojek atau sewa mobil menuju candi cetho hanya berjarak +-6km',
                "active" => ""
                ]
            ];
            return view('pengguna.home.index', [
                "jalurs" => $data,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about()
    {
        $data = DB::table('informasi')->orderBy('created_at','DESC')->get();
        return view('pengguna.informasi.index',[
            "informasi" => $data
        ]);
    }

    public function detail_informasi($id)
    {
        $data = DB::table('informasi')->where('id_informasi',$id)->first();
        if($data)
        {   $tgl = Carbon::parse($data->created_at)->format('d F Y');
            return view('pengguna.informasi.detail_informasi',[
                "judul" => $data->judul,
                "isi" => $data->isi,
                "tgl" => $tgl,
                'gambar'=>$data->gambar
            ]);
        }  else{
            return redirect('/');
        } 
        
    }

    public function contact()
    {
        return view('pengguna.pengaduan.index');
    }

    public function booking()
    {
        return view('pengguna.pemesanan.index');
    }

    public function booking_form()
    {
        return view('pengguna.pemesanan.booking_form');
    }
}
