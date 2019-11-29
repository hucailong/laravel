<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $primaryKey = 'class_id';
    public $timestamps = false;
    protected $table = 'class';
    protected $guarded =[];
}
