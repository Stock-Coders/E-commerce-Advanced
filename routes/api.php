<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\CategoryApiController;
use App\Http\Controllers\dashboard\SubCategoryApiController;
use App\Http\Controllers\dashboard\ProductApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Category Api Controller
// Get All Category Api
Route::get('/categories' , [CategoryApiController::class , 'getCategories']);
// Save New  Api Category
Route::post('/categories' , [CategoryApiController::class , 'storeCategory']);
//update Category Api
Route::put('/categories' , [CategoryApiController::class , 'updateCategory']);
// delete Category Api
Route::delete('/categories' , [CategoryApiController::class , 'deleteCategory']);
// SubCategory Controller Api
//get All SubCategory
Route::get('/subcategories' , [SubCategoryApiController::class , 'getSubCategories']);
//Save SubCategory Api
Route::post('/subcategories' , [SubCategoryApiController::class , 'storeSubCategory']);
//Update SubCategory Api
Route::put('/subcategoryies' , [SubCategoryApiController::class , 'updateSubCategory']);
//delete SubCategory Api
Route::delete('/subcategories' , [SubCategoryApiController::class , 'deleteSubCategory']);
//------------------------------------------------------------------------------------------
//--------------->Product Api Controller
// Get All Products  Api (Index)
Route::get('/products' , [ProductApiController::class , 'getProducts']);
//Get All Delete Products  Api (Delete)
Route::get('/product/delete' , [ProductApiController::class , 'getDeletedProducts']);
//get Single Products  (Show)
Route::get('/products/{id}' , [ProductApiController::class , 'getProduct']);
//save New Product
Route::post('/products' , [ProductApiController::class , 'storeProduct']);
// Update Product Api
Route::put('/products/{id}' ,[ProductApiController::class ,'updateProduct']);
//Delete Api Product
Route::delete('/products/{id}',[ProductApiController::class,'deleteProduct']);
//restore Products Api
Route::get('/product/restore/{id}' , [ProductApiController::class , 'restoreProduct']);
//force Or Permanent Delete Api
Route::any('/product/forceDelete/{id}' , [ProductApiController::class , 'forceDeleteProduct']);
