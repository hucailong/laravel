<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $table = 'user';
    protected $guarded =[];
}
