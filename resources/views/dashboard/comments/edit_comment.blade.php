@extends('layout')

@section('content')
    @if(session('message'))
        <p class="alert alert-success text-center"  style=" max-width:400px;margin-top: 90px">{{session('message')}}</p>

    @endif
    <div class="container">



                    <form action="{{route('updateComment',['id'=>$data->id])}}" method="POST" style="max-width: 600px; margin: auto ;margin-top: 90px;">

                        @csrf

                        <input class="form-control" name="comment" type="text" style="margin-bottom: 10px;" value="{{$data->comment}}">
                        <input class="btn btn-info" type="submit" value="update comment">


                    </form>



    </div>









@endsection
