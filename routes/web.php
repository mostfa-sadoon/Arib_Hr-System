<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\{AuthController,HomeController,DepartmentController,TaskStatusController,TaskController,EmployeeController};


Route::controller(AuthController::class)->group(function(){
    Route::get('/','index')->name('system.login.index');
    Route::post('/login/submit','login')->name('system.login.submit');

});

Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::middleware(['auth'])->group(function () {

        Route::controller(AuthController::class)->group(function(){
            Route::post('/logout','logout')->name('system.logout');
            Route::get('profile','profile')->name('system.profile');   //
            Route::post('profile/update','update')->name('system.profile.update');
            Route::post('profile/update/password','updatePassword')->name('system.update.password');
        });

        Route::controller(HomeController::class)->group(function(){
            Route::get('/home','index')->name('system.home');
        });

        Route::controller(DepartmentController::class)->group(function(){   //
            Route::get('/department','index')->name('system.department');
            Route::post('/department/store/','store')->name('system.department.store');
            Route::post('/department/delete/','delete')->name('system.department.delete');
            Route::post('/department/update/','update')->name('system.department.update');
            Route::get('/department/show/{id}','show')->name('system.department.show');
            Route::get('/department/edit/{id}','edit')->name('system.department.edit');
        });

        Route::resources([
            'task_statuses' => TaskStatusController::class,
            'tasks' => TaskController::class,
            'employees' => EmployeeController::class,
        ]);


        Route::controller(TaskStatusController::class)->group(function(){   //
            Route::post('/task_statuses/delete/','delete')->name('task_statuses.delete');
        });

        Route::controller(TaskController::class)->group(function(){   //
            Route::post('/task/delete/','delete')->name('task.delete');
        });


    });

});







// Route::get('/', function () {
//     return view('welcome');
// });
