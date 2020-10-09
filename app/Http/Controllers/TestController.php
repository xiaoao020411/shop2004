<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test(){
        //$brand = DB::table('brand')->limit(3)->get();
        //dd($brand);
        //$indexregister = DB::table('indexregister')->find(2);
        //dd($indexregister);
        
    }
    function redis(){
        $num = Redis::incr('count');
        echo $num;
    }
} 