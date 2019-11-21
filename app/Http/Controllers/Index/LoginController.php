<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Index\User;
class LoginController extends Controller
{
    /**
     * 获取邮箱验证码
     */
    public function send(){
         $email = request()->account;
         $code = rand(100000,999999);
         $res = $this->sendemail($email,$code);
         if($res){
             session(['reg'=>['code'=>$code,'account'=>$email,'add_time'=>time()]]);
             echo json_encode(['font'=>'发送成功','code'=>1]);
         }else{
             echo json_encode(['font'=>'系统错误，请刷新页面再试','code'=>2]);
         }
     }


    public function reg(){
        $user = \request()->all();
        var_dump($user);
//        $session = session('reg');
//        if($user['account']!=$session['account']){
//            echo json_encode(['font'=>'当前用户与注册时不一致','code'=>2]);exit;
//        }
//        if($user['code']!=$session['code']){
//            echo json_encode(['font'=>'验证码错误','code'=>2]);exit;
//        }
//        if($user['pwd']==$user['newpwd']){
//            $user = \request()->except('newpwd');
//        }else{
//            echo json_encode(['font'=>'两次密码输入不一致','code'=>2]);exit;
//        }
//        $data['user_account'] = 111;
//        $data['user_pwd'] = 222;
//
//        $create = User::create($data);


    }

    /**
     * @param $email 收件人
     * @param $code   验证码
     * @return bool    成功or失败
     */
    public function sendemail($email,$code){
        \Mail::send('index.email' , ['code'=>$code] ,function($message)use($email){
            //设置主题
            $message->subject("欢迎注册三级分销App");
            //设置接收方
            $message->to($email);
        });
        return true;
    }

//    public function sendemail($email,$message){
//        \Mail::raw($message,function($message)use($email){
//            //设置主题
//            $message->subject("欢迎注册三级分销App");
//            //设置接收方
//            $message->to($email);
//        });
//    }
}
