<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\App;
use App\Http\Resources\UserResource;
use App\Models\User;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth') ;

Route::get('/',[HomeController::class,'redirect']);

Route::get('/index',[HomeController::class,'redirect']);



##### Admin Show Tables Details Page #####
Route::get('/showtableWithSlug/{table}',[AdminController::class,'showtableWithSlug']);

##### Admin Add Into Form #####
Route::get('/addIntoTableWithSlug_form/{table}',[AdminController::class,'addIntoTableWithSlug_form']);

##### Admin Upload into #####
Route::post('/uploadIntoTablewithSlug/{table}',[AdminController::class,'uploadIntoTablewithSlug']);

##### Admin Delete From Tables #####
Route::get('/DleteFromTablesWithSlug/{table}',[AdminController::class,'DleteFromTablesWithSlug']);

##### Admin Update From Tables Form #####
Route::get('/updateFromTableswithslug_form/{table}',[AdminController::class,'updateFromTableswithslug_form']);

##### Admin Do Update Update From Tables Form #####
Route::post('/doUpdateFromTablesWithSlug/{table}',[AdminController::class,'doUpdateFromTablesWithSlug']);


##### Admin Show Tables Details Page #####
Route::get('/showtable/{table}',[AdminController::class,'showtable']);

##### Admin Add Into Form #####
Route::get('/addIntoTable_form/{table}',[AdminController::class,'addIntoTable_form']);

##### Admin Upload into #####
Route::post('/uploadIntoTable/{table}',[AdminController::class,'uploadIntoTable']);

##### Admin Update From Categories Tables Form #####
Route::get('/updateFromTable_form/{table}',[AdminController::class,'updateFromTable_form']);

##### Admin Do Update Update From Tables Form #####
Route::post('/doUpdateFromTable/{table}',[AdminController::class,'doUpdateFromTable']);

##### Admin Delete From Tables Category #####
Route::get('/DleteFromTable/{table}',[AdminController::class,'DleteFromTable']);


##### Admin Show Tables Details Page #####
Route::get('/tables_category/{table}',[AdminController::class,'tables_category']);

##### Admin Add Into Form #####
Route::get('/addIntoTableCategory_form/{table}',[AdminController::class,'addIntoTableCategory_form']);

##### Admin Upload into #####
Route::post('/uploadIntoCategoryTable/{table}',[AdminController::class,'uploadIntoCategoryTable']);

##### Admin Update From Categories Tables Form #####
Route::get('/updateFromCategoryTables_form/{table}',[AdminController::class,'updateFromCategoryTables_form']);

##### Admin Do Update Update From Tables Form #####
Route::post('/doUpdateCategoryTable/{table}',[AdminController::class,'doUpdateCategoryTable']);

##### Admin Delete From Tables Category #####
Route::get('/DleteFromTables_category/{table}',[AdminController::class,'DleteFromTables_category']);


Route::get('/has_one',[AdminController::class,'has_one']);


##### Admin Show Users Page #####
Route::get('/showusers',[AdminController::class,'showusers']);

##### Admin Delete From Users #####
Route::get('/Delete_user/{id}',[AdminController::class,'Delete_user']);

##### Admin Show Products Page #####
Route::get('/showproducts',[AdminController::class,'showproducts']);

##### Admin Approve Product #####
Route::get('/approveproduct/{id}',[AdminController::class,'approveproduct']);

##### Admin Approve Product #####
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);

##### Admin Update Product From #####
Route::get('/updateproduct/{id}',[AdminController::class,'updateproduct']);

##### Admin Do Update Product #####
Route::post('/do_update_product/{id}',[AdminController::class,'do_update_product']);

##### Admin Add Product From #####
Route::get('/addProduct_form',[AdminController::class,'addProduct_form']);

##### Admin Add Product #####
Route::post('/upload_product',[AdminController::class,'upload_product']);

##### Admin Show messages Page #####
Route::get('/messages',[AdminController::class,'messages']);

##### Admin Delete From Messages #####
Route::get('/DleteMessage/{id}',[AdminController::class,'DleteMessage']);



####
####
####
####
####
####


##### User Show Product Detail Page #####
Route::get('/details/{slug}',[HomeController::class,'details']);

##### User Show Cars List Page #####
Route::get('/cars_list',[HomeController::class,'cars_list']);

##### User Search Cars #####
Route::get('/search_cars',[HomeController::class,'search_cars']);

##### User Show Categories List Page #####
Route::get('/categories_list/{category}',[HomeController::class,'categories_list']);

##### User Search Categories #####
Route::get('/search_category',[HomeController::class,'search_category']);

################### Index Search ################

##### User indexSearcCar #####
Route::post('/indexSearchCars',[HomeController::class,'indexSearchCars']);

##### User Categories List Parts Search #####
Route::post('/indexSearchParts',[HomeController::class,'indexSearchParts']);

##### User Categories List Electronics Search #####
Route::post('/indexSearchElectronics',[HomeController::class,'indexSearchElectronics']);

##### User Categories List Estate Search #####
Route::post('/indexSearchEstate',[HomeController::class,'indexSearchEstate']);

##### User Categories List Trailer Search #####
Route::post('/indexSearchTrailer',[HomeController::class,'indexSearchTrailer']);

##### User Categories List Yachts Search #####
Route::post('/indexSearchYachts',[HomeController::class,'indexSearchYachts']);

##### User Categories List Caravans Search #####
Route::post('/indexSearchCaravans',[HomeController::class,'indexSearchCaravans']);

################### End Index Search ################

##### User Add To Wishlist Page #####
Route::get('/addToWishlist/{slug}',[HomeController::class,'addToWishlist']);

##### User Show My Favorite Page #####
Route::get('/favorite_page',[HomeController::class,'favorite_page']);

##### User Add AD Page #####
Route::get('/add_ad_page',[HomeController::class,'add_ad_page']);

##### User upload AD #####
Route::post('/upload_AD',[HomeController::class,'upload_AD']);

##### User Show My Ads Page #####
Route::get('/my_ads',[HomeController::class,'my_ads']);

##### User pricing #####
Route::get('/pricing',[HomeController::class,'pricing']);

##### User cars Show details #####
Route::get('/carsShow_details',[HomeController::class,'carsShow_details']);

##### User Contact #####
Route::get('/contact_us',[HomeController::class,'contact_us']);

##### User upload Contact #####
Route::post('/uploadContact',[HomeController::class,'uploadContact']);

##### User Show cars With Origin #####
Route::get('/carsOrigin/{slug}',[HomeController::class,'carsOrigin']);



Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});


