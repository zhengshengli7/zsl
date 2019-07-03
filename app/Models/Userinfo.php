<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //关联数据表
    protected $table='userinfo';
    //设置主键
    protected $primaryKey = 'id';
    // 是否自动开启维护戳
    public $timestamps=false;
    
}
