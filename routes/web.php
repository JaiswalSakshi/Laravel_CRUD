<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user guest show

Route::get('/showGuestProfile',[UserController::class,'showGuestProfile']);
Route::get('/updateProfile',[UserController::class,'editProfile']);
Route::post('/updateUserProfile',[UserController::class,'updateProfile']);



// user
Route::get('/showuser',[UserController::class,'show']);
Route::get('/addUser',[UserController::class,'adduser']);
Route::post('/addUser_insert',[UserController::class,'addUserinsert']);
Route::get('/edituser/{id}',[UserController::class,'edit']);
Route::post('/editUser_update',[UserController::class,'update']);
Route::get('/delete/{id}',[UserController::class,'delete']);
// Categorie
Route::get('/showCategorie',[CategorieController::class,'show']);
Route::get('/addCategorie',[CategorieController::class,'add']);
Route::post('/addCategorie_insert',[CategorieController::class,'addCategorie']);
Route::get('/editCategorie/{id}',[CategorieController::class,'edit']);
Route::post('/editCategorie_update',[CategorieController::class,'update']);
Route::get('/deleteCategorie/{id}',[CategorieController::class,'delete']);
//Role
Route::get('/showRole',[RoleController::class,'show']);
Route::get('/addRole',[RoleController::class,'add']);
Route::post('/addRole_insert',[RoleController::class,'addRole']);
Route::get('/editRole/{id}',[RoleController::class,'edit']);
Route::post('/editRole_update',[RoleController::class,'update']);
Route::get('/deleteRole/{id}',[RoleController::class,'delete']);
// Product
Route::get('/showProduct',[ProductController::class,'show']);
Route::get('/addProduct',[ProductController::class,'add']);
Route::get('/addProduct',[ProductController::class,'cat']);
Route::post('/addProduct_insert',[ProductController::class,'addProduct']);
Route::get('/editProduct/{id}',[ProductController::class,'edit']);
Route::post('/editProduct_update',[ProductController::class,'update']);
Route::get('/deleteProduct/{id}',[ProductController::class,'delete']);
