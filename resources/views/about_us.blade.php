@extends('layout')

@section('content')
    <div class="text-center" style="position: relative;padding-top:50px;  top: 60px ;background-color: indianred;height: 250px">
        <h2 class="" style="color: white">About Us</h2>
        <p style="font-size: 23px; color:white;">
            Welcome to our Academy, where we offer hands-on training in programming and the latest tech skills. Join us to build a strong foundation for your career in coding!</p>
    </div>

<div class="container" style="overflow: hidden ;margin-top: 200px; ">
    <div class="row" style="margin: auto;">

        <div class="col-6" style="" >
            <h2>some information about space code academy</h2>
            <p><i class="bi bi-check-circle" style="color: red;"></i>  we are a team of computer science engineers
                who are here to help</p>
            <p><i class="bi bi-check-circle" style="color: red;"></i>  you will find the support from all members in our team</p>
            <p><i class="bi bi-check-circle" style="color: red;"></i>  we have a lot of operations with greatest company </p>



        </div>
        <div class="col-6" style="position: relative;left: 80px" >
            <img src="{{asset('images/about-2.jpg')}}" style="width: 90%" alt="">

        </div>


    </div>
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
    <div style="position: relative;top:60px; margin-bottom: 100px;">
        <h4 style="position: absolute;top: 80px;left:300px; margin-bottom: 100px">WHAT THEY ARE SAYING ABOUT US ??</h4>


    </div>
    <div class="cafd" style="">

        <div id="carouselExampleInterval" class="carousel slide text-center" style="position: relative;top: 130px;width: 85%"  data-bs-ride="carousel">
            <div class="carousel-inner" style="overflow: hidden">
                <div class="carousel-item active" data-bs-interval="10000" style="position: relative;left: 300px; width: 60%">
                    <img style="" src="{{asset('images/feed-1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000"style="position: relative;left: 250px; width: 60%">
                    <img src="{{asset('images/feed-2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item"style="position: relative;left: 300px; width: 60%">
                    <img src="{{asset('images/feed.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>




@endsection
