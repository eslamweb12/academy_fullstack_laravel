@extends('dashboard.adminDashboard')

@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth()

    @if(auth()->user()->status=='admin')

    <h1 class="text-center">All Contacts </h1>
    <table class="table table-bordered  table-hover table-striped" style="margin-top: 70px;width: 1000px;">
        <thead>
        <tr>
            <th>username</th>
            <th>email</th>
            <th>content</th>
            <th>phone</th>



        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->user->username}}</td>
                <td>{{$contact->user->email}}</td>
                <td>{{$contact->content}}</td>
                <td>{{$contact->phone}}</td>

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

