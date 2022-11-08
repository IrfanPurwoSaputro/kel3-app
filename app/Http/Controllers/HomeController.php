<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            // dd($data);
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
        $data = [
            [
                "judul" => "Kabar Gembira! Macan Tutul Belum Punah",
                "slug" => "Kabar-Gembira!-Macan-Tutul-Belum-Punah",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 11 Sep 2022" 
            ],
            [
                "judul" => "Sensasi lebaran di lawu",
                "slug" => "Sensasi-lebaran-di-lawu",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 11 Sep 2022"
            ],
            [
                "judul" => "Gunung Lawu Ditutup Sementara",
                "slug" => "Gunung-Lawu-Ditutup-Sementara",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 11 Sep 2022"
            ]
        ];
        return view('pengguna.informasi.index',[
            "informasi" => $data
        ]);
    }

    public function detail_informasi($slug)
    {
        $data = [
            [
                "judul" => "Kabar Gembira! Macan Tutul Belum Punah",
                "slug" => "Kabar-Gembira!-Macan-Tutul-Belum-Punah",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 11 September 2022" 
            ],
            [
                "judul" => "Sensasi lebaran di lawu",
                "slug" => "Sensasi-lebaran-di-lawu",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 09 Maret 2022"
            ],  
            [
                "judul" => "Gunung Lawu Ditutup Sementara",
                "slug" => "Gunung-Lawu-Ditutup-Sementara",
                "isi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit et dolores neque vitae laboriosam in inventore necessitatibus, autem consequuntur asperiores officia voluptates harum! Quisquam, ad. Quisquam quam porro asperiores aut deleniti nostrum, tempore voluptatibus quaerat ipsam atque. Est molestiae porro nesciunt, sequi explicabo possimus officiis libero cupiditate incidunt corporis sapiente, dolores similique error ducimus earum maiores totam modi! Sit rem reprehenderit unde ut temporibus. Cumque aut neque ad sed error, quibusdam dolore beatae omnis iure laborum eum, eveniet officia accusantium laudantium in ipsam dignissimos odio ipsa sequi commodi atque voluptatibus nihil? Excepturi fuga magni, expedita tempora tenetur repudiandae libero.",
                "tgl" => "Madiun, 1 Februari 2022"
            ]
        ];
        $judul = '';
        $isi = '';
        $tgl = '';
       foreach($data as $d){
           if($slug == $d['slug']){
            $judul = $d['judul'];
            $isi = $d['isi'];
            $tgl = $d['tgl'];
           }
       }

        
        return view('pengguna.informasi.detail_informasi',[
            "judul" => $judul,
            "isi" => $isi,
            "tgl" => $tgl
        ]);
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
