@extends('layout')

@section('content')
    @if(session('message'))
        <p class="alert alert-danger text-center">{{session('message')}}</p>

    @endif
    <div class="container">
        <div class="row" style=" margin-top: 90px;">
            <div class="col-6">
                <h3>All comments</h3>
                <ul>
                    @foreach($data as $item)
                        <li style="color: #1a1ae8">{{$item->user->username}}</li>
                        <li style="margin-left: 30px; color: indianred">{{$item->comment}}</li>
                    @endforeach
                </ul>

            </div>
            <div class="col-6">
                <form action="{{route('storeComment')}}" method="POST" style="max-width: 400px; ">

                    @csrf

                    <input class="form-control" name="comment" type="text" style="margin-bottom: 10px;">
                    <input class="btn btn-info" type="submit" value="comment">


                </form>

            </div>


        </div>

    </div>









@endsection
