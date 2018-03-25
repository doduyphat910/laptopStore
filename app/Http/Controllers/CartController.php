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
      Cart::add(array('id'=>$id, 'name'=>$product_buy->name, 'qty'=>1, 'price'=>$product_buy->price, 'options'=>array('img'=>$product_buy->image, 'priceDefault'=>$product_buy->price)));
      return redirect('cartContent');
    }
    public function cartContent(){
      $content = Cart::content();
      $total = 0;
      foreach(Cart::content() as $row) {
        $total+= $row->price;
      }
      $count = Cart::count();
      return view('web.content.cart',['content'=>$content, 'total'=>$total, 'count'=>$count]);
    }
    public function cartDelete($id) {
      Cart::remove($id);
      return redirect('cartContent');
    }
    public function updateQtyMinus($id) {
      $a = Cart::get($id);
      $name = $a->name;
      $priceDefault = Laptop::where(['name'=>$name])->pluck('price');
      $priceDefault= $priceDefault['0'];
      $qty = $a->qty;
      $qty--;
      $price = $a->price;
      $price = $priceDefault * $qty;
      $a = Cart::update($id, $qty);
      $a = Cart::update($id, ['price' => $price]);
      echo json_encode($a);
    }
    public function updateQtyPlus($id) {
      $a = Cart::get($id);
      $name = $a->name;
      $priceDefault = Laptop::where(['name'=>$name])->pluck('price');
      $priceDefault= $priceDefault['0'];
      $qty = $a->qty;
      $qty++;
      $price = $a->price;
      $price = $priceDefault * $qty;
      $a = Cart::update($id, $qty);
      $a = Cart::update($id, ['price' => $price]);
      echo json_encode($a);
    }
    public function ajaxTotal() {
      $total = 0;
      foreach(Cart::content() as $row) {
        $total+= $row->price;
      }
      echo $total;
    }
    public function ajaxCount(){
      $count = 0;
      $count = Cart::count();
      echo $count;
    }
}
