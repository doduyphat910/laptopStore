<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class AdminSlideController extends Controller
{
    public function lists(){
    	$slide = slide::all();
    	return view('Admin1.content.slide.slidebar',['listSlide'=>$slide]);
    } 
    public function add()
    {
    	return view('Admin1.content.slide.add');
    }
    public function postAdd(Request $request) {
    	$newSlide=new Slide();
    	$newSlide->name = $request->name;
    	$newSlide->image = $request->img;
    	$newSlide->save();
    	return redirect('admin/slide/add')->with('notification','ThêmTheemanh công');
    }
    public function update($id)
    {
        $slide=slide::find($id);
        return view('Admin1.content.slide.update',['updateSlide'=>$slide]);
    }   
    public function postUpdate(Request $request,$id) {
        
        $newSlide= Slide::find($id);
        $newSlide->name = $request->name;
        $newSlide->image = $request->image;
        $newSlide->save();
        return redirect('admin/slide/update/'.$id)->with('notification','Thành công');
    }
        public function delete($id)
    {
        $slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/lists');
    } 
}
