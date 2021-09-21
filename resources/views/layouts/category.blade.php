<div id="layoutSidenav_nav" class="mt-4 q">
<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
<div class="nav" style="background-color: black;color: white">

    <div class="sb-sidenav-menu-heading" >Dashboard</div>
    <a class="nav-link collapsed hover" style="background-color: black;color: white;" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
        Category
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            @foreach($categories as $category)
            <a class=" d-flex justify-content-between align-items-center nav-link text-white hoverEffect ml-4" href="{{url('/searchByCategory/'. $category->id)}}">{{$category->name}}

            </a>

            @endforeach
        </nav>
    </div>
    <a class="nav-link border border-dark border-2" style="background-color:black;color: white" href="{{url('/about')}}">
        <div class="sb-nav-link-icon "><i class="fas fa-user-alt"></i></div>
        About Me
    </a>
    <a class="nav-link border border-dark border-2 border-bottom-0 mb-5" style="background-color:black;color: white" href="{{url('/update')}}">
        <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
        Update
    </a>
</div>
    </div>
</nav>
</div>
