<?php
<<<<<<< HEAD
use App\Http\Controllers\FavouriteController;
=======

>>>>>>> project1/main
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
<<<<<<< HEAD
use App\Http\Controllers\GoogleController;


=======
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VisitorController;


use App\Http\Controllers\OrderController;

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\feedbacksController;
>>>>>>> project1/main
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
//Register For User
Route::post('user/register',[AuthController::class, 'userRegister']);

//Login For Admin And User
Route::post('/login',[AuthController::class, 'Login']);

<<<<<<< HEAD
Route::group(['middleware' => ['web']], function () {
    //via google
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

});

Route::post('password/email', [AuthController::class, 'userForgotPassword']);
Route::post('password/code/check', [AuthController::class,'userCheckCode']);
Route::post('password/reset', [AuthController::class,'userResetPassword']);

=======
>>>>>>> project1/main
//Routes Only Accessed By Admin
Route::group(['middleware'=>['auth:api','admin:api']],function(){
    //Categories Edit
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    //Add item To Menu
    Route::post('/menu', [MenuController::class, 'addItem']);
<<<<<<< HEAD
    Route::put('/menu/{item}', [MenuController::class, 'editPrice']);
=======
    //Remove item from Menu
    Route::Delete('/menu/{item}', [MenuController::class, 'deleteItem']);
    //edit price of the item
    Route::put('/menu/{item}', [MenuController::class, 'editPrice']);
    //Remove Discount from item
    Route::put('/menu/discount/{item}', [MenuController::class, 'removeDiscount']);
    //Apply Discount for item
    Route::post('/menu/discount/{item}', [MenuController::class, 'addDiscount']);
    //hide item from the menu
    Route::put('/menu/hide/{item}', [MenuController::class, 'toggleVisibility']);
    //get all tables
    Route::get('/tables', [\App\Http\Controllers\TableController::class, 'index']);
    //create new table
    Route::post('/tables', [\App\Http\Controllers\TableController::class, 'create']);
    //update availability of the table
    Route::put('/tables/{table}', [\App\Http\Controllers\TableController::class, 'toggleAvailability']);
    //delete table
    Route::delete('/tables/{table}', [\App\Http\Controllers\TableController::class, 'delete']);
    //get all appointments for admin
    
>>>>>>> project1/main
});

//Routes Only For Authenticated Users
Route::group(['middleware' => ['auth:api']],function(){
    //Logout For Admin And User
    Route::post('/logout',[AuthController::class, 'Logout']);
    //Get All Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    //Show All Menu
    Route::get('/menu', [MenuController::class, 'showMenu']);
<<<<<<< HEAD
    //favourite
=======
    //get all tables
    Route::get('/tables', [\App\Http\Controllers\TableController::class, 'index']);
    //show table Reservations
    Route::get('/tables/{table}', [\App\Http\Controllers\TableController::class, 'getReservations']);
    //take an appointment
    Route::post('/appointment',[AppointmentController::class,'takeAppointmet']);
    //show appointmets for authenticated user
    Route::get('/appointment',[AppointmentController::class,'userAppointments']);
    //cancel appointment
    Route::Delete('/appointment/{appointment}',[AppointmentController::class,'cancelAppointment']);
    //make visit
    Route::post('/visit',[VisitorController::class,'makeVisit']);

>>>>>>> project1/main
    Route::group(['prefix' => 'favourite'],function(){
        Route::get('show/{id}',[FavouriteController::class, 'show']);
        Route::get('index',[FavouriteController::class, 'index']);
        Route::post('store',[FavouriteController::class, 'store']);
        Route::post('delete/{id}',[FavouriteController::class, 'destroy']);
<<<<<<< HEAD

    });


    //
    Route::post('/menu/feedback', [MenuController::class, 'submitFeedback'])->name('api.menu.feedback.submit');
    //Rating
    Route::post('rating/{id}',[AuthController::class, 'rate']);
    Route::post('favourite/show',[AuthController::class, 'rate']);
    //search by name
    Route::get('SrchByName/{name}',[AuthController::class, 'search_by_name']);
    //forgot, reset,check
    });








//Reset_check_forget routes
=======
    
    });
    Route::get('SrchByName/{name}',[AuthController::class, 'search_by_name']);
    Route::post('rating/{id}',[AuthController::class, 'rate']);
});

################## Order Apis ###################
Route::get('/getAllOrdes', [OrderController::class, 'index']);
Route::post('/createOrde', [OrderController::class, 'create']);
Route::get('/showOrde/{orderId}', [OrderController::class, 'show']);
Route::post('/updateOrde/{orderId}', [OrderController::class, 'update']);
////////////////////////////////////////////////////////////////////////////
Route::post("/add/feedback",[feedbacksController::class,"add"]);
Route::post("/edit/feedback",[feedbacksController::class,"modify"]);
Route::post("/del/feedback",[feedbacksController::class,"add"]);
//////////////////////////////////////////////////////
>>>>>>> project1/main
