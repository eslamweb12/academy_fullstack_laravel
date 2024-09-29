@extends('layout')

@section('content')
    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="text-center" style="position: relative;padding-top:50px;margin-bottom: 100px;margin-top: 50px;  top: 60px ;background-color: #a11c16;height: 250px">
        <h2 class="" style="color: white">cources</h2>
        <p style="font-size: 23px; color:white;">
            Welcome to Our Courses
            At Space code, we are dedicated to empowering you with the skills and knowledge needed to excel in your chosen field. Our comprehensive courses are designed to provide a robust education</p>
    </div>



    <div class="clac" style="width:100%;height:200px;background-color: #dee2e6;position: relative; overflow:hidden;top: 60px; overflow: hidden; " >
        <div class="row" style="position: relative;left: 80px; top: 50px" >
            <div class="col-3" style="">
                <span data-purecounter-start="0" data-purecounter-end="1232
" data-purecounter-duration="0" class="purecounter" style="position: relative;color: indianred;font-size: 25px; left:30px">1232
</span>
                <h4 style="color: #adb5bd">Students</h4>
            </div>
            <div class="col-3" style="">
                <span style="position: relative; left:30px;color: indianred;font-size: 25px;">64</span>
                <h4 style="color: #adb5bd">Courses</h4>
            </div>
            <div class="col-3" style="">
                <span  data-purecounter-start="0" data-purecounter-end="42
" data-purecounter-duration="0" class="purecounter"style="position: relative;color: indianred; left:30;font-size: 25px;">42</span>
                <h4 style="color: #adb5bd">Events</h4>
            </div>
            <div class="col-3" style="">
                <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="0" class="purecounter" style="position: relative;color:indianred;font-size: 25px; left:30px">24</span>
                <h4 style="color: #adb5bd">Trainers</h4>
            </div>

        </div>


    </div>


    <div class="container" style="margin-top: 120px; background-co">
        <div class="row" style="margin-left: 40px;">
            @foreach($courses as $course)
                <div class="col-4" style="border: 5px solid lightgoldenrodyellow;width: 30%; margin-right: 20px;margin-bottom: 15px; border-radius: 10px; ">
                    <!-- Check if course image exists; if not, use default image -->
                    @php
                        $imagePath = 'images/courses/' . $course->id . '.svg';
                    @endphp

                    <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/courses/default.jpg') }}" class="card-img-top" style="width: 35%;margin-top: 10px" alt="{{ $course->title }}">

                   <h5>
                        {{ $course->title }}
                    </h5>
                    <div class="body">
                        <h5 class="title">{{ $course->price }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{route('courseDetails',['id'=>$course->id])}}" class="btn btn-success">show course details</a>

                    </div>
                    <div>
                        @auth()
                            @if(auth()->user()->status=='admin')
                                <div class="text-center" style="position: relative">
                                    <a class="btn btn-primary" href="{{route('formMaterial',['id'=>$course->id])}}"style="position: absolute;right:0;bottom:0px">add material</a>

                                </div>
                            @endif
                        @endauth

                    </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection
