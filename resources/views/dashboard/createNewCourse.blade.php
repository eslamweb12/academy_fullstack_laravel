@extends('dashboard.adminDashboard')

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth()
    @if(auth()->user()->status=='admin')

    <form method="post" action="{{route('creatingCourse')}}">
        @csrf




        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif



            <div >
                <label>title</label>
                <input class="form-control" name="title" >
                @error('title')
                <p class="alert alert-success">{{$message}}</p>
                @enderror

            </div>
            <div >
                <label>description</label>
                <input class="form-control" name="description" >
                @error('description')
                <p class="alert alert-success">{{$message}}</p>
                @enderror
            </div>
            <div >
                <label>price</label>

                <input class="form-control" name="price" type="text" >
                @error('price')
                <p class="alert alert-success">{{$message}}</p>
                @enderror
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-primary" value="create">


            </div>

    </form>
    @else
        <p class="btn btn-danger">You are not authorized</p>
    @endif
    @else
        <p class="btn btn-danger">Please log in to access this page</p>
    @endauth
@endsection
