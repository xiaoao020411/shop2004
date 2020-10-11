<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;

class AdminController extends Controller
{
    function login(){
        return view('admin.login');
    }
    function loginDo(Request $request){
        $data = $request->except('_token');
        if($data['name']){
            $where=[
                ['tel','=',$data['name']]
            ];
        }else if($data['name']){
            $where=[
                ['email','=',$data['name']]
            ];
        }else{
            $where=[
                ['name','=',$data['name']]
            ];
        }
        $user = UserModel::where($where)->first();
        //dd($user);
        if(!$user){
            return redirect('/user/index')->with('msg','用户不存在');
        }
        if(!password_verify($data['pwd'],$user['pwd'])){
            return redirect('/user/index')->with('msg','密码不正确');
        }
    }
}
