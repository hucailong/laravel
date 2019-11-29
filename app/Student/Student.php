<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'stu_id';
    public $timestamps = false;
    protected $table = 'student';
    protected $guarded =[];
}
