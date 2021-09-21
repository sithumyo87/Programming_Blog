<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $categories = category::all();
        $posts = DB::table('posts')->orderBy('created_at', 'DESC')->paginate(3);

        return view('home',compact('posts','categories'));
    }


}
