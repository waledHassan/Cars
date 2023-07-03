<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckPassword;
use App\Models\Products;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['checkPassword', 'changeLang'])->group(function () {
    
    Route::post('/AllProducts',[ApiController::class,'AllProducts']);
    Route::post('/getProductsByID',[ApiController::class,'getProductsByID']);
    Route::post('/updateProduct',[ApiController::class,'updateProduct']);
    Route::post('/deleteProduct',[ApiController::class,'deleteProduct']);

    // Route::post('/getCategoryByID',[ApiController::class,'getCategoryByID']);
    // Route::post('/getCategories',[ApiController::class,'getCategories']);
    // Route::post('/getProducts/{id?}',[ApiController::class,'getProducts']);

});

// Route::get('/testapi', function(){
//     return 'api called';
// })->middleware('auth:sanctum');

// Route::post('/register',[AuthController::class,'register']);
// Route::post('/Login',[AuthController::class,'Login']);