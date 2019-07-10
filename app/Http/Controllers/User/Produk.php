<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Session;
use App\model\Tbuser,App\model\Tbproduk,App\model\Tbtrans;

class Produk extends Controller
{
    public function checkout(Request $request){
        $jumlah_beli = $request->jumlah_beli;
        $id_produk = $request->id_produk;
        $total_harga = $request->totalHarga;
        $id_user = Session::get("id_user");
        $data = array(
            "id_user" => $id_user,
            "id_produk" => $id_produk,
            "total_harga" => $total_harga,
            "jumlah_transaksi" => $jumlah_beli,
            "tanggal_transaksi" => date("Y-m-d")
        );
        $insert = Self::prosesData($data);
        if($insert){
            echo json_encode("success");
        }else{
            echo json_encode("danger");
        }
    }

    private function UpdateStok($id_produk,$jumlah){
        $stok = Tbproduk::select("stok_produk")->where("id_produk",$id_produk)->first();
		if($jumlah>$stok["stok_produk"]){
			return false;
		}else{
			$stokbaru = (int)$stok["stok_produk"]-(int)$jumlah;
			Tbproduk::where("id_produk",$id_produk)->update([
                "stok_produk"=>$stokbaru
            ]);
			return true;
		}
    }

    private function UpdateSaldo($id_user,$total_harga){
        $saldo = Tbuser::select("saldo_user")->where("id_user",$id_user)->first();
		if($total_harga>$saldo["saldo_user"]){
			return false;
		}else{
			$saldoBaru = (int)$saldo["saldo_user"] - (int)$total_harga;
			Tbuser::where("id_user",$id_user)->update([
                "saldo_user"=>$saldoBaru
            ]);
			return true;
		}
    }

    private function prosesData($data){
        $cekStok = Self::UpdateStok($data["id_produk"],$data["jumlah_transaksi"]);
		$cekSaldo = Self::UpdateSaldo($data["id_user"],$data["total_harga"]);
		if($cekSaldo && $cekStok){
			Tbtrans::insert([
                $data
            ]);
			return true;
		}else{
			return false;
		}
    }
}
