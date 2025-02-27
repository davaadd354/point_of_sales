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
        dd('hello world');
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

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}