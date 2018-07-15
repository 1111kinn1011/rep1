<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function(){return view('main');});
//tmp
// Route::get('/', function(){return view('AdminHome');});

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/home', function () {
        if(Auth::user()->type == 'student'){
            $loggedIn['users'] = \App\User::find(Auth::user()->id);
            return view('student.StudentHome')->with('loggedIn', $loggedIn);
        }else if(Auth::user()->type == 'teacher'){
            return view('teacher.TeacherHome');
        }else if(Auth::user()->type == 'admin'){
            //return \App\User::all();
            return view('admin.AdminHome');
        }
    });
    Route::get('addNewTeacher', function(){
        if(Auth::user()->type == 'admin'){
            //return \App\User::all();
            return view('admin.AddNewTeacher');
        }
    });
    Route::resource('account','AccountController');
});
