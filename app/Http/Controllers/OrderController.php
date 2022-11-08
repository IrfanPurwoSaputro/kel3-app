<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalur;
use App\Models\Provinces;
use App\Models\Cities;
use 
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalur = Jalur::all();
        $provinces = Provinces::all();
        return view('pengguna.pemesanan.booking_form', compact('jalur', 'provinces'));
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

}
