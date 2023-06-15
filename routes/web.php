<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\staffsController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\membersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return "Save Myanmar";
});

Route::get("/sayar",function(){
    return "Hay,Sayar Nay Kaung Lar ??";
});

Route::get("sayhi",function(){
    return "Hi Min Ga Lar Par";
});

// Route::get('about',function(){
//     return view("aboutme");
// });

// (or)

Route::view("about","aboutme");

// Route::get("about/company",function(){
//     return view('aboutcompany');
// });

// (or)

Route::view('about/company','aboutcompany');


// Route::get('contact',function(){
//     return redirect('about');
// });

Route::redirect('contact','about/company');

Route::get('about/company/{staff}',function($staff){
    return view('aboutcompanystaff',['sf'=>$staff]);
});


Route::get('about/company/{staff}/{city}',function($staff,$city){
	return view('aboutcompanystaffbycity',['sf'=>$staff,'ct'=>$city]);
});


Route::get('profile',function(){
    return view('profileme');
})->name('profiles');



// Route::get('/students',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// Route::get('/students/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// Route::get('/students/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');

// Route::group(['prefix'=>'students'],function(){
//     Route::get('/',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
//     Route::get('/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
//     Route::get('/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');
// });

Route::name('students.')->group(function(){
    Route::get('/students',[studentsController::class,'index'])->name('index');
    Route::get('/students/show',[studentsController::class,'show'])->name('show');
    Route::get('/students/edit',[studentsController::class,'edit'])->name('edit');
});


// 27GP

Route::get('/staffs',[staffsController::class,'home'])->name('staffs.home');
Route::get('/staffsparty',[staffsController::class,'party'])->name('staffs.party');
Route::get('/staffsparty/{total}',[staffsController::class,'partytotal'])->name('staffs.total');
Route::get('staffsparty/{total}/{status}',[staffsController::class,'partytotalconfirm'])->name('staffs.status');


Route::get('employees',[employeesController::class,'index'])->name('employee.index');
Route::get('employees/show',[employeesController::class,'show'])->name('employees.show');
Route::get('/employees/passingdataone',[employeesController::class,'passingdataone'])->name('employees.passingdataone');
Route::get('/employees/passingdatatwo',[employeesController::class,'passingdatatwo'])->name('employees.passingdatatwo');
Route::get('/employees/passingdatathree',[employeesController::class,'passingdatathree'])->name('employees.passingdatathree');
Route::get('/employees/passingdatafour',[employeesController::class,'passingdatafour'])->name('employees.passingdatafour');
Route::get('employees/edit',[employeesController::class,'edit'])->name('employees.show');
Route::get('employees/update',[employeesController::class,'update'])->name('employees.update');



Route::get('/dashboards',[dashboardsController::class,'index'])->name('dashboards.index');
Route::get('/members',[membersController::class,'index'])->name('members.index');

// 11YI

// 794774518 


