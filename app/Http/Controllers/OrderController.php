<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalur;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Pemesanan;
use App\Models\Anggota;
use Illuminate\Http\Response;
use PDF;
use DB;
use Carbon\Carbon;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.pemesanan.index');
    }
    
    public function store_provinces(Request $request){
        $prov = Provinces::select('code')->where('id',$request->idprovinsi)->first();
        $code = $prov->code;
        $data['cities'] = Cities::where('province_code','=',$code)->get();    
        // foreach ($cities as $arrayForEach) {
            //    echo "<option value='$cities->id'>$cities->name</option>";               
            // }
            // return Response::json($options);
        return response()->json($data);
    }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jalur = Jalur::all();
        $provinces = Provinces::all();
        return view('pengguna.pemesanan.booking_form', compact('jalur', 'provinces'));
    }

    public function payment()
    {
        $data_pemesanan = Pemesanan::orderBy('id_pemesanan', 'desc')->limit(1)->get();
        return view('pengguna.pemesanan.pembayaran', compact('data_pemesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jalur_pendakian' => 'required',
            'tanggal_naik' => 'required',
            'tanggal_turun' => 'required',
            'nama' => 'required|alpha',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_identitas' => 'required',
            'no_identitas' => 'required|numeric|min:12',
            'alamat_rumah' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'surat_sehat'     => 'required|mimes:pdf,svg|max:2048',
            'pembayaran' => 'required',
            // 'modal_nama' => 'alpha',
            // 'modal_jenis_kelamin' => 'required',
            // 'modal_tanggal_lahir' => 'required',
            // 'modal_jenis_identitas' => 'required',
            // 'modal_no_identitas' => 'required|numeric|min:12',
            // 'modal_alamat_rumah' => 'required',
            // 'modal_provinsi' => 'required',
            // 'modal_kabupaten' => 'required',
            // 'modal_no_telepon' => 'required|numeric|digits_between:10,13',
            // 'total_harga' => 'required',
        ]);

        $date2=date("d-m-Y");

        $date1=new DateTime($request->tanggal_lahir);
        $date2=new DateTime($date2);

        $interval = $date1->diff($date2);

        $myage= $interval->y;

        $html = '';
        $alert = '';

        if ($myage < 12){

            // $jalur = Jalur::all();
            // $provinces = Provinces::all();
            // $alert.="<script>";
            // $alert.="alert('Usia kurang dari 12 tahun')";
            // $alert.="</script>";
            // $html.=$alert;
            return back()->withInput()->with('status', 'Usia minimal 12 tahun');
        }else {
            $current = Pemesanan::orderBy('id_pemesanan', 'desc')->first();
            
            if ($current == null) {
                $angka = 0;
                $angka += 1;
            }else {
                $angka = $current->id_pemesanan;
                $angka += 1;
            }
            $mydate=getdate(date("U"));
            $bulan=$mydate['mon'];
            $tahun=$mydate['year'];
            $code = 'LAWU'.$bulan.$tahun.$angka;
    
            $pemesanan = new Pemesanan();
            $pemesanan->jalur_id = $request->jalur_pendakian;
            $pemesanan->kode = $code;
            $pemesanan->tanggal_naik = $request->tanggal_naik;  
            $pemesanan->tanggal_turun = $request->tanggal_turun;
            $pemesanan->status = 'belum dibayar';
            $pemesanan->total_harga = $request->total_harga;
            $pemesanan->pembayaran = $request->pembayaran;
            $pemesanan->save();
    
            $get_id = Pemesanan::orderBy('id_pemesanan', 'desc')->first();
            $pemesanan_id = $get_id->id_pemesanan;
    
            $surat_sehat = $request->file('surat_sehat');
            $name = $request->file('surat_sehat')->getClientOriginalName();
            if($surat_sehat){
                $surat_sehat->move(public_path('document'),$name);
            }
    
            
            $anggota = new Anggota();
            $anggota->pemesanan_id = $pemesanan_id;
            $anggota->nama = $request->nama;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->tanggal_lahir = $request->tanggal_lahir;
            $anggota->jenis_identitas = $request->jenis_identitas;
            $anggota->no_identitas = $request->no_identitas;
            $anggota->alamat_rumah = $request->alamat_rumah;
            $anggota->provinsi_id = $request->provinsi;
            $anggota->kabupaten_id = $request->kabupaten;
            $anggota->no_telepon = $request->no_telepon;
            $anggota->email = $request->email;
            $anggota->surat_sehat = $name;
            $anggota->save();
            
            if($request->userEntry != null){
                foreach( $request->userEntry as $seq => $detail){
                    $row = (object) $detail;
    
                    $anggota = new Anggota();
                    $anggota->pemesanan_id = $pemesanan_id;
                    $anggota->nama = $row->modal_nama;
                    $anggota->jenis_kelamin = $row->modal_jenis_kelamin;
                    $anggota->tanggal_lahir = $row->modal_tanggal_lahir;
                    $anggota->jenis_identitas = $row->modal_jenis_identitas;
                    $anggota->no_identitas = $row->modal_no_identitas;
                    $anggota->alamat_rumah = $row->modal_alamat_rumah;
                    $anggota->provinsi_id = $row->modal_provinsi;
                    $anggota->kabupaten_id = $row->modal_kabupaten;
                    $anggota->no_telepon = $row->modal_no_telepon;
                    $anggota->save();
                }
            }
    
            // return $request->input();
    
            return redirect('/payment'); 
        }

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


    public function find_code(Request $request){
		$cari = $request->cari;
 
        $hasil = Pemesanan::where('kode','=', $cari)->get();

        if (!empty($hasil)) {
            // dd($hasil);
            return view('pengguna.pemesanan.find_code', compact('hasil'));
        } else {
            return redirect()->back()->with('alert', 'Kode Booking tidak ditemukan!');
        }

    }

    public function get_pdf($id){
        $data = DB::table('pemesanan as pms')
                ->join('anggota as aga','aga.pemesanan_id','=','pms.id_pemesanan')
                ->join('jalur as jur','jur.id_jalur','=','pms.jalur_id')
                ->join('indonesia_provinces as ip','ip.id','=','aga.provinsi_id')
                ->join('indonesia_cities as ics','ics.id','=','aga.kabupaten_id')
                ->select('pms.*','aga.*','jur.nama as nama_jalur', 'ip.name as nama_provinsi','ics.name as nama_kabupaten')
                ->where('pms.id_pemesanan','=',$id);

        $anggota = $data->get();
        $ketua = $data->where('aga.email','!=',NULL)->get();
        // dd($anggota);
        
        $pdf = PDF::loadview('pengguna.pemesanan.cetak_pdf',['anggota'=>$anggota, 'ketua'=>$ketua]);
        
        foreach ($ketua as $key=> $value ){
            $row = (object) $value;
            $kode = $row->kode;

        }    
        return $pdf->download('Bukti Booking Online-'.$kode);
    }
}
