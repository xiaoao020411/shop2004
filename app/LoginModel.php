<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'u_id';
    public $timestamps = false;
    //黑名单
    protected $guarded=[];
}
