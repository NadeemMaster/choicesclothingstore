<?php


use App\Http\Livewire\Products\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\CustomerController;


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



Route::controller(HomeController::class)->group(function () {
    
    Route::get('/', 'index')->name('index');
    Route::get('/aboutus', 'about')->name('aboutus');
    Route::get('/privacy', 'privacy')->name('privacypolicy');
    Route::get('/search', 'search')->name('search');
    Route::get('/collections', 'categories')->name('indexcategories');
    Route::get('/collections/{category_slug}', 'products')->name('indexcategoryproducts');
    Route::get('/collections/{category_slug}/{product_slug}', 'viewproduct')->name('viewproduct');
    
});

//customer
Route::prefix('customer')->middleware('AuthGuard')->group(function () {
    

    Route::prefix('orders')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('indexorder');
        Route::get('/received', 'received')->name('receivedorder');
        Route::get('/confirmed', 'confirmed')->name('confirmedorder');
        Route::get('/pending', 'pending')->name('pendingorder');
        Route::get('/{order_id}', 'view')->name('vieworder');
    });

    
    Route::controller(CartController::class)->group(function () {
        Route::get('/viewcart', 'viewcart')->name('viewcart');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/checkout/success', 'success')->name('success');
    });


    Route::controller(CustomerController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('signup', 'signup')->name('signup');
        Route::post('signup', 'register')->name('register');
        Route::get('login', 'loginform')->name('loginform');
        Route::post('login', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
        Route::put('profile/{customer}', 'update')->name('updateprofile');
        Route::get('profile/{customer}', 'deleteprofile')->name('deleteprofile');
    });

    Route::get('/addtocart/{product_id}', [View::class,'addCart'])->name('addtocart');

});

//admin
Route::prefix('admin')->middleware('AdminGuard')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admindashboard');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('settings', 'setting')->name('settings');
        Route::put('general/{id}', 'updategeneral')->name('updategeneral');
        Route::put('social/{id}', 'updatesocial')->name('updatesocial');
        Route::put('loginimages/{id}', 'updateloginimages')->name('updateloginimages');
        Route::put('contactus/{id}', 'updatecontactus')->name('updatecontactus');
        Route::put('aboutus/{id}', 'updateaboutus')->name('updateaboutus');
        Route::put('privacy/{id}', 'updateprivacy')->name('updateprivacy');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('admins', 'indexadmin')->name('adminindex');
        Route::get('addadmin', 'newadmin')->name('newadmin');
        Route::post('addadmin', 'register')->name('adminregister');
        Route::get('login', 'loginform')->name('adminloginform');
        Route::post('login', 'login')->name('adminlogin');
        Route::get('logout', 'logout')->name('adminlogout');
        Route::get('/admins/{admin}/edit', 'edit')->name('adminedit');
        Route::put('/admins/{admin}', 'update')->name('adminupdate');
        
    });
    
    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'indexcustomer')->name('customerindex');
        Route::get('addcustomer', 'newcustomer')->name('newcustomer');
        Route::post('addcustomer', 'addcustomer')->name('addcustomer');
        Route::get('/customers/{customer}/edit', 'edit')->name('customeredit');
        Route::put('/customers/{customer}', 'update')->name('customerupdate');

    });

    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('indexcategory');
        Route::get('/active', 'active')->name('activecategory');
        Route::get('create', 'create')->name('createcategory');
        Route::post('add', 'add')->name('addcategory');
        Route::get('/{category}/edit', 'edit')->name('editcategory');
        Route::put('/{category}', 'update')->name('updatecategory');
    });

    Route::prefix('subcategory')->controller(SubCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('indexsubcategory');
        Route::get('/active', 'active')->name('activesubcategory');
        Route::get('create', 'create')->name('createsubcategory');
        Route::post('add', 'add')->name('addsubcategory');
        Route::get('/{subcategory}/edit', 'edit')->name('editsubcategory');
        Route::put('/{subcategory}', 'update')->name('updatesubcategory');
        
    });

    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('indexproduct');
        Route::get('/active', 'active')->name('activeproducts');
        Route::get('create', 'create')->name('createproduct');
        Route::post('add', 'add')->name('addproduct');
        Route::get('/{product}/edit', 'edit')->name('editproduct');
        Route::put('/{product}', 'update')->name('updateproduct');
        
        Route::get('/{productimage_id}', 'deleteimage')->name('deleteproductimage');
        
    });

    Route::prefix('sliders')->controller(SliderController::class)->group(function () {
        Route::get('/', 'index')->name('indexslider');
        Route::get('create', 'create')->name('createslider');
        Route::post('add', 'add')->name('addslider');
        Route::get('/{slider}/edit', 'edit')->name('editslider');
        Route::put('/{slider}', 'update')->name('updateslider');
    });
    
    Route::prefix('orders')->controller(AdminOrderController::class)->group(function () {
        Route::get('/', 'index')->name('adminindexorders');
        Route::get('/delivered', 'delivered')->name('deliveredorders');
        Route::get('/confirmed', 'confirmed')->name('confirmedorders');
        Route::get('/pending', 'pending')->name('pendingorders');
        Route::get('/{order_id}', 'view')->name('adminvieworder');
  
    });

    Route::controller(ContactUsController::class)->group(function () {
    
        Route::get('/contactus', 'index')->name('indexcontactus');
        Route::get('/contactus/{msg_id}', 'view')->name('viewcontactmsg');
        
    });


});

Route::controller(ContactUsController::class)->group(function () {
    
    Route::get('/contactus', 'contactus')->name('contactus');
    Route::post('/contactus', 'sendmsg')->name('sendmsg');
    
});