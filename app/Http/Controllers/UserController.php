<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function lists()
    {
    	$user = User::all();
    	return view('Admin1.content.user.listuser',['user'=>$user]);
    }
    public function add()
    {
    	return view('Admin1.content.user.add');
    }
    public function postAdd(Request $request) {

    	$this->validate($request,[
    		'name'=>'required|min:3',
    		'email'=>'required|email|unique:users,email',
    		'password'=>'required|min:3|max:32',
    		'passwordAgain'=>'required|same:password'
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên người dùng',
    		'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
    		'email.required'=>'Bạn chưa nhập đúng định dạng email',
    		'email.unique'=>'Email đã tồn tại',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
    		'password.max'=>'Mật khẩu chí được tối đa 32 ký tự',
    		'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
    		'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
    	]);
    	$user=new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level=$request->level;
    	$user->save();
    	return redirect('admin/user/add')->with('notification','Thêm Thành công');
    }
    public function update($id)
    {
       $user=User::find($id);
       return view('Admin1.content.user.update',['updateUser'=>$user]);
    }
    public function postUpdate(Request $request, $id) {

       $this->validate($request,[
    		'name'=>'required|min:3',
    		'email'=>'required|email',
    		'password'=>'required|min:3|max:32',
    		'passwordAgain'=>'required|same:password'
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên người dùng',
    		'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
    		'email.required'=>'Bạn chưa nhập đúng định dạng email',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
    		'password.max'=>'Mật khẩu chí được tối đa 32 ký tự',
    		'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
    		'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
    	]);
    	$user= User::find($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->level=$request->level;
    	$user->save();
    	return redirect('admin/user/update/'.$id)->with('notification','Thêm Thành công');

    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/lists')->with('notification','Xóa thành công');
    }

    public function loginAdmin(){
    	return view('Admin1.getLogin');
    }
   public function postloginAdmin(Request $request)
   {
   	$this->validate($request,[
   		'email'=>'required',
   		'password'=>'required|min:3|max:32'
   	], 
   	[
   		'email.required'=>'Bạn chưa nhập email', 
   		'password.required'=>'Bạn chưa nhập password',
   		'password.min'=>'Password không được nhỏ hơn 3 ký tự',
   		'password.max'=>'Password không được lớn hơn 5 ký tự'
	   ]);

   	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
   		{
   			return redirect('admin/user/lists');
   		}
   		else
   		{
   			return redirect('admin/getLogin')->with('notification','Đăng nhập không thành công');
   		}
   }
   public function logout() {
		Auth::logout();
		return redirect('admin/getLogin');
   }
}
