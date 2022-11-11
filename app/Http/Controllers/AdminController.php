<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('admin.index');
    }

    public function getCuacaCelciusBmkg()
    {
        $today = Carbon::now('Asia/Jakarta')->format('YmdHi');
        $jam = Carbon::now('Asia/Jakarta')->format('H:i');
        $url = 'https://cuaca.umkt.ac.id/api/cuaca/DigitalForecast-JawaTimur.xml';
        $fileContents= file_get_contents($url);
        $result = json_decode($fileContents, true);
        $area = $result['row']['data']['forecast']['area'];
        $ngawi = array_search('501294', array_column($area, '@id')); //ngawi
        $ngawiParam = $area[$ngawi]['parameter'];
        $ngawiDay = array_search('t', array_column($ngawiParam, '@id'));
        $resultNgawiDay = $ngawiParam[$ngawiDay];
        $day = $resultNgawiDay['timerange'];
        $dt = $result['row']['data']['@source'];
        $pd = $result['row']['data']['@productioncenter'];
        $kondisiNya = $this->nightOrMoon();
        $ngawiTime = array_search($today, array_column($day, '@datetime'));
        $resultNgawiTime = $day[$ngawiTime];
        $suhuText =$kondisiNya.$resultNgawiTime['value'][0]['#text'].'<sup >'.$resultNgawiTime['value'][0]['@unit'].'</sup>'; //c
       // $suhuSatuan = ; //c
        $lihat = '<a href="https://cuaca.umkt.ac.id/api/cuaca/DigitalForecast-JawaTimur.xml" target="_blank">Lihat Sumber &nbsp;<i class="fa fa-link"></i></a>';
        return response()->json(['suhu'=>$suhuText,'today'=>$today,'sumber'=>'Sumber : '.$dt.'','pusat'=>'Pusat : '.$pd.'','lihat'=>$lihat,'jam'=>$jam]);
    }

    public function nightOrMoon()
    {
         $hour = date("G"); 
        $minute = date("i"); 
        $second = date("s"); 
          if ( (int)$hour == 0 && (int)$hour <= 9 ) { 
              $greet = '<i class="fa fa-sun-o mr-2"></i>'; 
          } else if ( (int)$hour >= 10 && (int)$hour <= 11 ) { 
              $greet = '<i class="fa fa-sun-o mr-2"></i>'; 
          } else if ( (int)$hour >= 12 && (int)$hour <= 15 ) { 
              $greet = '<i class="fa fa-moon-o mr-2"></i>'; 
          } else if ( (int)$hour >= 16 && (int)$hour <= 23 ) { 
              $greet = '<i class="fa fa-moon-o mr-2"></i>'; 
          } else { 
              $greet = '<i class="fa fa-moon-o mr-2"></i>'; 
          }

          return $greet;
    }

    public function bookingTiketList(Request $request)
    {
        //dd('aqil');
        $get = DB::table('pemesanan as pms');
                $get->join('anggota as aga','aga.pemesanan_id','=','pms.id_pemesanan');
                $get->join('jalur as jur','jur.id_jalur','=','pms.jalur_id');
                $get->join('indonesia_provinces as ip','ip.id','=','aga.provinsi_id');
                $get->join('indonesia_cities as ics','ics.id','=','aga.kabupaten_id');
                if($request->filter != NULL)
                {
                    $get->where('pms.kode',$request->filter);
                }
                $get->select('pms.*','aga.nama as nama_anggota','jur.nama as nama_jalur');
                $get->orderBy('pms.created_at','DESC');
                $data = $get->paginate(10);
        //return $data;
        return view('admin.booking',compact('data','request'));
    }

    public function updateStatusBooking($id)
    {
         $data = DB::table('pemesanan as pms')->where('id_pemesanan',$id)->first();
         DB::table('pemesanan as pms')->where('id_pemesanan',$id)->update(['status'=>'sudah_dibayar']);
         return redirect()->back()->with('success','Berhasil mengubah status booking '.$data->kode.'!');
    }

    public function getDetailBooking($id)
    {
        $get = DB::table('pemesanan as pms');
                $get->join('anggota as aga','aga.pemesanan_id','=','pms.id_pemesanan');
                $get->join('jalur as jur','jur.id_jalur','=','pms.jalur_id');
                $get->join('indonesia_provinces as ip','ip.id','=','aga.provinsi_id');
                $get->join('indonesia_cities as ics','ics.id','=','aga.kabupaten_id');
                $get->where('pms.id_pemesanan',$id);
                $get->select('pms.*'
                            ,'aga.nama as nama_anggota','aga.kebangsaan','aga.jenis_kelamin'
                            ,'aga.tanggal_lahir','aga.jenis_identitas','aga.no_identitas','aga.alamat_rumah'
                            ,'aga.no_telepon','aga.email'
                            ,'ip.name as nama_provinsi','ics.name as nama_kabupaten'
                            ,'jur.nama as nama_jalur','jur.deskripsi'
                            );
                $get->orderBy('pms.created_at','DESC');
                $data = $get->first();
        if($data->status == 'belum dibayar'){
            $status = '<a class="badge badge-danger btn-sm">'.str_replace('_',' ',ucwords($data->status)).'</a>';
        }else{
            $status = '<a class="badge badge-success btn-sm">'.str_replace('_',' ',ucwords($data->status)).'</a>';
        }
        $html = '<div class="row">';
        $bodyOne = '<div class="col-md-6">';
        $bodyTwo = '<div class="col-md-6">';

        $bodyOne .= '<p align="center"><b>Detail Pemesanan</b></p>
                     <p>Jalur Pendakian : '.$data->nama_jalur.' <br> '.$data->deskripsi.'</p>
                     <p>Tanggal Naik : '.Carbon::parse($data->tanggal_naik)->format('d F Y').'</p>
                     <p>Tanggal Turun : '.Carbon::parse($data->tanggal_turun)->format('d F Y').'</p>
                     <p>Tanggal Booking : '.Carbon::parse($data->created_at)->format('d F Y').'</p>
                     <p>Grand Total : '.number_format($data->total_harga, 0, ",", ".").'</p>
                     <p>Metode Pembayaran : '.$data->pembayaran.'</p>
                     <p>Status Booking : '.$status.'</p>';

        $bodyTwo .= '<p align="center"><b>Detail Anggota</b></p>
                     <p>Nama Anggota : '.$data->nama_anggota.'</p>
                     <p>Kebangsaan : '.$data->kebangsaan.'</p>
                     <p>Asal : '.$data->nama_provinsi.' '.$data->nama_kabupaten.'</p>
                     <p>Tanggal Lahir : '.Carbon::parse($data->tanggal_lahir)->format('d F Y').'</p>
                     <p>Jenis Identitas : '.$data->jenis_identitas.'</p>
                     <p>No Identitas : '.$data->no_identitas.'</p>
                     <p>Alamat  : '.$data->alamat_rumah.'</p>
                     <p>Email  : '.$data->email.'</p>
                     <p>No Telepon  : '.$data->no_telepon.'</p>';

        $bodyOne .= '</div>';
        $bodyTwo .= '</div>';
        $html .= $bodyOne;
        $html .= $bodyTwo;
        $html .= '</div>';
        return response()->json($html);
    }

}
