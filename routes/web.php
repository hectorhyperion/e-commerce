<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class ,'index']);
//view Route
Route::get('/Register', [PagesController::class, 'register'])->middleware('guest');
Route::get('/Login', [PagesController::class, 'login'])->name('login')->middleware('guest');
Route::get('/Contact', [PagesController::class, 'contact'])->middleware('auth');
Route::get('/admin/Index',[PagesController::class, 'adminIndex'])->middleware('auth');
Route::get('/users/dashboard',[PagesController::class, 'dashboard'])->middleware('auth');
//category view
Route::get('/Category', [PagesController::class ,'category'])->middleware('auth');
//save category
Route::post('/add-category', [AdminController::class,'addcategory'])->middleware('auth');
//edit category
Route::get('/category_edit/{id}',[PagesController::class, 'categoryEdit'])->middleware('auth');
//store updated category
Route::post('/storeCategory/{id}', [AdminController::class, 'storeCategory'])->middleware('auth');

//delete category
Route::get('/category_delete/{id}', [AdminController::class, 'categoryDelete'])->middleware('auth');
//storing data user auth data
Route::post('/store',[UserController::class, 'store']);
Route::post('/verify', [UserController::class, 'verify']);
Route::get('/logout',[UserController::class , 'logout'])->middleware('auth');
//adding product from admin page
Route::get('/addProduct',[PagesController::class, 'addProduct'])->middleware('auth');
Route::post('/productStore',[AdminController::class, 'productStore'])->middleware('auth');
//show all product from db
Route::get('/showProduct',[PagesController::class,'showProduct'])->middleware('auth');
//Edit products
Route::get('/product_edit/{id}',[PagesController::class,"editProduct"])->middleware('auth');
//store edit product
Route::post('/storeEditProducts/{id}',[AdminController::class,'storeEditProducts'])->middleware('auth');
//delete product
Route::get('/product_delete/{id}',[AdminController::class,'deleteProduct'])->middleware('auth');
//passing product to view
Route::get('/product', [PagesController::class, 'product']);
Route::get('/product/listings/{id}', [PagesController::class, 'productlistings']);
Route::get('/prodcut/category/{category_name}', [PagesController::class, 'navCategory']);

//adding to cart
Route::post('/addCart/{id}', [PagesController::class, 'addCart'])->middleware('auth');
//showing cart
Route::get('/show/Cart', [PagesController::class, 'showCart'])->middleware('auth');
Route::get('/remove/cart/{id}',[PagesController::class, 'RemoveCart'])->middleware('auth');
//payment method
Route::get('/cashOrder', [DashboardController::class,'cashOrder'])->middleware('auth');
//pay using stripe method
Route::get('/payWithCard/{totalprice}', [DashboardController::class, 'payWithCard'])->middleware('auth');
Route::post('stripe/{totalprice}',[DashboardController::class ,'stripePost'])->name('stripe.post')->middleware('auth');

//passing order to admin
Route::get('/admin/order',[AdminController::class, 'userOrder'])->middleware('auth');
//delivery status
Route::get('/delivered/{id}', [AdminController::class,'deliver'])->middleware('auth');
//print pdf
Route::get('/printpdf{id}', [AdminController::class, 'printpdf'])->middleware('auth');
//send email
Route::get('/SendEmail{id}', [AdminController::class, 'sendEmail'])->Middleware('auth');
//send user notification
Route::post('sendUserEmail{id}', [AdminController::class, 'sendUserEmail'])->middleware('auth');
//verfication
Route::group(['middleware'=>['auth']],function(){
    /**
     * verfication Routes
     */
    Route::get('/email/verify',[VerificationController::class,'show'])->name('verification.notice');
    Route::get('/emai/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend',[VerificationController::class, 'resend'])->name('verification.resend');
    });
    //only authenticated can access this group
    Route::group(['middleware' => ['auth']], function() {
        //only verified account can access with this group
        Route::group(['middleware' => ['verified']], function() {
                /**
                 * Dashboard Routes
                 */
                Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('users.dashboard');
        });
    });
    //search
    Route::get('/search', [AdminController::class, 'search'])->middleware('auth');
    //show user order
    Route::get('/showUserOrder',[DashboardController::class, 'showUserOrder'])->middleware('auth');
    Route::get('/cancelOrder/{id}',[DashboardController::class , 'cancelOrder'])->middleware('auth');
//add comments
Route::post('/comment', [DashboardController::class, 'comment'])->middleware('auth');
Route::post('/replyComment', [DashboardController::class, 'replyComment'])->middleware('auth');
