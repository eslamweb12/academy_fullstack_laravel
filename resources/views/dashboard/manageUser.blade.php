@extends('dashboard.adminDashboard')
@if(session('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@endif

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth
        @if(auth()->user()->status == 'admin')
            <h1 class="text-center">All Users</h1>

            @if(session('delete'))
                <p style="width: 50%; margin: auto" class="alert alert-success">{{ session('delete') }}</p>
            @endif

            <table class="table table-bordered table-hover table-striped" style="margin-top: 70px;width: 1000px">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('editUser', ['id' => $user->id]) }}">Edit</a>
                            <form method="post" action="{{ route('deleteUser', ['id' => $user->id]) }}" style="display:inline;">
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="btn btn-danger" style="position: relative;top: 200px;">You are not authorized</p>
        @endif
    @else
        <p class="btn btn-danger">Please log in to access this page</p>
    @endauth
@endsection
