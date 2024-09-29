@extends('dashboard.adminDashboard')

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth()
    @if(auth()->user()->status=='admin')
    <form method="POST" action="{{ route('coursesUpdate', ['id' => $oldcourse->id]) }}" style="margin-top: 80px; overflow: hidden">
        @csrf
        @method('PUT')
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('deleted'))
            <p class="alert alert-success">{{ session('deleted') }}</p>
        @endif


            <div>
                <label>Title</label>
                <input class="form-control" name="title" value="{{ $oldcourse->title }}">
                @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Description</label>
                <input class="form-control" name="description" value="{{ $oldcourse->description }}">
                @error('description')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Price</label>
                <input class="form-control" name="price" type="text" value="{{ $oldcourse->price }}">
                @error('price')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>


    </form>
    @else
        <p class="btn btn-danger">You are not authorized</p>
    @endif
    @else
        <p class="btn btn-danger">Please log in to access this page</p>
    @endauth
@endsection
