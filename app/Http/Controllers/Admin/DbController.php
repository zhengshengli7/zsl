<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据库里的内容,并返回数据类型
        $data = DB::select("select * from li");
        // echo "<pre>";
        // var_dump($data);
        return view("/Admin.Db.index",['data'=>$data]);
        //数据库的基本练习
        // 查询操作
        $data = DB::select("select * from li");
       // 插入数据
       $res = DB::insert ("insert into(name,sex,age,city) value('shengli','男','17','山东')");
       //删除数据
       $res = DB::delete("delete from li where id=3");
       // 修改数据
       $res = DB::update("update li set name='shengli' where id=2");
       // 一般语句创建表和删除表
       // 删除表
       DB::statement("drop table li");
       // 创建表
       DB::statement("drop table li");

       //连续操作
      // 插入一条数据
      DB::table("li")->insert(['name'=>'a','sex'=>'0','age'=>26,'city'=>'山东']);
      // 插入多条数据
      DB::talbe("li")->insert([['name'=->'c','sex'=>'男','age'=>16,'city'=>'济宁'],['name'=>'小亲','sex'=>'女','age'=>23,'city'=>'北京']]);
      // 获取数据的ID
      $id = DB::table("li")->insertGetId(['name'=>'a','sex'=>'0','age'=>26,'city'=>'山东']);
      //修改数据
      DB::talbe("li")->where("id","=",8)->update('name'=>'a');
      // 删除数据
       DB::talbe("li")->where("id","=",8)->delete();
       //获取所有数据
       $data = DB::table("li")-get();
       // 获取单条数据
       $data1=DB::table("stu")->where("id","=",1)->first();
        //获取单条数据的某个字段值
       $a=DB::table("stu")->where("id","=",2)->value("name");
       // 获取某一列数据
       $a = DB::table("li")->pluck("name");
       // 获取指定字段值
       $data1 = DB::table("li")->select("name","age")->get();
       //数据表字段的查询
       $c = DB::table("li")->where("name","like","%x%")->get();

       // 数据的排序
       $f = DB::table("li")->orderby("id","desc")->get?();
       // 分页操作,每页显示10条数据
       $page = DB::table("li")->paginate(2);
       return view("Admin.Db.index",['page'=>$page]);

       // 两表关联查询city和citys
       // select * from city ,citys where city.id=citys.city_id;
       $h  = DB::table("li")->join("city","city.id","=","citys.city_id")->get();
       //三表查询
       $hh=DB::table("li")->join("city","city.id","=","citys.city_id")->join("address","city.id","=","address.citys_id")->get();
       // 计算总数
       $c = DB::table("li")->count();
       // 获取最大值 
       $max = DB::talbe("li")->max("age");
       //平均值 
       $vag = DB::table("li")->avg("age");
       dd($vag);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
