<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    //关联数据表的模型
    protected $table='useraddress';
    //设置主键
    protected $primaryKey='id';
    //是否开启自动维护时间戳
    public $timestamps = false;
}
