@extends('layouts.app')
@section('title','Create Post')
@section('content')
    <div class="container mt-4">
        <div class="col-md-8 offset-2">
            <div class="card card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <legend>Create Post</legend>
                    @foreach($errors->all() as $error)
                        <div class="p alert alert-danger">{{$error}}</div>
                    @endforeach
                    @if(session('status'))
                        <div class="p alert alert-success">{{session('status')}}</div>
                        @endif
                    @csrf
                    <input type="hidden" name="user_id" value={{$user->id}}>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach

                    </select>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="title" name="description">
                    </div>
                    <!--div class="mb-3">
                        <label for="postwriter" class="form-label"></label>
                        <input type="hidden" class="form-control" id="postwriter" name="postwriter">
                    </div-->
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <input type="submit" class="btn btn-success mb-3 ml-3" value="Create">
                </form>
            </div>
        </div>
    </div>

@endsection
