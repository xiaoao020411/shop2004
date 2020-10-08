<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    function create(){
        return view('login.create');
    }
    function save(Request $request){
        $Validator = Validator::make($request->all(),[
            'user_name' => 'required|unique:login',
            'password'  => 'required',
            'email'     => 'required'
        ],[
            'user_name.required'=>'用户名不能为空',
            'password.required' =>'密码不能为空',
            'email.required'    =>'邮箱不能为空'
        ]);
        if($Validator->fails()){
            return redirect('/login/create')
            ->withErrors($Validator)
            ->withInput();
        }
        
        $data=$request->except('_token');
        //$data = $request->input();
        $data['password']=md5($data['password']);
        $data['reg_time']=time();
        $res = LoginModel::insert($data);
        if($res){
            return redirect('/login/index');
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
    function update(Request $request, $id)
    {
        $data=$request->except('_token');
        
        $res=LoginModel::where('u_id',$id)->update($data);
        if ($res!==false) {
            return redirect('/login/list');
        }
    }
    function index(){
        return view('login.index');
    }
    function loginDo(Request $request){
        $data=$request->except('_token');
        $user = DB::table('login')->where('user_name',$data['user_name'])->first();
        //dd($user);
        if(!$user){
            return redirect('/login/index')->with('msg','没有此用户');
        }
        if($user->password!=md5($data['password'])){
            return redirect('/login/index')->with('msg','密码错误');
        }
        session('admin',$user);
        $data['last_login']=time();
        $res = DB::table('login')->where('u_id',$user->u_id)->update($data);
        // dd($res);
            return redirect('/login/list');
        
    }
}
