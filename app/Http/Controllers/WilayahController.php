<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function getKabupaten(Request $request){
        $provinsi_id = $request->provinsi_id;
        $kabupaten = DB::table('master_kabupaten')->where('provinsi_id', $provinsi_id)->get();

        return response()->json($kabupaten);
    }

    public function getKecamatan(Request $request){
        $kabupaten_id = $request->kabupaten_id;
        $kecamatan = DB::table('master_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();

        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request){
        $kecamatan_id = $request->kecamatan_id;
        $kelurahan = DB::table('master_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();

        return response()->json($kelurahan);
    }
    
}
