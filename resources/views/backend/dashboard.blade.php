@extends('layouts.app')
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-black " style="height: 93.3vh" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-black"  id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav" style="">
                            <a class="nav-link mx-auto mt-5 btn  btn-outline-danger w-100" style="background-color:black;color: white;" href="{{url('/admin/admin')}}">
                                <div class="sb-nav-link-icon "><i class="fas fa-user-alt"></i></div>
                                User
                            </a>
                            <a class="nav-link mx-auto mt-1 btn  btn-outline-danger w-100" style="background-color:black;color: white" href="{{url('/admin/category')}}">
                                <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                                Category
                            </a>
                            <a class="nav-link mx-auto mt-1 btn  btn-outline-danger w-100" style="background-color:black;color: white" href="{{url('/admin/article')}}">
                                <div class="sb-nav-link-icon "><i class="fas fa-pen-nib"></i></div>
                                Post
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
        <div class="col-md-8 offset-1 mt-3">
            @yield('allData')
        </div>
    </div>
    </div>
@endsection


