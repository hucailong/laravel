<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student\User;
use Illuminate\Support\Facades\Cache;
class LoginController extends Controller
{
    public function login(){
        $data = \request()->except('_token');


        $user = User::where('name',$data['name'])->first();

        if($user->pwd == $data['pwd']){
            if($user->user_id){
                return redirect('student');
            }
        }else{

//                var_dump(Cache::increment('error'));
                var_dump(Cache::get('error'));


        }

    }
}
