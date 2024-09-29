@extends('dashboard.adminDashboard')

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif

    @auth
        @if(auth()->user()->status == 'admin')
            <div class="text-center">
                <a class="btn btn-primary mt-2" href="{{ route('createNewCourse') }}">Create new course</a>
            </div>

            <table class="table table-bordered table-hover table-striped mt-4" style="width: 1000px;margin-top: 50px;">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Comment</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>
                            <a href="{{route('editComment',['id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('deleteComment',['id'=>$item->id])}}" method="post">
                                @csrf
                             <input class="btn btn-danger" type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="btn btn-danger">You are not authorized</p>
        @endif
    @else
        <p class="btn btn-danger">Please log in to access this page</p>
    @endauth
@endsection
