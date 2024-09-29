@extends('dashboard.adminDashboard')
@section('table')
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
    @auth()
    @if(auth()->user()->status=='admin')
    <div class="text-center">
        <a class="btn btn-primary mt-2" href="{{route('createNewCourse')}}"> Create new course</a>
    </div>



    <table class="table table-bordered  table-hover table-striped" style="overflow: hidden; position: relative;top: 50px; width: 1000px;">
        <thead>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>discount</th>
            <th>controll</th>

        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{$course->title}}</td>
                <td>{{$course->description}}</td>
                <td>{{$course->price}}</td>
                <td>

                    {{$course->discount}}
                </td>
                <td>
                    <a href="{{ route('editCourseByAdmin', ['id'=> $course->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('deleteCourse', ['id' => $course->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');"
                    style="position: relative;top: 5px">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>


            </tr>

        @endforeach


        </tbody>
    </table>
    @else
        <p class="btn btn-danger">You are not authorized</p>
    @endif
    @else
        <p class="btn btn-danger">Please log in to access this page</p>
    @endauth

@endsection
