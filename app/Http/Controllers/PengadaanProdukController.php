<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengadaanProdukController extends Controller
{
    public function getPengadaanProduk(){
        $data_pengadaan_produk = DB::table('pengadaan_produk as a')
                                        ->leftJoin('produk as b', 'a.produk_id', 'b.id')
                                        ->leftJoin('master_supplier as c', 'a.supplier_id', 'c.id')
                                        ->select(
                                            'a.*',
                                            DB::raw('concat("' .url("/") .'", b.file_path, b.file_name) as url_gambar'),
                                            'b.nama_produk',
                                            'b.upc',
                                            'c.nama_toko'
                                        )
                                        ->orderByDesc('id')
                                        ->get();
                                
        $data = [
            'data_pengadaan_produk' => $data_pengadaan_produk
        ];

        return view('pengadaan_produk.data_pengadaan_produk', $data);
    }

    public function inputPengadaanProduk(){
        $data_supplier = DB::table('master_supplier')->get();
        $data_produk = DB::table('produk')
        ->select(
            '*',
            DB::raw('concat("' .url("/") .'", file_path, file_name) as url_gambar')
        )
        ->get();

        $data = [
            'data_supplier' => $data_supplier,
            'data_produk' => $data_produk
        ];

        return view('pengadaan_produk.input_pengadaan_produk', $data);

    }

    public function saveInputPengadaanProduk(Request $request){
        try{
            $produk_id = $request->produk_id;
            $supplier_id = $request->supplier_id;
            $jumlah_pcs = $request->jumlah_pcs;
            $harga_modal_per_pcs = $request->harga_modal_per_pcs;

            $data_insert = [
                'produk_id' => $produk_id,
                'supplier_id' => $supplier_id,
                'jumlah_pcs' => $jumlah_pcs,
                'harga_modal_per_pcs' => $harga_modal_per_pcs,
                'total_harga' => $jumlah_pcs * $harga_modal_per_pcs
            ];

            DB::table('pengadaan_produk')->insert($data_insert);

            return redirect()->back()->with('success', 'Pengadaan produk berhasil ditambahkan');
        }catch(\Exception $e){
            return response()->json()->with('error', $e->getMessage());
        }
    }

    public function editPengadaanProduk(Request $request){
        $id = $request->id;
        $data_supplier = DB::table('master_supplier')->get();
        $data_produk = DB::table('produk')
        ->select(
            '*',
            DB::raw('concat("' .url("/") .'", file_path, file_name) as url_gambar')
        )
        ->get();

        $pengadaan_produk = DB::table('pengadaan_produk')->where('id', $id)->first();

        $data = [
            'data_supplier' => $data_supplier,
            'data_produk' => $data_produk,
            'pengadaan_produk' => $pengadaan_produk
        ];

        return view('pengadaan_produk.edit_pengadaan_produk', $data);

    }

    public function saveEditPengadaanProduk(Request $request){
        try{
            $id = $request->id;
            $produk_id = $request->produk_id;
            $supplier_id = $request->supplier_id;
            $jumlah_pcs = $request->jumlah_pcs;
            $harga_modal_per_pcs = $request->harga_modal_per_pcs;

            $data_update = [
                'produk_id' => $produk_id,
                'supplier_id' => $supplier_id,
                'jumlah_pcs' => $jumlah_pcs,
                'harga_modal_per_pcs' => $harga_modal_per_pcs,
                'total_harga' => $jumlah_pcs * $harga_modal_per_pcs
            ];

            DB::table('pengadaan_produk')->where('id', $id)->update($data_update);

            return redirect('/pengadaan_produk')->with('success', 'Pengadaan produk berhasil diedit');
        }catch(\Exception $e){
            return response()->json()->with('error', $e->getMessage());
        }
    }

    public function hapusPengadaanProduk(Request $request){
        try{
            $id = $request->id;

            DB::table('pengadaan_produk')->where('id', $id)->delete();

            return response()->json(['message' => 'Pengadaan produk berhasil dihapus'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
