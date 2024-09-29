@extends('layout')

@section('content')
    @if(session('message'))
        <p class="alert alert-success" style="position: relative; top: 100px;text-align: center; z-index: 999">{{ session('message') }}</p>
    @endif

    <div class="row">
        <div class="courses-details col-6" style="position: relative">
            <!-- Course Image and Details -->
            <div style="width:50%">
                <img src="{{ file_exists(public_path('images/courses/' . $course->id . '.svg')) ? asset('images/courses/' . $course->id . '.svg') : asset('images/courses/default.jpg') }}" style="margin-left: 40px" class="cardp" alt="{{ $course->title }}">
            </div>
            <div style="position: relative;left:45px;top: 29px ;z-index: 999">
                <p style="color: #718096;font-size: 20px;">Name: {{ $course->title }}</p>
{{--                <h5 class="card-title" style="font-weight: bold;margin-bottom: 20px;"> Price: {{ $course->price }}</h5>--}}
                <p class="card-text" style="font-weight: bolder">Description: {{ $course->description }}</p>
            </div>
            <form action="{{ route('coursesEnroll', ['id' => $course->id]) }}" method="POST">
                @csrf

                <input type="submit" class="btn btn-primary" value="Enroll Now" style="position: relative;top: 40px;left:40px">
                <a  class="btn btn-info" href="{{route('getComment')}}" style="position: relative;top: 40px;left:40px">show comments</a>
            </form>
        </div>

        <div class="col-6" style="position: relative;top: 200px">
            <h5>Materials</h5>
            @if($enrolled)  <!-- Check if the user is enrolled -->
            @if($course->materials->isNotEmpty())
                <ul>
                    @foreach($course->materials as $material)
                        <li>
                            <p>
                                {{ $material->title }}
                                <a data-bs-toggle="collapse" href="#collapse{{$material->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$material->id}}" style="text-decoration:none;">
                                    <i class="bi bi-chevron-down"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapse{{$material->id}}">
                                <a href="{{$material->link}}" target="_blank">{{$material->link}}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No materials available for this course.</p>
            @endif
            @else
                <p>You must enroll in the course to view the materials.</p>
            @endif
        </div>

    </div>
@endsection
