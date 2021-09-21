@extends('layouts.app')
@section('title','Article Detail')
@section('content')
    <div class="container " style="font-family: Arial">
        <div class="col-md-6 offset-3">
            <div class="card card-body bg-light">
                <h1 style="font-size:5vh" class="mb-2">{{$article->title}}</h1>
                <h5 class="mb-5 text-success">{{$article->category->name}}</h5>
                <img src="{{asset('storage/post-images/'.$article->img)}}" alt="" style="height: 500px;">
                <p class="mt-2 my-0"><b><i class="fas fa-user-edit">Author </i>- <span class="text-success">{{$article->user->name}}</span></b></p>
                <p class="my-0 "><b><i class="fas fa-shopping-cart">Author </i>- <span class="text-success">{{$article->category->name}}</span></b></p>
                <p class="my-0 "><b><i class="fas fa-user-edit">Author </i>- <span class="text-success">{{ date('d/M/Y', strtotime($article->created_at)) }}</span></b></p>
                <p class="mt-4 mb-3">{{$article->description}}</p>
                <form action="" class="mt-3">
                    <button formaction="{{url('/post/like/'.$article->id)}}" class="btn btn-success btn-sm">{{ $like->count() }} Like</button>
                    <button formaction="{{url('/post/dislike/'.$article->id)}}" class="btn btn-danger btn-sm">{{ $dislike->count() }} DisLike</button>
                </form>


                <form action="{{url("/comment/create")}}" method="post">
                    @csrf
                    <div class="card card-body bg-dark mb-5 mt-5">
                        <h3 class="text-white">Comment</h3>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="commendable_id" value="{{$article->id}}">
                        <input type="hidden" name="commendable_type" value="App\Post">
                        <textarea name="content" id="" cols="20" rows="5" class="form-control"></textarea>
                        <div>
                            <input type="submit" value="Upload" class="btn btn-success mt-3 float-right">
                        </div>
                        <hr>

                        <div class="page-header mb-3">
                            <h1><small class="pull-right text-white">{{$comments->count()}} comments</small>  </h1>
                        </div>
                        @foreach($comments as $comment)
                        <div class="comments-list text-white">
                            <div class="media">

                                <a class="media-left mr-2" href="#">
                                    <img src="http://lorempixel.com/40/40/people/1/">
                                </a>
                                <div class="media-body">

                                    <h4 class="media-heading user_name">{{$user->name}}</h4>
                                    {{$comment->content}}
                                    <p class="float-right"><small>12 days ago</small></p>
                                    <p class="mb-5 "><small><a  class="text-success" href="">Like</a> - <a class="text-success" href="">Share</a></small></p>
                                </div>
                                <hr>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
