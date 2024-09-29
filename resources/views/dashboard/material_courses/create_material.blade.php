@extends('dashboard.adminDashboard')

@section('table')
    <form action="{{route('createMaterial')}}" method="post" style="margin-top: 70px;">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course_id }}">

        <div class="mb-2">
            <label>title</label>
            <input class="form-control" name="title" type="text" >
            @error('title')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-2">
            <label>type</label>
            <input class="form-control" name="type"  >
            @error('type')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-2">
            <label>link</label>
            <input class="form-control" name="link"  >
            @error('link')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror

        </div>
        <button class="btn btn-primary"> create material</button>
    </form>

@endsection

