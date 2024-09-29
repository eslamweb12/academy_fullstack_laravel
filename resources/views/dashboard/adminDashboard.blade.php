    @extends('layout')
    @section('content')

        @auth()
        @if(auth()->user()->status=='admin')
        <div class="sidebar">
            <h4>Admin Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item bar"><a href="{{route('getUsers')}}" class="nav-link text-white">Manage Users</a></li>
                <li class="nav-item bar"><a href="{{route('mangeCourseByAdmin')}}" class="nav-link text-white">Manage Courses</a></li>
                <li class="nav-item bar"><a href="{{route('getContacts')}}" class="nav-link text-white">Manage Contacts</a></li>
                <li class="nav-item bar">
                    <a href="{{route('allMaterial')}}" class="nav-link text-white">Manage material</a>
                </li>
                <li class="nav-item bar">
                    <a href="{{route('allCommentsAdmin')}}" class="nav-link text-white"> comments </a>
                </li>
            </ul>
        </div>


        @yield('table')
        @else
            <p class="btn btn-danger">You are not authorized</p>
        @endif
        @else
            <p class="btn btn-danger">Please log in to access this page</p>
        @endauth
    @endsection
