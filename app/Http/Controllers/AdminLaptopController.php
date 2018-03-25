<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Catalog;
use App\User;
use Illuminate\Support\Facades\Auth;


class AdminLaptopController extends Controller
{
    public function listLP(){
    	$laptop = laptop::all();
    	return view('Admin1.content.laptop.listlaptop',['listLaptop'=>$laptop]);
    }
        public function add()
    {
    	    	$catalog = Catalog::all();

    	return view('Admin1.content.laptop.add',['listCatalog'=>$catalog]);
    }
    public function postAdd(Request $request) {
    	$newLaptop=new Laptop();
    	$newLaptop->name = $request->name;
    	$newLaptop->price = $request->price;
    	$newLaptop->image = $request->image;
    	$newLaptop->description = $request->description;
    	$newLaptop->amount = $request->amount;
    	$newLaptop->catalog_id= $request->idCatalog;
    	$newLaptop->save();
    	return redirect('admin/laptop/add')->with('notification','Thêm Thành công');
    }
    public function update($id)
    {
        $laptop=Laptop::find($id);
        $catalog = Catalog::all();
        return view('Admin1.content.laptop.update',['updateLaptop'=>$laptop],['listCatalog'=>$catalog]);
    }
    public function postUpdate(Request $request, $id) {

        $newLaptop=Laptop::find($id);
        $newLaptop->name = $request->name;
        $newLaptop->price = $request->price;
        $newLaptop->image = $request->image;
        $newLaptop->description = $request->description;
        $newLaptop->amount = $request->amount;
        $newLaptop->catalog_id= $request->idCatalog;
        $newLaptop->save();
        return redirect('admin/laptop/update/'.$id)->with('notification','Thêm Thành công');
    }
    public function delete($id)
    {
        $laptop=Laptop::find($id)->delete();
        return redirect('admin/laptop/listLP');
    }
}
