@extends('layout')


@section('content')


    <div style="position: relative; overflow: hidden;margin-top: 70px; ">
        <img style="width:100%; height: 100%;" src="{{asset('images/hero-bg.jpg')}}" alt="">
        <div class="content"  style="position: absolute; top: 0;bottom: 0;left: 0;right: 0;
        background-color:rgba(0,0,0,0.4);">

            <h2 style="color: white;font-size:35px; position: relative;top: 200px; left:100px;">Learning today, <br>
            Leading tomorrow.</h2>

            <p style="color: white;font-size: 30px; position: relative;top: 250px; left:100px">Space code academy will take to the right way to acheive your goal in programming <br>
            from zero to hero.</p>
            @auth()


                <a class="wel" style=" text-decoration: none;" href="{{route("getCourses")}}">show your courses</a>



            @endauth
            @guest()
                <a  class="wel" style=" text-decoration: none;" href="{{route("getCourses")}}" >Get started</a>
            @endguest
        </div>
    </div>


    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>



    @endif

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

    <div class=" our-journey" style=" width:95%;margin: auto;background-color: #8d4744; border: 10px;border-radius: 40px; height: 120vh; margin-top: 100px">
        <h1 class="text-center" style="color: white">Our journeys!</h1>
        <div class="row" style="margin-top: 40px; margin-left: 100px">
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 1.png")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 2.svg")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 3.svg")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 4.svg")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 5.svg")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>
            <div class="col-3" style="background-color: white;width: 25%;height: 300px; margin-left: 40px;margin-bottom: 50px;text-align: center; padding-top: 60px;border: 5px;border-radius: 14px; cursor: pointer">
                <img src="{{asset("images/journey 6.svg")}}" style="width: 30%;" alt="">
                <h5>AI & Data science</h5>

            </div>





        </div>
    </div>
@endsection
