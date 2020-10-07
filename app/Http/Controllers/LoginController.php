<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;

class LoginController extends Controller
{
    function create(){
        return view('login.create');
    }
    function save(Request $request){
        $data=$request->except('_token');
        //$data = $request->input();
        $data['password']=md5($data['password']);
        $data['reg_time']=time();
        $res = LoginModel::insert($data);
        if($res){
            return redirect('/login/list');
        }
    }

    function list(){
        $data = LoginModel::get();
        // dd($data);
        return view('login.list',['data'=>$data]);
    }
    function destroy($id)
    {
        $res=LoginModel::destroy($id);
        if ($res) {
            return redirect('/login/list');
        }
    }
    function edit($id){
        $data = LoginModel::find($id);
        return view('login.edit',['data'=>$data]);
    }
    public function update(Request $request, $id)
    {
        $data=$request->except('_token');
        
        $res=LoginModel::where('u_id',$id)->update($data);
        if ($res!==false) {
            return redirect('/login/list');
        }
    }
}
