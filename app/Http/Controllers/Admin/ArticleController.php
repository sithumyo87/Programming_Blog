<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Post::paginate(5);
        return view('backend.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = category::all();
        $users = User::all();
        $post = Post::find($id);
        return view('backend.article.edit',compact('categories','users','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'cat_id'=>'required',
            'title'=>'required',
            'img' => 'nullable|image|mimes:png,jpg,jpeg',
            'description' =>'required',
        ]);
        $post = Post::find($id);

        if($request->hasFile('img')){
            $postImg = $post->img;
            File::delete('storage/post-images/' . $postImg);
            $image = $request->img;
            $filename = uniqid() .'_' . $image->getClientOriginalName();;
            $image->storeAs( 'public/post-images/' ,$filename);
            $aa =  $post->update([
                'category_id'=>$request->cat_id,
                'title'=>$request->title,
                'img' => $filename,
                'description' =>$request->description,
            ]);
        }
        $post->update([
            'category_id'=>$request->cat_id,
            'title'=>$request->title,
            'description' =>$request->description,
        ]);
        return redirect('admin/article')->with('status','successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect('admin/article')->with('delete','successfully Deleted');
    }
}
