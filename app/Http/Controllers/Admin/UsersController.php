<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入Hash加密类
use Hash;
//导入校验请求类
use App\Http\Requests\UsersInsertRequest;
use App\Models\Userss;
// 导入自定义的类
use A;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的参数
        $k=$request->input("keyword");
        $kk=$request->input("keywords");

        // echo $k;
        $data=Userss::get();
        //获取列表数据
        $data=Userss::where("username","like","%".$k."%")->where("email","like","%".$kk."%")->paginate(2);
        // select * from users where username like "%a%" limit 2,2;
        // echo "666";
        //加载模板
        return view("Admin.Users.index",['data'=>$data,'request'=>$request->all()]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.Users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->except(['repassword','_token']);
        //加密密码
        $data['password']=Hash::make($data['password']);
        $data['status']=0;
        // $data['token']=str_random(50);
        // dd($data);
        //执行数据库插入操作,换作模型的定法用create方法去添加
        if(Userss::create($data)){
            //设置session  success sesion名字
            return redirect("/adminusers")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        $info = Userss::find($id)->info;
        // dd($info);
        return view("Admin.Users.info",['info'=>$info]);
    }

    //获取会员的收货地址
    public function address($id){
        $address = Userss::find($id)->address;
        // dd($address);
        // 引入模板,分配数据
        return view("Admin.Users.address",['address'=>$address]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        //获取需要修改的数据
        $data=Userss::find($id);
        // dd($data);
        //加载模板
        return view("Admin.Users.edit",['data'=>$data]);
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
        // echo "修改";
        //获取修改的数据
        // dd($request->all());
        $data=$request->except(['_token','_method']);
        //执行修改
        if(Userss::where("id","=",$id)->update($data)){
            return redirect("/adminusers")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        //直接删除
        if(Userss::where("id","=",$id)->delete()){
            return redirect("/adminusers")->with("success","删除成功");
        }else{
            return redirect("/adminusers")->with("error","删除失败");
        }
    }

    //调用自定义的方法
    public function a(){
        pay();
    }
    // 自定类的调用
    public function b(){
        //实例化类
        $a = new A();
        $a->sends();
    }
}
