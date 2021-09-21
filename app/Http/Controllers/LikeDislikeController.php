<?php

namespace App\Http\Controllers;

use App\LikesDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function like($postId){
        $isExist = LikesDislike::where('post_id',$postId)->where('user_id',Auth::user()->id)->first();
        if($isExist){
           if($isExist->type == 'like'){
               return back();
           }else{
               LikesDislike::where('id',$isExist->id)->update([
                   'type' => 'Like',
               ]);
           }
            return back();
        }else{
            LikesDislike::create([
                'user_id'=>Auth::user()->id,
                'post_id' => $postId,
                'type' => 'Like',
            ]);
            return back();
        }
    }
    public function  dislike($postId){
        $isExist = LikesDislike::where('post_id',$postId)->where('user_id',Auth::user()->id)->first();
        if($isExist) {
            if ($isExist->type == 'Dislike') {
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'Dislike',
                ]);
            }
            return back();
        }else{
            LikesDislike::create([
                'user_id'=>Auth::user()->id,
                'post_id' => $postId,
                'type' => 'Dislike',
            ]);
            return back();
        }
    }

}
