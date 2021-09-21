@extends('backend.dashboard')
@section('title','Create Category')
@section('allData')
    <div class="card card-body bg-light">
        <h4 class="text-success">Edit User</h4>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Title</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Role</label>
                <input type="text" class="form-control" id="status" name="status" value="{{$user->status}}">
            </div>
            <button type="submit" class="btn btn-success ">Upload</button>
        </form>
    </div>
@endsection
