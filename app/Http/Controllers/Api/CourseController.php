<?php

namespace App\Http\Controllers\Api;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

use App\Http\Resources\CourseResource;
use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function createNewCourse(CourseRequest $request){
        $course=$request->validated();
        $newCourse=course::query()->create($course);
        return message::success(CourseResource::make($newCourse),'course created successfully');



    }
    public  function index(){
        $courses=course::query()->orderBy('id','DESC')->get();
        return message::success(CourseResource::collection($courses),'all courses');

    }
    public function manageAdmin(){
        $courses=course::query()->orderBy('id','DESC')->get();
        return message::success(CourseResource::collection($courses),'all courses');
    }

    public function update(CourseRequest $request, $id){

        $course=course::query()->findOrFail($id);

        // Validate and update the course
        $data = $request->validated();

        // Update the course with the validated data
       $new= $course->update($data);

        // Redirect with success message
        return message::success(CourseResource::make($new),'course updated');
    }
    public function destroy($id){
        $course=course::query()->findOrFail($id);
       $deleted= $course->delete();
        return message::success(null,'deleted successfulluy');
    }

    public function showCourseDetails($id)
    {
        $course = Course::with('materials')->findOrFail($id);
        $user = auth()->user();

        // Check if the user is enrolled in the course and has a non-null 'filled_in' timestamp
        $enrolled = $user->courses()
            ->where('course_id', $id)
            ->whereNotNull('course_user.filled_in') // Ensure we reference the pivot column correctly
            ->exists();

        return message::success(CourseResource::make($course),'course details');
    }

}
