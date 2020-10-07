<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(){
        //$brand = DB::table('brand')->limit(3)->get();
        //dd($brand);
        //$indexregister = DB::table('indexregister')->find(2);
        //dd($indexregister);
        $goods = DB::table('goods')->where(['goods_name'=>'赫本风渔夫帽111'])->first();
        dd($goods);
    }
}
