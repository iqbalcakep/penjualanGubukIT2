<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Session,View;
use App\model\Tbtrans,App\model\Tbproduk,App\model\Tbuser;


class Admin extends Controller
{
    protected $nama;
    public function __construct() 
    {
        $this->nama = "Muhammad Iqbal";
        View::share('nama', $this->nama);
    }
    public function index(){
       
        $data["riwayat"] = Tbtrans::join("tb_user","tb_user.id_user","=","tb_transaksi.id_user")
                ->join("tb_produk","tb_transaksi.id_produk","=","tb_produk.id_produk")
                ->get();
        
        return view("Admin/Dashboard",$data);
    }

    public function showProduk(){
        $data["produk"] = Tbproduk::all();
        return view("Admin/Produk",$data);
    }

    public function showUser(){
        $data["user"] = Tbuser::all();
        return view("Admin/User",$data);
    }

    public function deleteUser(Request $r){
        Tbuser::where("id_user",$r->id_user)->delete();
        $response = array(
			"status" => "success"
            );
        return json_encode($response);
    }

    public function updateUser(Request $r){
        if($r->password_user==""){ 
			$data = array(
                "nama_user" => $r->nama_user,
                "username_user" => $r->username_user,
            );
		}else{
			$data = array(
                "nama_user" => $r->nama_user,
                "username_user" => $r->username_user,
                "password_user" => MD5($r->password_user),
            );
        }
       
        $insert = Tbuser::where("id_user",$r->id_user)->update($data);
        if($insert){
            $response = array(
                "status" => "success"
                );
        }else{
            $response = array(
                "status" => "danger"
                );
        }
        echo json_encode($response);

    }

    public function saveUser(Request $r){
        $data = array(
			"nama_user" => $r->nama_user,
			"username_user" => $r->username_user,
			"password_user" => MD5($r->password_user),
			"saldo_user" => 10000,
        );
        $cek = Self::checkUsername($r->username_user);
        if($cek){
            $response = array(
                "status" => "danger"
                );
        }else{
            Tbuser::insert($data);
            $response = array(
                "status" => "success"
                );
        }
        return json_encode($response);
    }

    private function checkUsername($username){
        $select = Tbuser::where("username_user",$username)->first();
        if($username!="admin"){
        if($select){
            return true;
        }else{
            return false;
        }
        }else{
            return true;
        }
    }
}
