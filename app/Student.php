<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'stu_id';
    public $timestamps = false;
    //黑名单
    protected $guarded=[];

}
