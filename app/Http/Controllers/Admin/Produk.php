<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Tbproduk; 

class Produk extends Controller
{
    public function deleteProduk(Request $req){
        Tbproduk::where("id_produk",$req->id_produk)->delete();
        $response = array(
			"status" => "success"
            );
        return json_encode($response);
    }

    
    public function saveProduk(Request $r){
        if($file = $r->file("gambar_produk")){
        $tujuan_upload = 'assets/file/';
        $file->move($tujuan_upload,$file->getClientOriginalName());
            $gambar_produk = $file->getClientOriginalName();
        }else{
            $gambar_produk = null;
        }
        $data = array(
			"nama_produk" => $r->nama_produk,
			"harga_produk" => $r->harga_produk,
			"stok_produk" => $r->stok_produk,
			"deskripsi_produk" => $r->deskripsi_produk,
			"gambar_produk" => $gambar_produk,
        );
        Tbproduk::insert([
            $data
        ]);
        $response = array(
            "status" => "success"
            );
        return json_encode($response);
    } 



    public function updateProduk(Request $r){
        if($file = $r->file("gambar_produk")){
            $tujuan_upload = 'assets/file/';
            $file->move($tujuan_upload,$file->getClientOriginalName());
                $gambar_produk = $file->getClientOriginalName();
                $data = array(
                    "nama_produk" => $r->nama_produk,
                    "harga_produk" => $r->harga_produk,
                    "stok_produk" => $r->stok_produk,
                    "deskripsi_produk" => $r->deskripsi_produk,
                    "gambar_produk" => $gambar_produk,
                );
            }else{
                $data = array(
                    "nama_produk" => $r->nama_produk,
                    "harga_produk" => $r->harga_produk,
                    "stok_produk" => $r->stok_produk,
                    "deskripsi_produk" => $r->deskripsi_produk,
                );
            }
            Tbproduk::where("id_produk",$r->id_produk)->update($data);
            $response = array(
                "status" => "success"
                );
            return json_encode($response);
    }


}
