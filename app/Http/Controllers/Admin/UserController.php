<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.User.user',compact('users'));
    }
    public function edit($id){
        $user = User::find($id);
        return view('backend.User.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
            $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>$request->status,
        ]);
        return redirect('admin/user')->with('status','Successfully Updated');
    }
    public function  delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('delete','Successfully Deleted');
    }
}
