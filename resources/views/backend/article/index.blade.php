@extends('backend.dashboard')
@section('allData')
    @if(Session('status'))
        <div class="alert alert-success alert-dismissible">
            <div>{{Session('status')}}</div>
        </div>

    @endif
    @if(@session('delete'))
        <div class="alert alert-danger">{{@session('delete')}}</div>
    @endif

    <table class="table table-bordered text-center table-striped mt-4">
        <thead >
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>img</td>
            <td>Description</td>
            <td>Category id</td>
            <td>User Id</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
    @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{substr($article->title,0,30)}}</td>
                <td>
                    <img src="{{asset('storage/post-images/' . $article->img)}}" alt="" width="60px" height="60px">
                    </td>
                <td>{{substr($article->description,0,20)}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->user->name}}</td>
                <td>
                    <a href="{{url('admin/article/'. $article->id.'/edit')}}"><button class="btn btn-success" ><i class="fas fa-edit"></i></button></a>
                    <a onclick="return confirm('Are You Sure to delete?')" href="{{url('admin/article/'. $article->id. '/delete')}}"><button class="btn btn-danger" )"><i class="fas fa-trash"></i></button></a>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <div class="float-right ">
        <ul class="list-group">
            <li >{{ $articles->links() }}</li>
        </ul>
    </div>
@endsection
