<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Session,View;
use App\model\Tbuser,App\model\Tbproduk;

class Pengguna extends Controller
{
    protected $username;
    public function __construct()
    { 
        $this->middleware(function ($request, $next) {
        $select = Tbuser::where("username_user",Session::get("username"))->first();
        $data["nama"] = $select["nama_user"];
        $data["saldo"] = $select["saldo_user"];
          View::share($data);
        
            return $next($request);
            
            });
        
    }

    public function index(){
        
        $data["produk"] = Tbproduk::where("stok_produk",">",0)->get();
        return view("User/User",$data);
    }

    public function deposit(){
        $data["id_user"] = Session::get("id_user");
        return view("User/Deposit",$data);
    }

    public function addDeposit(Request $request){
        $data = array(
			"id_user" => $request->id_user,
			"pengirim_deposit" => $request->nama_pengirim,
			"jumlah_deposit" => $request->saldo_tambah,
			"tanggal_deposit" => date("Y-m-d")
		);
		$insert = Self::prosesDeposit($data);
		if($insert){
            echo json_encode("success");
        }else{
            echo json_encode("danger");
        }
    }

    private function prosesDeposit($data){
        $check = Self::addSaldo($data["id_user"],$data["jumlah_deposit"]);
		if($check){
			DB::table('tb_deposit')->insert([
                $data
            ]);
			return true;
		}else{
			return false;
		}
    }
    
    private function addSaldo($id_user,$saldoo){
        $saldo = Tbuser::select("saldo_user")->where("id_user",$id_user)->first();
		$add = (int) $saldo["saldo_user"] + (int) $saldoo;
		$q = Tbuser::where("id_user",$id_user)->update([
            "saldo_user"=>$add
        ]);
		if($q){
			return true;
		}else{
			return false;
		}
    }



}
