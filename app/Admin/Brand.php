<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'brand_id';
    public $timestamps = false;
    protected $table = 'brand';
    protected $guarded =[];
}
