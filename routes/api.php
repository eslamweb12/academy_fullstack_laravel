<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'auth'],function(){
//    Route::view('/login','auth.login')->name('login');
    Route::post('/login/user',[\App\Http\Controllers\Api\Auth\userController::class,'login'])->name('PostLogin');

    Route::post('/register/user',[\App\Http\Controllers\Api\Auth\userController::class,'register'])->name('PostRegister');
    Route::get('/logout',[\App\Http\Controllers\Api\Auth\userController::class,'logout'])->name('logout');
});
Route::post('/contact/message',[\App\Http\Controllers\Api\contactController::class,'contact'])->name('PostContact');
Route::group([ 'middleware' => ['auth:api', 'check_admin:admin']], function () {
//    Route::view('/manage-user',fdfshboard.manageUser')->name('manageUser');
    Route::get('/courses/{id}/edit', [\App\Http\Controllers\Api\CourseUserController::class, 'edit'])->name('editCourseByAdmin');
    Route::get('/get-users',[\App\Http\Controllers\Api\Auth\userController::class,'index'])->name('getUsers');
    Route::get('/get-contact',[\App\Http\Controllers\Api\contactController::class,'index'])->name('getContacts');
    Route::get('/edit-user/{id}',[\App\Http\Controllers\Api\Auth\userController::class,'show'])->name('editUser');
    Route::post('/dashboards/update-user/{id}', [\App\Http\Controllers\Api\Auth\userController::class, 'update_user'])->name('updateUser');
    Route::post('/dashboards/delete-user/{id}', [\App\Http\Controllers\Api\Auth\userController::class, 'delete_user'])->name('deleteUser');
//    Route::view('/manage-course','dashboard.manageCourses')->name('manageCourses');
    Route::post('/create-new',[\App\Http\Controllers\Api\CourseUserController::class,'createNewCourse'])->name('creatingCourse');
    Route::get('/mange-admin-course',[\App\Http\Controllers\Api\CourseUserController::class,'manageAdmin'])->name('mangeCourseByAdmin');
// Route for updating the course
    Route::put('/courses/update/{id}', [\App\Http\Controllers\Api\CourseUserController::class, 'update'])->name('coursesUpdate');
    Route::delete('/courses/{id}/delete', [\App\Http\Controllers\Api\CourseUserController::class, 'destroy'])->name('deleteCourse');


});

//Route::view('/about','about_us')->name('about');
Route::group(['prefix'=>'courses','middleware'=>'auth:api'],function(){

    Route::get('/get-courses',[\App\Http\Controllers\CourseController::class,'index'])->name('getCourses');
    Route::get('/show/course/{id}',[\App\Http\Controllers\CourseController::class,'showCourseDetails'])->name('courseDetails');
    Route::post('/courses/{id}/enroll', [\App\Http\Controllers\CourseUserController::class, 'enroll'])
        ->name('coursesEnroll');
    Route::get('/related-courses',[\App\Http\Controllers\CourseUserController::class,'relatedCourses'])->name('relatedCourses');
});
//Route::view('/unathrized-action','unathrized')->name('unathrized');

Route::group(['prefix'=>'courses','middleware' => ['auth:api', 'check_admin:admin']],function(){
    Route::get('/form-material/{id}',[\App\Http\Controllers\materailCourse::class,'create'])->name('formMaterial');

    Route::post('/create-material',[\App\Http\Controllers\Api\materailCourse::class,'store'])->name('createMaterial');
    Route::get('/all-material',[\App\Http\Controllers\Api\materailCourse::class,'index'])->name('allMaterial');
    Route::get('/edit-material/{id}',[\App\Http\Controllers\Api\materailCourse::class,'edit'])->name('editMaterial');
    Route::post('/update-material/{id}',[\App\Http\Controllers\Api\materailCourse::class,'update'])->name('updateMaterial');
    Route::post('/delete-material/{id}',[\App\Http\Controllers\Api\materailCourse::class,'destroy'])->name('deleteMaterial');
});
Route::group(['prefix'=>'comment','middleware' => 'auth:api'],function(){
    Route::get('/get-comment',[\App\Http\Controllers\Api\commentController::class,'index'])->name('getComment');
    Route::post('/store-comment',[\App\Http\Controllers\Api\commentController::class,'store'])->name('storeComment');

});
Route::group(['prefix'=>'comment','middleware' => ['auth:api', 'check_admin:admin']],function(){
    Route::get('all-comments-admin',[\App\Http\Controllers\Api\commentController::class,'allCommentsForAdmin'])->name('allCommentsAdmin');
    Route::get('edit-comment/{id}',[\App\Http\Controllers\Api\commentController::class,'edit'])->name('editComment');
    Route::post('update-comment/{id}',[\App\Http\Controllers\Api\commentController::class,'update'])->name('updateComment');

    Route::post('delete-comment/{id}',[\App\Http\Controllers\CommentController::class,'destroy'])->name('deleteComment');

});


