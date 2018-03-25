<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Catalog;
use App\slide;

class LaptopController extends Controller
{
	public function __construct(){
		$catalog = Catalog::all();
        $lastest_product = Laptop::orderBy('id','desc')->take(2)->get();
        $slide = slide::orderBy('id','desc')->take(5)->get();
        view()->share('catalog',$catalog);
        view()->share('lastest_product',$lastest_product);
        view()->share('slide',$slide);
	}
    public function listproduct(){
    	$product = Laptop::paginate(6);
    	return view('web.content.product',['product'=>$product]); 
    }
    public function listCatalog($id){
    	$product = Laptop::where('catalog_id',$id)->paginate(6);
    	return view('web.content.listCatalog', ['product'=>$product]);
    }
    public function search(Request $request){
        $key = $request->srchTxt;
        $search = Laptop::where('name', 'like', "%$key%")->orWhere('description', 'like', "%$key%")->take(30)->paginate(6);
        return view('web.content.search', ['search'=>$search, 'key'=>$key]);
    }
    public function detail($id){
        $product_detail = Laptop::find($id);
        $catalog_detail = Laptop::find($id)->Catalog;
        $id_relation = $product_detail->catalog_id ;
        $product_relation = Laptop::where('catalog_id', $id_relation)->take(3)->get();
        return view('web.content.detail', ['product_detail'=>$product_detail, 'catalog_detail'=>$catalog_detail, 'product_relation'=>$product_relation]);
    }
}
