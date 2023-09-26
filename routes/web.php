<?php
// Website Controllers
use App\Http\Controllers\website\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\MainController;
use App\Http\Controllers\website\ProfileController;
// Dashboard Controllers
use App\Http\Controllers\dashboard\DashboardMainController;
use App\Http\Controllers\dashboard\CategoryController;

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
//cart page
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
//profile Page
Route::get('/profile' , [MainController::class], 'profile')->name('profile');
//search Page
Route::get('/search' , [MainController::class, 'search'])->name('search');
//wishlist Page
Route::get('/wishlist',[MainController::class,'wishlist'])->name('wishlist');
//thankyou Page
Route::get('/thank-you' , [MainController::class, 'thankYou'])->name('thank-you');
//checkout Page
Route::get('/checkout' , [MainController::class, 'checkout'])->name('checkout');
Route::get('/categories', [MainController::class, 'category'])->name('category');
//*****-------------------- START Products Controller  route. --------------------*****//
Route::get('/shop',[ProductsController::class , 'shop'])->name('shop');
//*****-------------------- START Profile Controller  route. --------------------*****//
Route::get('/profile/{id}', [ProfileController::class , 'showProfile'])->name('showProfile');
Route::get('/profile/{id}/edit', [ProfileController::class , 'editProfile'])->name('editProfile');
Route::patch('/profile/{id}/update', [ProfileController::class , 'updateProfile'])->name('updateProfile');
//*****-------------------- START dashboard/admin route. --------------------*****//
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {
    Route::prefix('dashboard')->group(function () {
        //---------------- START dashboard home route ----------------//
        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');

        //---------------- END dashboard home route ----------------//
        //---------------- START Categories Routes   ----------------//
        Route::resource('/categories', CategoryController::class);
        Route::delete('/category-products/delete/{id}',[CategoryController::class , 'clearProducts'])->name('categoriesProducts.clear'); //Route Function Clear All Products that belongs to a specific Category by id
        Route::get('/category/delete',[CategoryController::class , 'delete'])->name('categories.delete');  //Route Function softDelete Category
        Route::get('/category/restore/{id}',[CategoryController::class , 'restore'])->name('categories.restore');  //Route Function restore
        Route::delete('/category/forceDelete/{id}',[CategoryController::class , 'forceDelete'])->name('categories.forceDelete');  //Route Function forceDelete
        //---------------- END Categories Routes   ----------------//
    });
});
//*****-------------------- END dashboard/admin route. --------------------*****//
