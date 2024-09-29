<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
   public function createNewCourse(CourseRequest $request){
       $course=$request->validated();
       $newCourse=course::query()->create($course);
       return redirect()->route('courses')->with('success', 'Course created successfully');



   }
   public  function index(){
       $courses=course::query()->orderBy('id','DESC')->get();
       return view('cources.cources',compact('courses'));

   }
   public function manageAdmin(){
       $courses=course::query()->orderBy('id','DESC')->get();
       return view('dashboard.manageCourses',compact('courses'));
   }
    public function edit($id)
    {
        $oldcourse = Course::findOrFail($id); // Correct capitalization
        return view('dashboard.editCourse')->with('oldcourse', $oldcourse); // Remove quotes around the variable name
    }
  public function update(CourseRequest $request, $id){

      $course = Course::findOrFail($id);

      // Validate and update the course
      $data = $request->validated();

      // Update the course with the validated data
      $course->update($data);

      // Redirect with success message
      return redirect()->back()->with('success', 'Course updated successfully');
  }
  public function destroy($id){
       $course=course::query()->findOrFail($id);
       $course->delete();
       return redirect()->back()->with('deleted', 'Course deleted successfully');
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

        return view('cources.details_about_course', compact('course', 'enrolled'));
    }





}
