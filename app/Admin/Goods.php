<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    protected $table = 'goods';
    protected $guarded =[];
}
