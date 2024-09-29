<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function enroll($courseId)
    {
        $user = auth()->user();
        $course = course::find($courseId);

        // Check if the user is already enrolled
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('message', 'You have already enrolled in this course.');
        }

        // Enroll the user and store the current timestamp in 'filled_in'
        $user->courses()->syncWithoutDetaching([$courseId => ['filled_in' => now()]]);

        return redirect()->back()->with('message', 'You have successfully enrolled in the course.');
    }


    public function relatedCourses()
    {
        $user = auth()->user();

        // Retrieve courses directly as a collection
        $courseUser = $user->courses()->get(); // Using get() to retrieve the collection

        return view('cources.coursesRelatedUser')->with('courseUser', $courseUser);
    }

}
