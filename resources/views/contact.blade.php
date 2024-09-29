@extends('layout')


@section('content')
    <div class="text-center" style="position: relative;padding-top:50px;  top: 60px ;background-color: #5fcf80;height: 250px">
        <h2 class="" style="color: white">Contact us</h2>
        <p style="font-size: 23px; color:white;">
            At Space Code Academy, we are here to help you achieve your learning goals. Whether you have questions about our courses, enrollment, or general inquiries, feel free to reach out. Our team is dedicated to providing prompt assistance and ensuring your experience is seamless.</p>
    </div>

{{--    <h3 class="text-center">we are here to solve you problems </h3>--}}
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-6" style="margin-top: 80px; ">
                <div class="lin" style="position: relative;margin-bottom: 20px">
                   <span style="background-color: #5fcf80;font-size: 20px;margin-right: 15px;padding: 6px; border: 2px solid #5fcf80; border-radius: 50%;"><i class="bi bi-geo-alt flex-shrink-0"  style="color: white; font-size: 20px"></i></span>
                    <div class="address" style="position: absolute; left: 45px; top: -14px;">
                        <h5 style="font-weight: bolder">Address</h5>
                        <p>Eldokki 3 Mosaddeq Street</p>
                    </div>
                </div>
                <div class="lin" style="position: relative;top: 30px; margin-bottom: 20px">
                    <span style="background-color: #5fcf80;font-size: 20px;margin-right: 15px;padding: 6px; border: 2px solid #5fcf80; border-radius: 50%;"><i class="bi bi-telephone flex-shrink-0"  style="color: white; font-size: 20px"></i></span>
                    <div class="address" style="position: absolute; left: 45px; top: -14px;">
                        <h5 style="font-weight: bolder"> Call Us</h5>
                        <p>01156493519</p>
                    </div>
                </div>
                <div class="lin" style="position: relative; top: 60px;">
                    <span style="background-color: #5fcf80;font-size: 20px;margin-right: 15px;padding: 6px; border: 2px solid #5fcf80; border-radius: 50%;"><i class="bi bi-envelope flex-shrink-0"  style="color: white; font-size: 20px"></i></span>
                    <div class="address" style="position: absolute; left: 45px; top: -14px;">
                        <h5 style="font-weight: bolder">
                            Email Us</h5>
                        <p>spaceCode@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <form method="post" action="{{route('PostContact')}}" style="position: relative;top: 50px">
                    @csrf


                    @if(session('success'))
                        <p class="alert alert-success">{{session('success')}}</p>
                    @endif
                    <div class="mb-2">
                        <label>content</label>
                        <input type="text" name="content" class="form-control" style="padding: 40px;">
                        @error('content')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label>phone</label>
                        <input type="text" name="phone" class="form-control">
                        @error('phone')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <input class="btn btn-success text-center" type="submit" value="send">
                </form>
            </div>
        </div>
    </div>

@endsection
