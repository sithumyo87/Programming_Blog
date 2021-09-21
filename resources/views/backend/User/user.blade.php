@extends('backend.dashboard')
@section('allData')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
        @endif
    @if(session('delete'))
        <p class="alert alert-danger">{{session('delete')}}</p>
    @endif
    <table class="table table-bordered text-center table-striped">
        <thead >
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <a href="{{url('admin/user/'.$user->id. '/edit')}}"><button class="btn btn-success" ><i class="fas fa-edit"></i></button></a>
                    <a href="{{url('admin/user/'.$user->id. '/delete')}}" onclick="return confirm('Are you sure to delete {{$user->name}}?')"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                </td>
        </tr>
        @endforeach
        </tbody>

    </table>
    @endsection
