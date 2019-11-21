<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $table = 'category';
    protected $guarded =[];
}
