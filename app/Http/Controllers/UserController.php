<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    function create(){
        return view('user.create');
    }
    function save(Request $request){
        $data = $request->except('_token');
        if($data['pwd']!=$data['pwd1']){
            return redirect('/user/create')->with('msg','两次密码不一致');
        }
        $data['pwd']=password_hash($data['pwd'],PASSWORD_DEFAULT);
        unset($data['pwd1']);
        $res = UserModel::insert($data);
        return redirect('/user/index');
    }
    function list(){
        $res = UserModel::get();
        return view('user.list',['res'=>$res]);
    }
    function index(){
        return view('user.index');
    }
    function logindo(Request $request){
        $data = $request->except('_token');
        $add = $_SERVER['REMOTE_ADDR'];
        $reg = '/^1[3|4|7|8|9]\d{9}$/';
        $reg_email = '/^\w{3,}@[a-z]{2,7}|[0-9]{3}\.(com|cn)$/';
        if(preg_match($reg,$data['name'])){
            $where=[
                ['tel','=',$data['name']]
            ];
        }else if(preg_match($reg_email,$data['name'])){
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
        $count=Redis::get($user->id);
        //$login_time = ceil(Redis::TTL("login_time:".$user->id) / 60);
        $out_time=(ceil((Redis::TTL($user->id)/60)));
        //  dd($out_time);
            //判断错误次数
            if($count>=5){
                    return redirect('/user/index')->with('msg','密码错误次数过多,请'.$out_time.'分钟后在来');
            }
        if(!$user){
            return redirect('/user/login')->with('msg','用户不存在');
        }
        if(!password_verify($data['pwd'],$user['pwd'])){
             //用redis自增记录错误次数
             Redis::incr($user->id);
             $count=Redis::get($user->id);
             //判断错误次数
             if($count>=5){
                 Redis::SETEX($user->id,60*60,5);
                     return redirect('/user/index')->with('msg','密码错误次数过多,请一个小时候在来');
             }
            return redirect('/user/index')->with('msg','密码不正确');
        }
        $ass = ['login_ip'=>$add];
        $res = UserModel::where('id',$user['id'])->update($ass);
        session(['login'=>$user]);
        return redirect('/user/list');
    }
    function loginout(){
        session(['login'=>null]);
        return redirect('/user/index');
    }
}
