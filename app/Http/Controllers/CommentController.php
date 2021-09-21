<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create([
            'user_id' => $request->get('user_id'),
            'content'=>$request->get('content'),
            'commendable_id'=>$request->get('commendable_id'),
            'commendable_type'=>$request->get('commendable_type'),
        ]);
        return redirect(action('PostController@detail',$request->commendable_id))->with('status','successfully Commented');
    }
}
