<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SupplyerController extends Controller
{
    public function getSupplier(Request $request){
        $data_supplier = DB::table('master_supplier as a')
        ->leftJoin('master_provinsi as b', 'a.provinsi_id', 'b.id')
        ->leftJoin('master_kabupaten as c', 'a.kabupaten_id', 'c.id')
        ->leftJoin('master_kecamatan as d', 'a.kecamatan_id', 'd.id')
        ->leftJoin('master_kelurahan as e', 'a.kelurahan_id', 'e.id')
        ->select(
            'a.*',
            'b.deskripsi as provinsi',
            'c.deskripsi as kabupaten',
            'd.deskripsi as kecamatan',
            'e.deskripsi as kelurahan'
        )
        ->orderByDesc('id')
        ->get();

        $data = [
            'data_supplier' => $data_supplier
        ];

        return view('supplier.data_supplier', $data);
    }

    public function inputSupplier(){
        $provinsi = DB::table('master_provinsi')->where('negara_id', 100)->get(); 

        $data = [
            'data_provinsi' => $provinsi
        ];

        return view('supplier.input_supplier', $data);
    }

    public function saveInputSupplier(Request $request){
        try{
            $nama = $request->nama;
            $handphone = $request->handphone;
            $nama_toko = $request->nama_toko;
            $provinsi_id = $request->provinsi_id;
            $kabupaten_id = $request->kabupaten_id;
            $kecamatan_id = $request->kecamatan_id;
            $kelurahan_id = $request->kelurahan_id;
            $kode_pos = $request->kode_pos;
            $alamat = $request->alamat;

            DB::table('master_supplier')->insert([
                'nama' => $nama,
                'handphone' => $handphone,
                'nama_toko' => $nama_toko,
                'provinsi_id' => $provinsi_id,
                'kabupaten_id' => $kabupaten_id,
                'kecamatan_id' => $kecamatan_id,
                'kelurahan_id' => $kelurahan_id,
                'kode_pos' => $kode_pos,
                'alamat' => $alamat
            ]);

            return redirect('/supplier')->with('success', 'Data Supplier berhasil disimpan');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editSupplier(Request $request){
        $id = $request->id;

        $supplier = DB::table('master_supplier')->where('id', $id)->first();

        $provinsi = DB::table('master_provinsi')->where('negara_id', 100)->get();
        $kabupaten = DB::table('master_kabupaten')->where('provinsi_id', $supplier->provinsi_id)->get();
        $kecamatan = DB::table('master_kecamatan')->where('kabupaten_id', $supplier->kabupaten_id)->get();
        $kelurahan = DB::table('master_kelurahan')->where('kecamatan_id', $supplier->kecamatan_id)->get();

        $data = [
            'supplier' => $supplier,
            'data_provinsi' => $provinsi,
            'data_kabupaten' => $kabupaten,
            'data_kecamatan' => $kecamatan,
            'data_kelurahan' => $kelurahan
        ];

        return view('supplier.edit_supplier', $data);

    }

    public function saveEditSupplier(Request $request){
        try{
            $id = $request->id;
            $nama = $request->nama;
            $handphone = $request->handphone;
            $nama_toko = $request->nama_toko;
            $provinsi_id = $request->provinsi_id;
            $kabupaten_id = $request->kabupaten_id;
            $kecamatan_id = $request->kecamatan_id;
            $kelurahan_id = $request->kelurahan_id;
            $kode_pos = $request->kode_pos;
            $alamat = $request->alamat;

            DB::table('master_supplier')
            ->where('id', $id)
            ->update([
                'nama' => $nama,
                'handphone' => $handphone,
                'nama_toko' => $nama_toko,
                'provinsi_id' => $provinsi_id,
                'kabupaten_id' => $kabupaten_id,
                'kecamatan_id' => $kecamatan_id,
                'kelurahan_id' => $kelurahan_id,
                'kode_pos' => $kode_pos,
                'alamat' => $alamat
            ]);

            return redirect('/supplier')->with('success', 'Data Supplier berhasil diupdate');

        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function hapusSupplier(Request $request){
        try{
            $id = $request->id;

            DB::table('master_supplier')->where('id', $id)->delete();

            return response()->json(['message' => 'Supplier berhasil dihapus'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
