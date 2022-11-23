<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role == 'petugas')
        {
            return redirect('booking_list');
        }
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $bookingToday = DB::table('pemesanan')->where('tanggal_naik',$today)->count();
        $bookingAll = DB::table('pemesanan')->count();
        $anggota = DB::table('anggota')->count();
        $pengaduan = DB::table('pengaduan')->count();
        return view('admin.index',compact('bookingToday','bookingAll','anggota','pengaduan'));
    }

    public function getCuacaCelciusBmkg()
    {
        $today = Carbon::now('Asia/Jakarta')->format('YmdHi');
        $patokan = Carbon::now('Asia/Jakarta')->format('Ymd');
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
        $fixTimeOn = $today;
        $arrTimeRangeBmkg = [];
        $arrTimeRangeBmkg[0] = $patokan.'0000';
        $arrTimeRangeBmkg[1] = $patokan.'1200';
        $arrTimeRangeBmkg[2] = $patokan.'1800';
        $arrTimeRangeBmkg[3] = $patokan.'0600';
        foreach ($arrTimeRangeBmkg as $key => $value) {
           if(intval($today)<=$value)
           {
               $fixTimeOn = $value;
           }
        }
        $kondisiNya = $this->nightOrMoon();
        $ngawiTime = array_search($fixTimeOn, array_column($day, '@datetime'));
        $resultNgawiTime = $day[$ngawiTime];
        $suhuText =$kondisiNya.$resultNgawiTime['value'][0]['#text'].'<sup >'.$resultNgawiTime['value'][0]['@unit'].'</sup>'; //c
        $lihat = '<a href="https://cuaca.umkt.ac.id/api/cuaca/DigitalForecast-JawaTimur.xml" target="_blank">Lihat Sumber &nbsp;<i class="fa fa-link"></i></a>';
        return response()->json(['suhu'=>$suhuText,'today'=>$fixTimeOn,'sumber'=>'Sumber : '.$dt.'','pusat'=>'Pusat : '.$pd.'','lihat'=>$lihat,'jam'=>$jam]);
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

    //===================Booking Menu ==========//
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
                $get->where('aga.email','!=',NULL);
                $get->select('pms.*','aga.nama as nama_anggota','jur.nama as nama_jalur');
                $get->groupBy('pms.kode');
                $get->orderBy('pms.created_at','DESC');
                $data = $get->paginate(5);
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
                $get->where('pms.kode',$id);
                $get->select('pms.*'
                            ,'aga.nama as nama_anggota','aga.kebangsaan','aga.jenis_kelamin'
                            ,'aga.tanggal_lahir','aga.jenis_identitas','aga.no_identitas','aga.alamat_rumah'
                            ,'aga.no_telepon','aga.email'
                            ,'ip.name as nama_provinsi','ics.name as nama_kabupaten'
                            ,'jur.nama as nama_jalur','jur.deskripsi'
                            );
                $get->orderBy('pms.created_at','DESC');
                $data = $get->first();
                $html = '';
                $bodyOne = '';
                $bodyTwo = '';
        if ($data) {
            
            if($data->status == 'belum dibayar'){
                $status = '<a class="badge badge-danger btn-sm">'.str_replace('_',' ',ucwords($data->status)).'</a>';
            }else{
                $status = '<a class="badge badge-success btn-sm">'.str_replace('_',' ',ucwords($data->status)).'</a>';
            }

            $listAnggota = DB::table('anggota as aga')
                            ->join('indonesia_provinces as ip','ip.id','=','aga.provinsi_id')
                            ->join('indonesia_cities as ics','ics.id','=','aga.kabupaten_id')
                            ->select('aga.nama as nama_anggota','aga.kebangsaan','aga.jenis_kelamin'
                            ,'aga.tanggal_lahir','aga.jenis_identitas','aga.no_identitas','aga.alamat_rumah'
                            ,'aga.no_telepon','aga.email'
                            ,'ip.name as nama_provinsi','ics.name as nama_kabupaten')
                            ->where('aga.pemesanan_id',$data->id_pemesanan)
                            ->get();
           // $statusAnggota = 'Anggota';
            $nol=0;
            foreach ($listAnggota as $key => $aga) {
                $nol++;
                if($aga->email != NULL)
                {
                    $statusAnggota = 'Ketua';
                }else{
                    $statusAnggota = 'Anggota';
                }
                $bodyTwo .= '<div class="col-md-12">';
                $bodyTwo .= '<p align="center"><b>Detail Pendaki '.$nol.'</b></p>
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tr>
                                    <td style="padding-left: 2%">Nama Pendaki</td>
                                     <td>:'.$aga->nama_anggota.' ( <b>'.$statusAnggota.' </b>)</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Kebangsaan</td>
                                     <td>:'.$aga->kebangsaan.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Asal</td>
                                    <td>:'.$aga->nama_provinsi.' '.$aga->nama_kabupaten.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Tanggal Lahir</td>
                                     <td>:'.Carbon::parse($aga->tanggal_lahir)->format('d F Y').'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Jenis Identitas</td>
                                    <td>:'.$aga->jenis_identitas.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">No Identitas</td>
                                     <td>:'.$aga->no_identitas.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Alamat</td>
                                    <td>:'.$aga->alamat_rumah.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Email</td>
                                   <td>:'.$aga->email.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">No Telepon</td>
                                    <td>:'.$aga->no_telepon.'</td>
                                </tr>
                            </table>';
                $bodyTwo .= '</div>';
            }
            
            //appending html
            $html .= '<div class="row">';
            $bodyOne .= '<div class="col-md-12">';
            $bodyOne .= '<p align="center"><b>Detail Pemesanan</b></p>
                         <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tr>
                                    <td style="padding-left: 2%">Jalur Pendakian </td>
                                     <td>:'.$data->nama_jalur.' <br> '.$data->deskripsi.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Tanggal Naik</td>
                                     <td>:'.Carbon::parse($data->tanggal_naik)->format('d F Y').'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Tanggal Turun</td>
                                    <td>:'.Carbon::parse($data->tanggal_turun)->format('d F Y').'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Tanggal Booking</td>
                                     <td>:'.Carbon::parse($data->created_at)->format('d F Y').'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Grand Total</td>
                                    <td>:'.number_format($data->total_harga, 0, ",", ".").'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Metode Pembayaran</td>
                                    <td>:'.$data->pembayaran.'</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 2%">Status Booking</td>
                                     <td>:'.$status.'</td>
                                </tr>
                            </table>';
            $bodyOne .= '</div>';
            $html .= $bodyOne;
            $html .= $bodyTwo;
            $html .= '</div>';
        }
       
       
        return response()->json(['html'=>$html,'data'=>$data]);
    }
    //===================End Booking Menu ==========//
    //===================Pengaduan Menu ==========//
    public function pengaduanIndex(Request $request)
    {
        $get = DB::table('pengaduan');
            if($request->filter != null)
            {
                //dd($request->all());
                $get->where('nama', 'like', '%' . $request->filter .'%');
                $get->orWhere('kode', 'like', '%' . $request->filter .'%');
            }     
        $data = $get->paginate(10); // select * from pengaduan;
        return view('admin.pengaduan',compact('data','request'));
    }
    //===================End Pengaduan Menu ==========//
    //=================== Informasi Menu ==========//
    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            $extension = explode('.',$name);
            $extension = strtolower(end($extension));
            $key = rand().'_'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "images/informasi/";
            $file->move($tmp_file_path,$tmp_file_name);
            $result = $tmp_file_name;
        return url('images/informasi').'/'.$result;
    }

    public function informasiList(Request $request)
    {
        $get = DB::table('informasi');
        if($request->filter != null)
        {
            $get->where('judul', 'like', '%' . $request->filter .'%');
        }
        $get->orderBy('created_at','DESC');
        $data = $get->paginate(10);
        return view('admin.informasi',compact('data','request'));
    }

    public function createInformasi()
    {
        return view('admin.informasi_create');
    }

    public function editInformasi($id)
    {
        $data =  DB::table('informasi')->where('id_informasi',$id)->first();
        return view('admin.informasi_edit',compact('data'));
    }

    public function storeInformasi(Request $request)
    {
        //dd($request->all());
        $format = ['jpg','png'];
        $ext = $request->file('gambar')->getClientOriginalExtension();
        if(!in_array($ext,$format)){
            return redirect()->back()->with('danger','Gagal menambahkan informasi format gambar diluar jpg atau png!');
        }
        DB::table('informasi')->insert([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$this->uploadFile($request,'gambar'),
            'created_at'=>Carbon::now('asia/Jakarta')->toDateTimeString()
        ]);
        return redirect('informasi_list')->with('success','Berhasil menambahkan informasi!');
    }

    public function updateInformasi(Request $request,$id)
    {
        $gambar = $request->old_gambar;
        if($request->file('gambar')!=null)
        {
            $format = ['jpg','png'];
            $ext = $request->file('gambar')->getClientOriginalExtension();
            if(!in_array($ext,$format)){
                return redirect()->back()->with('danger','Gagal menambahkan informasi format gambar diluar jpg atau png!');
            }
            $gambar = $this->uploadFile($request,'gambar');
        }
        DB::table('informasi')->where('id_informasi',$id)->update([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$gambar,
            'updated_at'=>Carbon::now('asia/Jakarta')->toDateTimeString()
        ]);
        return redirect('informasi_list')->with('success','Berhasil mengubah informasi!');
    }

    public function deleteInformasi($id)
    {
        DB::table('informasi')->where('id_informasi',$id)->delete();
        return redirect('informasi_list')->with('success','Berhasil menghapus informasi!');
    }
}
