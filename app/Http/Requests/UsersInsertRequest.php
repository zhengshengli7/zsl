<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        // 设置规则
        return [
            //用户名不能为空
            'username'=>'required|regex:/\w{4,8}/|unique:userss',
            //密码验主
            'password'=>'required|regex:/\w{6,18}/',
            //重复密码验证规则
            'repassword'=>'required|regex:/\w{6,18}/|same:password',
            //邮箱验证
            'email'=>'required|email|unique:userss',
            //电话验证
            'phone'=>'required|regex:/\d{11}/|unique:userss',
        ];
    }

    //自定义提示消息
    public function messages()
    {
        //用户名不能为空的请求类
        return [
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名必须是4-8的任意的数字字母或者下划线',
            'username.unique'=>'用户名不能重复',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码必须是6-18的任意的数字字母或者下划线',
            'repassword.required'=>'重复密码不能为空',
            'repassword.regex'=>'重复密码必须是6-18的任意的数字字母或者下划线',
            'repassword.same'=>'两次密码不一致',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱不符合规则',
            'email.unique'=>'邮箱不能重复',
            'phone.required'=>'电话不能为空',
            'phone.regex'=>'电话不符合规则',
            'phone.unique'=>'电话不能重复',
        ];
    }
}
