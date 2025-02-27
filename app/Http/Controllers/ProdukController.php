<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as IMG;


class ProdukController extends Controller
{
    public function getProduk(){
        $data_produk = DB::table('produk')
        ->select(
            '*',
            DB::raw('concat("' .url("/") .'", file_path, file_name) as url_gambar')
        )
        ->orderByDesc('id')
        ->get();

        $data = [
            'data_produk' => $data_produk
        ];

        return view('produk.data_produk', $data);
    }

    public function inputProduk(){
        return view('produk.input_produk');
    }

    public function saveInputProduk(Request $request){
        try{
            $date               = Carbon::now('Asia/Jakarta');
            $year               = $date->year;
            $month              = str_pad($date->month, 2, '0', STR_PAD_LEFT);
            $day                = str_pad($date->day, 2, '0', STR_PAD_LEFT);
            $path               = "foto_produk/" . $year . "/" . $month . "/" . $day . "/";
            $path_thumb         = "foto_produk/" . $year . "/" . $month . "/" . $day . "/thumb/";
            $server_storage     = 'public';
            $gambar         = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename_with_ext = $gambar->getClientOriginalName();
            $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);

            $newFileName = $filename . '_' . Str::random(15) . '.' . $extension;

            // GAMBAR ASLI
            $img = IMG::make($gambar)->encode();
            Storage::disk($server_storage)->put($path  . $newFileName, $img, 'public');

            // GAMBAR THUMBNAIL
            $width = 200; // your max width
            $height = 200; // your max height
            $img = IMG::make($gambar);
            $img->height() > $img->width() ? $width = null : $height = null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resource = $img->stream()->detach();

            Storage::disk($server_storage)->put($path_thumb  . $newFileName, $resource, 'public');

            $nama_produk = $request->nama_produk;
            $berat = $request->berat;
            $harga_pcs = $request->harga_pcs;
            $harga_grosir = $request->harga_grosir;
            $upc = $request->upc;

            $data_insert = [
                'nama_produk' => $nama_produk,
                'berat' => $berat,
                'harga_pcs' => $harga_pcs,
                'harga_grosir' => $harga_grosir,
                'upc' => $upc,
                'file_path' => '/storage/' . $path,
                'file_path_thumb' => '/storage/' . $path_thumb,
                'file_name' => $newFileName
            ];

            DB::table('produk')->insert($data_insert);

            return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editProduk(Request $request){
        $id = $request->id;

        $produk = DB::table('produk')
        ->select(
            '*',
            DB::raw('concat("' .url("/") .'", file_path, file_name) as url_gambar')
        )
        ->where('id', $id)
        ->first();

        $data = [
            'produk' => $produk
        ];

        return view('produk.edit_produk', $data);

    }

    public function saveEditProduk(Request $request){
        try{
            $date               = Carbon::now('Asia/Jakarta');
            $year               = $date->year;
            $month              = str_pad($date->month, 2, '0', STR_PAD_LEFT);
            $day                = str_pad($date->day, 2, '0', STR_PAD_LEFT);
            $path               = "foto_produk/" . $year . "/" . $month . "/" . $day . "/";
            $path_thumb         = "foto_produk/" . $year . "/" . $month . "/" . $day . "/thumb/";
            $server_storage     = 'public';

            $id = $request->id;
            $nama_produk = $request->nama_produk;
            $berat = $request->berat;
            $harga_pcs = $request->harga_pcs;
            $harga_grosir = $request->harga_grosir;
            $upc = $request->upc;

            $data_update = [
                'nama_produk' => $nama_produk,
                'berat' => $berat,
                'harga_pcs' => $harga_pcs,
                'harga_grosir' => $harga_grosir,
                'upc' => $upc
            ];

            
            $gambar         = $request->file('gambar');
            if($gambar){
                $extension = $gambar->getClientOriginalExtension();
                $filename_with_ext = $gambar->getClientOriginalName();
                $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);

                $newFileName = $filename . '_' . Str::random(15) . '.' . $extension;

                // GAMBAR ASLI
                $img = IMG::make($gambar)->encode();
                Storage::disk($server_storage)->put($path  . $newFileName, $img, 'public');

                // GAMBAR THUMBNAIL
                $width = 200; // your max width
                $height = 200; // your max height
                $img = IMG::make($gambar);
                $img->height() > $img->width() ? $width = null : $height = null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resource = $img->stream()->detach();

                Storage::disk($server_storage)->put($path_thumb  . $newFileName, $resource, 'public');

                $data_update['file_path'] = '/storage/' . $path;
                $data_update['file_path_thumb'] = '/storage/' . $path_thumb;
                $data_update['file_name'] = $newFileName;
            }

            DB::table('produk')->where('id', $id)->update($data_update);

            return redirect('/produk')->with('success', 'Produk berhasil diedit');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function hapusProduk(Request $request){
        try{
            $id = $request->id;

            DB::table('produk')->where('id', $id)->delete();

            return response()->json(['message' => 'Produk berhasil dihapus'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}