<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;

class AdminCatalogController extends Controller
{
    public function lists()
    {
    	$catalog = Catalog::all();
    	return view('Admin1.content.catalog.listCatalog',['listCatalog'=>$catalog]);
    }
    public function add()
    {
    	return view('Admin1.content.catalog.add');
    }
    public function postAdd(Request $request) {

        $this->validate($request,
        [ 
            'name'=>'required|min:3|max:100|unique:Catalog,name'
        ],
        [

            'name.required'=>'Bạn chưa nhập tên loại',
            'name.unique'=>'Tên loại đã tồn tại',
            'name.min'=>'Tên loại phải có độ dài từ 3 cho đến 100 ký tự',
            'name.max'=>'Tên loại phải có độ dài từ 3 cho đến 100 ký tự',
        ]);


    	$newCatalog=new Catalog();
    	$newCatalog->name = $request->name;
    	$newCatalog->save();
    	return redirect('admin/catalog/add')->with('notification','Thêm Thành công');
    }
    public function update($id)
    {
        $catalog=Catalog::find($id);
        return view('Admin1.content.catalog.update',['updateCatalog'=>$catalog]);
    }
    public function postUpdate(Request $request, $id) {

        $catalog=Catalog::find($id); 
        $this->validate($request, 
        [
            'name'=>'required|unique:Catalog,name:min:3|max:100'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên loại',
            'name.unique'=>'Tên loại đã tồn tại',
            'name.min'=>'Tên loại phải có độ dài từ 3 cho đến 100 ký tự',
            'name.max'=>'Tên loại phải có độ dài từ 3 cho đến 100 ký tự',
        ]
        );   
       
        $catalog->name = $request->name;
        $catalog->save();
        return redirect('admin/catalog/update/'.$id)->with('notification','Sửa Thành công');
    }
    public function delete($id)
    {
        $catalog=Catalog::find($id)->delete();
        return redirect('admin/catalog/lists');
    }
}
