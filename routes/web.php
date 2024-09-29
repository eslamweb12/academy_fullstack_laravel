<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\materailCourse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix'=>'auth'],function(){
    Route::view('/login','auth.login')->name('login');
    Route::post('/login/user',[UserController::class,'login'])->name('PostLogin');
    Route::view('/register','auth.register')->name('register');

    Route::post('/register/user',[UserController::class,'register'])->name('PostRegister');
   Route::get('/logout',[UserController::class,'logout'])->name('logout');
});
Route::view('/contact','contact')->name('contact');
Route::post('/contact/message',[\App\Http\Controllers\ContactController::class,'contact'])->name('PostContact');
Route::group(['prefix' => 'dashboards', 'middleware' => ['auth', 'check_admin:admin']], function () {    Route::view('/dashboard','dashboard.adminDashboard')->name('dashboard');
//    Route::view('/manage-user',fdfshboard.manageUser')->name('manageUser');
    Route::get('/courses/{id}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('editCourseByAdmin');
    Route::get('/get-users',[UserController::class,'index'])->name('getUsers');
    Route::get('/get-contact',[\App\Http\Controllers\ContactController::class,'index'])->name('getContacts');
    Route::get('/edit-user/{id}',[UserController::class,'show'])->name('editUser');
    Route::post('/dashboards/update-user/{id}', [UserController::class, 'update_user'])->name('updateUser');
    Route::post('/dashboards/delete-user/{id}', [UserController::class, 'delete_user'])->name('deleteUser');
//    Route::view('/manage-course','dashboard.manageCourses')->name('manageCourses');
    Route::view('/creat-course','dashboard.createNewCourse')->name('createNewCourse');
    Route::post('/create-new',[\App\Http\Controllers\CourseController::class,'createNewCourse'])->name('creatingCourse');
    Route::get('/mange-admin-course',[\App\Http\Controllers\CourseController::class,'manageAdmin'])->name('mangeCourseByAdmin');
// Route for updating the course
    Route::put('/courses/update/{id}', [\App\Http\Controllers\CourseController::class, 'update'])->name('coursesUpdate');
    Route::delete('/courses/{id}/delete', [\App\Http\Controllers\CourseController::class, 'destroy'])->name('deleteCourse');


});

Route::view('/about','about_us')->name('about');
Route::group(['prefix'=>'courses','middleware'=>'auth'],function(){

    Route::get('/get-courses',[\App\Http\Controllers\CourseController::class,'index'])->name('getCourses');
    Route::get('/show/course/{id}',[\App\Http\Controllers\CourseController::class,'showCourseDetails'])->name('courseDetails');
    Route::post('/courses/{id}/enroll', [\App\Http\Controllers\CourseUserController::class, 'enroll'])
        ->name('coursesEnroll');
    Route::get('/related-courses',[\App\Http\Controllers\CourseUserController::class,'relatedCourses'])->name('relatedCourses');
});
Route::view('/unathrized-action','unathrized')->name('unathrized');

Route::group(['prefix'=>'courses','middleware' => ['auth', 'check_admin:admin']],function(){
    Route::get('/form-material/{id}',[\App\Http\Controllers\materailCourse::class,'create'])->name('formMaterial');

    Route::post('/create-material',[\App\Http\Controllers\materailCourse::class,'store'])->name('createMaterial');
    Route::get('/all-material',[\App\Http\Controllers\materailCourse::class,'index'])->name('allMaterial');
    Route::get('/edit-material/{id}',[materailCourse::class,'edit'])->name('editMaterial');
    Route::post('/update-material/{id}',[materailCourse::class,'update'])->name('updateMaterial');
    Route::post('/delete-material/{id}',[materailCourse::class,'destroy'])->name('deleteMaterial');
});
Route::group(['prefix'=>'comment','middleware' => 'auth'],function(){
    Route::get('/get-comment',[\App\Http\Controllers\CommentController::class,'index'])->name('getComment');
    Route::post('/store-comment',[\App\Http\Controllers\CommentController::class,'store'])->name('storeComment');

});
Route::group(['prefix'=>'comment','middleware' => ['auth', 'check_admin:admin']],function(){
    Route::get('all-comments-admin',[\App\Http\Controllers\CommentController::class,'allCommentsForAdmin'])->name('allCommentsAdmin');
    Route::get('edit-comment/{id}',[\App\Http\Controllers\CommentController::class,'edit'])->name('editComment');
    Route::post('update-comment/{id}',[\App\Http\Controllers\CommentController::class,'update'])->name('updateComment');
    Route::post('delete-comment/{id}',[\App\Http\Controllers\CommentController::class,'destroy'])->name('deleteComment');


});


