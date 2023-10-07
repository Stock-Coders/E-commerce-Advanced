<?php
// Website Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\{MainController,
    ProductsController, WishlistController, ProfileController,
    ContactController};
// Dashboard Controllers
use App\Http\Controllers\dashboard\{DashboardMainController,
    CategoryController, SubCategoryController, ProductController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Auth::routes();
//Website MainController
// Home Page (guest is allowed to access)
Route::get('/',[MainController::class, 'home'])->name('home-ancor'); // ancor Navbar
// Home WebSite Auth (guest is not allowed to access)
Route::get('/home', [App\Http\Controllers\website\HomeController::class, 'index'])->name('home');
//About Page
Route::get('/about' , [MainController::class, 'about'])->name('about');
//contact Page
Route::get('/contact' , [MainController::class, 'contact'])->name('contact');
Route::post('/contact' , [ContactController::class, 'store'])->name('contact.store');
//cart page
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
//profile Page
Route::get('/profile' , [MainController::class], 'profile')->name('profile');
//search Page
Route::get('/search' , [MainController::class, 'search'])->name('search');
//thankyou Page
Route::get('/thank-you' , [MainController::class, 'thankYou'])->name('thank-you');
//checkout Page
Route::get('/checkout' , [MainController::class, 'checkout'])->name('checkout');
//categories Page
Route::get('/categories', [MainController::class, 'category'])->name('category');
//shop Page
Route::get('/shop',[ProductsController::class , 'shop'])->name('shop');
//wishlist routes
Route::get('/wishlist',[MainController::class,'wishlist'])->middleware(['auth', 'wishlist'])->name('wishlist'); //wishlist middleware works for "customer" only!
Route::post('/wishlist/submit/{id}',[WishlistController::class , 'addWishlist'])->name('addWishlist');
Route::delete('/wishlist', [WishlistController::class,'clearProducts'])->name('clearWishlist');
Route::delete('/wishlist/{id}', [WishlistController::class,'destroy'])->name('deleteWishlist');
//Rating store
Route::post('/rating/submit/{id}',[App\Http\Controllers\website\RatingController::class , 'addRating'])->name('addRating');
//profile Pages
Route::get('/profile/{id}', [ProfileController::class , 'showProfile'])->name('showProfile');
Route::get('/profile/{id}/edit', [ProfileController::class , 'editProfile'])->name('editProfile');
Route::patch('/profile/{id}/update', [ProfileController::class , 'updateProfile'])->name('updateProfile');
//*****-------------------- START dashboard/admin route. --------------------*****//
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');

        Route::resource('/categories', CategoryController::class);
        Route::delete('/category-products/delete/{id}',[CategoryController::class , 'clearProducts'])->name('categoriesProducts.clear'); //Route Function Clear All Products that belongs to a specific Category by id
        Route::get('/category/delete',[CategoryController::class , 'delete'])->name('categories.delete');  //Route Function softDelete Category
        Route::get('/category/restore/{id}',[CategoryController::class , 'restore'])->name('categories.restore');  //Route Function restore
        Route::delete('/category/forceDelete/{id}',[CategoryController::class , 'forceDelete'])->name('categories.forceDelete');  //Route Function forceDelete

        Route::resource('/subcategories', SubCategoryController::class);
        Route::delete('/subcategory-products/delete/{id}',[SubCategoryController::class , 'clearProducts'])->name('subcategoriesProducts.clear'); //Route Function Clear All Products that belongs to a specific Sub Category by id
        Route::get('/subcategory/delete',[SubCategoryController::class , 'delete'])->name('subcategories.delete');  //Route Function softDelete Category
        Route::get('/subcategory/restore/{id}',[SubCategoryController::class , 'restore'])->name('subcategories.restore');  //Route Function restore
        Route::delete('/subcategory/forceDelete/{id}',[SubCategoryController::class , 'forceDelete'])->name('subcategories.forceDelete');  //Route Function forceDelete

        Route::resource('/products', ProductController::class);
        Route::get('/product/delete',[ProductController::class , 'delete'])->name('products.delete');  //Route Function softDelete Category
        Route::get('/product/restore/{id}',[ProductController::class , 'restore'])->name('products.restore');  //Route Function restore
        Route::delete('/product/forceDelete/{id}',[ProductController::class , 'forceDelete'])->name('products.forceDelete');  //Route Function forceDelete

        Route::get('/contacts',[App\Http\Controllers\dashboard\ContactController::class , 'index'])->name('contacts.index');
        Route::get('/contacts/{id}',[App\Http\Controllers\dashboard\ContactController::class , 'show'])->name('contacts.show');
        Route::delete('/contact/delete/{id}',[App\Http\Controllers\dashboard\ContactController::class , 'destroy'])->name('contacts.destroy');

        Route::get('/ratings',[App\Http\Controllers\dashboard\RatingController::class , 'index'])->name('ratings.index');
        Route::get('/ratings/{id}',[App\Http\Controllers\dashboard\RatingController::class , 'show'])->name('ratings.show');
        Route::delete('/rating/delete/{id}',[App\Http\Controllers\dashboard\RatingController::class , 'destroy'])->name('ratings.destroy');
    });
});
//*****-------------------- END dashboard/admin route. --------------------*****//
