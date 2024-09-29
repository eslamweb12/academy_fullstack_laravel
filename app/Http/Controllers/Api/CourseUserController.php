<?php

namespace App\Http\Controllers\Api;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Resources\courseUserResource;
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
            return message::success(null,'you have already enrolled this course');
        }

        // Enroll the user and store the current timestamp in 'filled_in'
        $user->courses()->syncWithoutDetaching([$courseId => ['filled_in' => now()]]);

        return message::success(null,'you have successfully enrolled in this course.');
    }


    public function relatedCourses()
    {
        $user = auth()->user();

        // Retrieve courses directly as a collection
        $courseUser = $user->courses()->get(); // Using get() to retrieve the collection

        return message::success(courseUserResource::collection($courseUser),'deleted successfulluy');
    }

}
