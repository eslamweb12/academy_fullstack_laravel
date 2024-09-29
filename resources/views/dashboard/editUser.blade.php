@extends('dashboard.adminDashboard')

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth()
    @if(auth()->user()->status=='admin')

    <form method="POST" action="{{ route('updateUser', ['id' => $user->id]) }}">
        @csrf


        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('delete'))
            <p class="alert alert-success">{{ session('delete') }}</p>
        @endif

        <div>
            <label>Username</label>
            <input class="form-control" name="username" value="{{  $user->username }}">
            @error('username')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Email</label>
            <input class="form-control" name="email" value="{{ $user->email }}">
            @error('email')
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
