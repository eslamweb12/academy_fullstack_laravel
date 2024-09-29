    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            .wel {
                padding: 10px 30px;
                border: 1px solid white;
                border-radius: 24px;
                position: relative;
                top: 250px;
                left: 100px;
                color: white;
                font-size: 20px;
                background-color: transparent; /* Default background color */
                cursor: pointer; /* Adds a pointer on hover */
            }
            .wel:hover {
                background-color: #5fcf80; /* Background color on hover */
                text-decoration: underline;

            }
            .sidebar {
                height: 100vh; /* Full viewport height */
                position: fixed; /* Fixed sidebar */
                top:68px;
                left: 0;
                width: 200px; /* Small sidebar width */
                background-color: #343a40; /* Dark background */
                padding: 20px;
                color: white;
            }

            .our_courses{

                overflow: hidden;
                margin-top: 80px;
            }
            .courses-details{
                margin-top: 80px;
                height: 100vh;
                overflow: hidden;

            }
            /*.card{*/
            /*    width: 28%;*/
            /*    margin-left: 50px;*/
            /*    margin-bottom: 20px;*/
            /*    margin-top: 20px;*/

            /*}*/
            /*!*.card-img-top {*!*/
            /*!*    width: 60%;*!*/
            /*!*    padding-left: 40px;*!*/

            /*!*.navbar-expand-lg{*!*/
            /*!*    position: fixed;*!*/
            /*!*}*!*/
            /*!*}*!*/


        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #a11c16; font-size: 30px">Space Code</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}" style="color: #a11c16">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getCourses') }}" style="color: #a11c16">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" style="color: #a11c16">About us</a>
                    </li>
                    @auth()
                        @if(auth()->user()->status == 'admin')
                            <a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" style="color: #a11c16">Contact us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" style="position: relative; right: 90px;">
                    <input class="form-control me-2" type="search" style="position: relative; left: 70px" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" style="position: relative; left: 70px" type="submit">Search</button>
                </form>

                @guest()
                    <a class="link" href="{{ route('login') }}">Login</a>
                    <a class="link" href="{{ route('register') }}">Register</a>
                @endguest
                @auth()
                    <a class="link" href="{{ route('logout') }}">Logout</a>
                    <a class="btn btn-primary" href="{{route('relatedCourses')}}" >go to my learning page</a>
                @endauth
            </div>
        </div>
    </nav>




    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>

    </body>
    </html>
