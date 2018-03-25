<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'laptop';
    public function catalog(){
    	return $this->belongsTo('app\Catalog','catalog_id','id');
    }
}
