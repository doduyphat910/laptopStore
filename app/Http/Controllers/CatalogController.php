<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
class CatalogController extends Controller
{
	public function __construct(){
		$catalog = Catalog::all();
    	view()->share('catalog',$catalog);
	}
    public function danhsach(){
    	return view('web.content.product');
    }

}
