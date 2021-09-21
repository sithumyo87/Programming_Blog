@extends('backend.dashboard')
@section('allData')
    @if(@session('status'))
        <div class="alert alert-success">{{@session('status')}}</div>
    @endif
    @if(@session('delete'))
        <div class="alert alert-danger">{{@session('delete')}}</div>
    @endif
    <a href="{{url('admin/category/add')}}"><button class="btn btn-success float-right mb-3" ><i class="fas fa-plus-circle">Add Category</i></button></a>
    <table class="table table-bordered text-center table-striped">
        <thead >
        <tr>
            <td>ID</td>
            <td>Category</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{url('admin/category/' . $category->id . '/edit')}}"><button class="btn btn-success" ><i class="fas fa-edit"></i></button></a>
                    <a onclick="return confirm('Are You Sure to delete?'  ) " href="{{url('admin/category/'.$category->id . '/delete')}}"><button class="btn btn-danger" )"><i class="fas fa-trash"></i></button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
