@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="container-fluid py-0">
            <div class="row" >
                <div class="col-md-12  text-white bg-image" style="
            background-image: url('https://images.unsplash.com/photo-1509718443690-d8e2fb3474b7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80');
            height: 50vh; width: 100%;  ">
                    <div class="p-4 p-md-5 mb-4 ">
                        <div class="col-md-6 px-0">
                            <h1 class="display-4  pt-5" style="font-family: Arial">What is Programming Blog?</h1>
                            <p class="lead my-3">
                                I did the programming blog to share the programming knowledge each other around the world.
                                If you're a developer then you'll know that when searching for answers to programming issues online and programming will solve your error issue.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid clearfix mt-3">
            <div class="float-right ">
                <ul class="list-group">
                    <li>{{ $posts->links() }}</li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 ">
                    @include('layouts.category')
                </div>
                    <div class="col-md-9">
                        <div class="row">

                            @foreach($posts as $post)
                                <div class="col-md-4">
                                    @include('layouts.post')
                                    <div class="card mt-4 mb-3">
                                        <div class="card-img-top " >
                                            <img style="height: 300px" src={{asset('/storage/post-images/'.$post->img)}} >
                                        </div>
                                        <div class="card-body">

                                            <div class="c-title ">
                                                <a href="{{action('PostController@detail',$post->id)}}"><p>{{$post->title}}</p></a>
                                                <p>{{substr($post->description,0,100)}}</p>
                                            </div>
                                            <div class="c-footer">
                                                <ul class="list-inlne list-unstyled">
                                                    <li class="list-inline-item"><a href="#"class="text-secondary"><small>{{ date('d/M/Y', strtotime($post->created_at)) }}</small></li></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>



        @else
            @include('layouts.index')
    @endif
@endsection
