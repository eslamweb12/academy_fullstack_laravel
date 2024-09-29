@extends('layout')

@section('content')

    {{--    <div class="text-center" style="position: relative;padding-top:50px;margin-bottom: 100px;  top: 60px ;background-color: darkolivegreen;height: 250px">--}}
    {{--        <h2 class="" style="color: white">cources</h2>--}}
    {{--        <p style="font-size: 23px; color:white;">--}}
    {{--           details about course</p>--}}
    {{--    </div>--}}



    {{--    <div class="clac" style="width:100%;height:200px;background-color: #dee2e6;position: relative; overflow:hidden;top: 60px; overflow: hidden; " >--}}
    {{--        <div class="row" style="position: relative;left: 80px; top: 50px" >--}}
    {{--            <div class="col-3" style="">--}}
    {{--                <span data-purecounter-start="0" data-purecounter-end="1232--}}
    {{--" data-purecounter-duration="0" class="purecounter" style="position: relative;color: indianred;font-size: 25px; left:30px">1232--}}
    {{--</span>--}}
    {{--                <h4 style="color: #adb5bd">Students</h4>--}}
    {{--            </div>--}}
    {{--            <div class="col-3" style="">--}}
    {{--                <span style="position: relative; left:30px;color: indianred;font-size: 25px;">64</span>--}}
    {{--                <h4 style="color: #adb5bd">Courses</h4>--}}
    {{--            </div>--}}
    {{--            <div class="col-3" style="">--}}
    {{--                <span  data-purecounter-start="0" data-purecounter-end="42--}}
    {{--" data-purecounter-duration="0" class="purecounter"style="position: relative;color: indianred; left:30;font-size: 25px;">42</span>--}}
    {{--                <h4 style="color: #adb5bd">Events</h4>--}}
    {{--            </div>--}}
    {{--            <div class="col-3" style="">--}}
    {{--                <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="0" class="purecounter" style="position: relative;color:indianred;font-size: 25px; left:30px">24</span>--}}
    {{--                <h4 style="color: #adb5bd">Trainers</h4>--}}
    {{--            </div>--}}

    {{--        </div>--}}


    {{--    </div>--}}


    @if(session('message'))
        <p class="alert alert-success" style="position: relative; top: 100px;text-align: center; z-index: 999">{{session('message')}}</p>
    @endif
    <h2 class="text-center" style="position: relative;top: 70px"> my courses</h2>
    @if ($courseUser->isEmpty())
        <p>You are not enrolled in any courses yet.</p>
    @else
        <div class="container">
            <div class="row" style="overflow: hidden">
                @foreach($courseUser as $course)

                    <div class="courses-details col-4 text-center  " style="position: relative ;height: 300px; border: 5px solid darkgrey;border-radius: 10px; max-width: 30%;margin-right: 30px;">



                        <!-- Check if course image exists; if not, use default image -->
                        @php
                            $imagePath = 'images/courses/' . $course->id . '.svg';
                        @endphp
                        <div style="width:50% ">

                            <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/courses/default.jpg') }}" class="card-img-top" style="width: 60%" alt="{{ $course->title }}"  >


                        </div>

                        <div style="position: relative;left:0px;top: 29px ;z-index: 999">
                            <p style="color: #718096;font-size: 20px;">
                                Name:   {{ $course->title }}


                            </p>
                            <div>
                                <p class="card-text" style="font-weight: bolder">Description: {{ $course->description }}</p>
                                <a href="{{route('courseDetails',['id'=>$course->id])}}" class="btn btn-info">go to course</a>

                            </div>



                        </div>
                        {{--        <form action="{{route('coursesEnroll',['id'=>$course->id])}}" method="POST">--}}
                        {{--            @csrf--}}
                        {{--            <input type="submit" class="btn btn-primary" value="enroll now" style="position: relative;top: 40px;right:330px">--}}
                        {{--        </form>--}}






                    </div>


                @endforeach
            </div>

        </div>

    @endif


@endsection
