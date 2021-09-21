<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Requests\CategoryFormRequest;
class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        return view('backend.categories.index',compact('categories'));
    }
    public function show(Request $request){
        return view('backend.categories.create')->with('status', 'Successfully Inserted');
    }
    public function create(Request $request){
        $request->validate([
            'name'=>'required|unique:categories',
        ]);
        category::create([
            'name'=>$request->name,
        ]);
        return redirect('admin/category/add')->with('status', 'Successfully Inserted');
    }
    public function edit($id){

        $category = Category::find($id);
        return view('backend.categories.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = Category::find($id);
        $category->update([
            'name'=> $request->name,
        ]);
        return redirect('admin/category')->with('status','Successfully Updated');
    }
    public function  delete($id){
        $category = category::find($id);
        $category->delete();
        return redirect('admin/category')->with('delete','Successfully Deleted');
    }

}
