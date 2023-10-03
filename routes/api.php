<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ApiControllers\{
    CategoryApiController, SubCategoryApiController,
    ProductApiController, RatingApiController
};
use App\Models\Category;

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

Route::prefix('dashboard')->group(function () {
        //Category Api Controller
    // Get All Category Api
    Route::get('/categories' , [CategoryApiController::class , 'getCategories']);
    //Route Delete All Category
    Route::get('/category/delete' , [CategoryApiController::class , 'getDeletedCategories']);
    // Save New  Api Category
    Route::post('/categories' , [CategoryApiController::class , 'storeCategory']);
    //update Category Api
    Route::put('/categories/{id}' , [CategoryApiController::class , 'updateCategory']);
    // delete Category Api
    Route::delete('/categories/{id}' , [CategoryApiController::class , 'deleteCategory']);
    //restore Categories
    Route::get('/category/restore/{id}' , [CategoryApiController::class , 'restoreCategory']);
    //force Or Permanent Delete Api
    Route::any('/category/forceDelete/{id}' , [CategoryApiController::class , 'forceDeleteCategory']);
    // SubCategory Controller Api
    //get All SubCategory
    Route::get('/subcategories' , [SubCategoryApiController::class , 'getSubCategories']);
    //Get All Delete subCategory  Api
    Route::get('/subcategory/delete' , [SubCategoryApiController::class , 'getDeletedSubCategories']);
    //Save SubCategory Api
    Route::post('/subcategories' , [SubCategoryApiController::class , 'storeSubCategory']);
    //Update SubCategory Api
    Route::put('/subcategories/{id}' , [SubCategoryApiController::class , 'updateSubCategory']);
    //delete SubCategory Api
    Route::delete('/subcategories/{id}' , [SubCategoryApiController::class , 'deleteSubCategory']);
    //restore Categories
    Route::get('/subcategory/restore/{id}' , [SubCategoryApiController::class , 'restoreCategory']);
    //force Or Permanent Delete Api
    Route::any('/subcategory/forceDelete/{id}' , [SubCategoryApiController::class , 'forceDeleteCategory']);
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

    // Get All Ratings  Api
    Route::get('/ratings' , [RatingController::class , 'getRatings']);
    //Delete Api Rating
    Route::delete('/ratings/{id}',[RatingController::class,'deleteRating']);

});

