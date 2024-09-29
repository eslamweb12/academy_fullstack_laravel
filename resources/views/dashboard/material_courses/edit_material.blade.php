@extends('dashboard.adminDashboard')

@section('table')

    <form action="{{route('updateMaterial',['id'=>$material->id])}}" method="post" style="margin-top: 70px;">

        @csrf
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif


        <div class="mb-2">
            <label>title</label>
            <input class="form-control" name="title" type="text" value="{{$material->title }}">
            @error('title')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-2">
            <label>type</label>
            <input class="form-control" name="type"  value="{{$material->type }}" >
            @error('type')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-2">
            <label>link</label>
            <input class="form-control" name="link" value="{{$material->link }}"  >
            @error('link')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <button class="btn btn-primary"> create material</button>
    </form>

@endsection

