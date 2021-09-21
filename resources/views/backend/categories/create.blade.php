@extends('backend.dashboard')
@section('title','Create Category')
@section('allData')

            <div class="card card-body bg-light mt-3">
                <form action="" method="post">
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @foreach($errors->all() as  $error)
                        <div class="p alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @csrf
                    <h4>Create Category</h4>
                    <label for="category">Category Name</label>
                    <input type="text" name="name" class="form-control">
                    <button type="submit" class="btn btn-success btn-sm mt-2">Upload</button>
                </form>
    </div>
@endsection
