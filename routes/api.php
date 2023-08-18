<?php
use App\Http\Controllers\FavouriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GoogleController;


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

Route::group(['middleware' => ['web']], function () {
    //via google
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

});

Route::post('password/email', [AuthController::class, 'userForgotPassword']);
Route::post('password/code/check', [AuthController::class,'userCheckCode']);
Route::post('password/reset', [AuthController::class,'userResetPassword']);

//Routes Only Accessed By Admin
Route::group(['middleware'=>['auth:api','admin:api']],function(){
    //Categories Edit
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    //Add item To Menu
    Route::post('/menu', [MenuController::class, 'addItem']);
    Route::put('/menu/{item}', [MenuController::class, 'editPrice']);
});

//Routes Only For Authenticated Users
Route::group(['middleware' => ['auth:api']],function(){
    //Logout For Admin And User
    Route::post('/logout',[AuthController::class, 'Logout']);
    //Get All Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    //Show All Menu
    Route::get('/menu', [MenuController::class, 'showMenu']);
    //favourite
    Route::group(['prefix' => 'favourite'],function(){
        Route::get('show/{id}',[FavouriteController::class, 'show']);
        Route::get('index',[FavouriteController::class, 'index']);
        Route::post('store',[FavouriteController::class, 'store']);
        Route::post('delete/{id}',[FavouriteController::class, 'destroy']);

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
