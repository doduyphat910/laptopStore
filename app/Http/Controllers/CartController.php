<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Catalog;
use Cart;

class CartController extends Controller
{
  public function __construct(){
    $catalog = Catalog::all();
    $lastest_product = Laptop::orderBy('id','desc')->take(2)->get();
    view()->share('catalog',$catalog);
    view()->share('lastest_product',$lastest_product);
  }

    public function buyProduct($id) {
      $product_buy = Laptop::find($id);
      Cart::add(array('id'=>$id, 'name'=>$product_buy->name, 'qty'=>1, 'price'=>$product_buy->price, 'options'=>array('img'=>$product_buy->image)));
      return redirect('cartContent');
    }
    public function cartContent(){
      $content = Cart::content();
      $total = Cart::total();      return view('web.content.cart',['content'=>$content, 'total'=>$total]);
    }
    public function cartDelete($id) {
      Cart::remove($id);
      return redirect('cartContent');
    }
    public function updateQty($id) {
      $a = Cart::get($id);
      $qty = $a->qty;
      $qty--;
      Cart::update($id, $qty);
      echo $qty;
    }
}
