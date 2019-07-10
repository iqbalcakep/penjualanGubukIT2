<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session;

use App\model\Tbuser;

class Login extends Controller
{
    //
    public function index(Request $request){
        if (Session::has("level")) {
            if(Session::get("level")=="admin"){
                return redirect('/admin');
            }else{
                return redirect('/user');
            }
        }
        return view('Login');
    }

    public function login_aksi(Request $request){
        $data = Tbuser::where(["username_user"=>$request->username,"password_user"=>MD5($request->password)])->first();
        if($data){
            Session::put(['username'=>$request->username,'level'=>"user","id_user"=>$data["id_user"]]);
            return "success";
        }else if($request->username=="admin" && $request->password=="admin"){
            Session::put(['username'=>$request->username,'level'=>"admin"]);
            return "success";
        }else{
            return "danger";
        }
    }

    public function Logout(){
        Session::flush();
        return redirect('/');
    }

}
