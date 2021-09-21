<?php

namespace App\Http\Controllers;

use App\LikesDislike;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        $posts = Post::all();
        $user = Auth::user()->all();
        return redirect('home',compact('posts','user','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $user =  Auth::user();
        return  view('post.create',compact('categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $file = $request->img;
        $filename = uniqid() .'_' . $file->getClientOriginalName();
        $file->storeAs('public/post-images/',$filename );
         Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'img'=>$filename,
            'user_id'=>$request->user_id,
        ]);
        return redirect('post/create')->with('status','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id){
        $article = Post::find($id);
        $comments = $article->comments;
        $user = Auth::user();
        $like = LikesDislike::where('post_id',$id)->where('type','Like')->get();
        $dislike = LikesDislike::where('post_id',$id)->where('type','Dislike')->get();
        return view('post.detail',compact('article','comments','user','dislike','like'));
    }
    public function search(Request $request){
        $categories = category::all();
        $search = $request->search;
        $posts = Post::where('title','like','%'.$search . '%')->paginate(3);
        return view('home',compact('posts','categories'));
    }
    public function searchByCat($cat_id){
        $categories = Category::all();
        $posts =Post::where('category_id',$cat_id)->paginate(3);
        return view('/home',compact('posts','categories'));

    }
    public function detailByMain(){
        return view('post/detailByMain');
    }


}
