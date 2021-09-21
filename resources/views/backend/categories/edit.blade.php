@extends('backend.dashboard')
@section('allData')

    <div class="card card-body bg-light mt-5">
        <form  method="post">
            @csrf
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        <legend>Categroy Edit</legend>
        <div>
        <label for="category">Category Name</label>
        <input type="text" value="{{$category->name}}" class="form-control" name="name" >
        </div>
            <button type="submit" class="btn btn-outline-info mt-3 ">Upload</button>
        </form>
    </div>
@endsection
