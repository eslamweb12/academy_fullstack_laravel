@extends('layout')

@section('content')
    <div class="container" style="margin-top: 150px; color: red" c>
        <div class="row" style="color: red">
            <div class="col-6 text-center" style="position: relative;right: 40px;">
                <img src="{{asset('images/login.png')}}" alt="" style="width: 70%;margin-bottom: 20px">
                <h3 style="color: black">Do you need to achieve your dream Join <span style="color: #a11c16">space code</span> </h3>

            </div>
            <div class="col-6" style="position: relative;bottom: 70px;">
                <h3 class="text-center" style="color: black; position: relative;top: 70px;">login to your account</h3>
                <form action="{{ route('PostLogin') }}" method="post" style="position: relative;top: 80px">
                    @if(session('error'))
                        <p class="alert alert-danger">{{session('error')}}</p>

                    @endif
                    @csrf

                    <div  style="margin-bottom: 16px">
                        <label style="color: #1a1ae8 ; margin-bottom: 15px;" >Email:</label>
                        <input class="form-control" name="email" type="email" style="border: none;background-color:rgba(191,202,210,1)" placeholder="enter your email">
                        @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="margin-bottom: 20px">
                        <label style="color: #1a1ae8; margin-bottom: 15px;">Password:</label>
                        <input class="form-control" name="password" type="password" placeholder="enter your password"style="border: none;background-color:rgba(191,202,210,1)" >
                        @error('password')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                    </div>
                   <input type="submit" class="form-control btn btn-primary" value="Login">

                </form>


            </div>


        </div>
    </div>






@endsection
