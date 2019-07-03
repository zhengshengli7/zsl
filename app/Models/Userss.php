<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    //模型关联数据表
    protected $table = "userss";
    //是否自动开启时间戳, 不开启
    public $timestamps = true;
    //规定主键
    protected $primaryKey = "id";
    //给属性批量赋值,属性必须要写,否则是不能插入数据的
    protected $fillable = ['username','password','email','phone','created_at','update_at'];
    // 修改器对数据进行status字段的自动处理
    public function getStatusAttribute($value){
        $status=[0=>"禁用",1=>"开启"];
        return $status[$value];

    }
    //写一个关联方法让userss和userinfo两个数据模型(也就是userss表和usersinfo表)通过字段进行关联,目的获取关联数据
    public function info(){
        return $this->hasOne("App\Models\Userinfo","users_id");
    }
    //一对多的关联模型
     public function address(){
        return $this->hasMany("App\Models\Useraddress","user_id");
    }
}
