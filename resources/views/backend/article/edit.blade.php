@extends('backend.dashboard')
@section('allData')

    <div class="card card-body bg-light mt-5">
        <form  method="post" enctype="multipart/form-data">
            @csrf
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            <legend>Article Edit</legend>
            <div>
                <label for="title">Article Title</label>
                <input type="text" value="{{$post->title}}" class="form-control" name="title" >
            </div>
            <div>
                <label for="description">Article Description</label>
                <input type="text" value="{{$post->description}}" class="form-control" name="description" >
            </div>
            <div>
                <label for="cat_id" class="mt-2">Category</label>
                <select class="form-select " aria-label="Default select example" name="cat_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach

                </select>
            </div>
            <div>
                <label for="user_id" class="mt-2">User</label>
                <select class="form-select " aria-label="Default select example" name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>

                    @endforeach

                </select>
            </div>
            <div>
                <label for="category">Image</label>
                <input type="file"  class="form-control" name="img" >
                <img src="{{asset('storage/post-images/'. $post->img)}}" alt="" width="60px" height="60px">
            </div>
            <button type="submit" class="btn btn-outline-info mt-3 ">Upload</button>
        </form>
    </div>
@endsection
