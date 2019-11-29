<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student\Classes;
use App\Student\Student;

class StudentController extends Controller
{
    public function student(){
        $data = Classes::all();
        return view('student\student',['data'=>$data]);
    }

    public function student_do(){
        $post = \request()->except('_token');
        $res = Student::create($post);
        if($res->stu_id){
            return redirect('student\index');
        }

    }
    public function index(){
        $data = Student::leftjoin('class','student.class_id','=','class.class_id')->get();
        return view('student\index',['data'=>$data]);
    }

    public function update($id){
        $res  = Student::where('stu_id',$id)->first();
        $data = Classes::all();
        return view('student/update',['data'=>$data,'res'=>$res]);
    }
    public function update_do($id){
        $data = \request()->except('_token');
        $res = Student::where('stu_id', $id)
            ->update($data);
        if($res){
            return redirect('/student/index');
        }
    }
}
