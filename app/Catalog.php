<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalog';

    public function laptop(){
    	return $this->hasMany('app\Laptop','catalog_id','id');
    }
}
