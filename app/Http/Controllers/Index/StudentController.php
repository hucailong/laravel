<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cache;
class StudentController extends Controller
{
        public function index(){
            $page = request()->page??1;
            $data = Cache::get('res_'.$page);
            if (!$data){
                echo 'Db;1111';
                $data = DB::table('student')->paginate(2);
                Cache::put('res_'.$page,$data, 60);

            }
            return view('index.student',['data'=>$data]);
        }
}
