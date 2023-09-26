<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\subCategoryApiController;
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
Route::get('/subcategories' , [subCategoryApiController::class , 'getSubCategories']);
//Save SubCategory Api
Route::post('/subcategories' , [subCategoryApiController::class , 'storeSubCategor']);
//Update SubCategory Api
Route::put('/subcategoryies' , [subCategoryApiController::class , 'updateSubCategory']);
//delete SubCategory Api
Route::delete('/subcategories' , [subCategoryApiController::class , 'deleteSubCategory']);
