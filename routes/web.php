<?php
use App\Http\Controllers\Admin\AuctionProductController;
use App\Http\Controllers\Admin\AuctionProductTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SellerProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductTypeController;

use App\Http\Controllers\Admin\SellerController;

use App\Http\Controllers\Admin\WholeSaleProductController;
use App\Http\Controllers\Admin\WholeSaleProductTypeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\DeliveryBoyController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\admin\AdminCustomerController;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\admin\WebsiteSettingController;
use App\Http\Controllers\admin\AdminSalesController;
use App\Http\Controllers\admin\WebsiteSliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CourierController;

Route::get('/customer-login',[CustomerAuthController::class,'index'])->name('customer.login');
Route::post('/customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::get('/customer-register',[CustomerAuthController::class,'indexRegister'])->name('customer.register');
Route::post('/customer-register',[CustomerAuthController::class,'register'])->name('customer.register');
Route::post('/admin-login-as-customer',[AdminCustomerController::class,'loginAsCustomer'])->name('admin.login.as.customer');

    Route::get('/',[WebsiteController::class,'index'])->name('home');
    Route::get('/category',[WebsiteController::class,'category'])->name('category');
    Route::get('/brand',[WebsiteController::class,'brand'])->name('brand');
    Route::get('/product-by-brands/{id}',[WebsiteController::class,'productByBrand'])->name('product.by.brand');
    Route::get('/product',[WebsiteController::class,'product'])->name('product');
    Route::get('/product-by-category/{id}',[WebsiteController::class,'productByCategory'])->name('product.by.category');
    Route::get('/product-details/{id}',[WebsiteController::class,'productDetails'])->name('product.details');
    Route::resource('cart',CartController::class);
    Route::post('/cart/update-Product/', [CartController::class, 'updateProduct'])->name('cart.update-Product');
    Route::get('/cart/delete-Product/{rowId}', [CartController::class, 'deleteProduct'])->name('cart.delete');

    //Customer panel
    Route::middleware('customers')->prefix('')->group(function (){
        Route::get('/customer-dashboard',[CustomerController::class,'index'])->name('customer.dashboard');
        Route::post('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer.logout');
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('cart.checkout');
        Route::post('/order', [CheckoutController::class, 'newOrder'])->name('order');

    });

        Route::controller(SellerController::class)->group(function(){
            Route::get('seller/registration-form','sellerRegistrationForm')->name('seller.registrationForm');
            Route::post('seller/registration','sellerRegistration')->name('seller.registration');
            Route::get('seller/otp-form','SellerOtpForm')->name('seller.otpForm');
            Route::post('otp-verified','otpVerified')->name('otp.verified');
            Route::get('seller/login-form','SellerLoginForm')->name('seller.loginForm');
            Route::post('seller/login','SellerLogin')->name('seller.login');

            });

/* Route::middleware(['auth:sanctum','UserCheckPermission', config('jetstream.auth_session'), 'verified',])->group(function () { */

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::group(['prefix'=> 'admin'], function () {

// Product Route start
    Route::resource('categories',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('units',UnitController::class);
    Route::resource('colors',ColorController::class);
    Route::resource('sizes',SizeController::class);
    Route::resource('product',ProductController::class);
    Route::get('/product-by-type/{id}',[ProductController::class,'productByType'])->name('product-by-type');
    Route::resource('product-type',ProductTypeController::class);
    Route::get('/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');

    Route::get('/product-reviews', [ProductController::class, 'productReview'])->name('product.reviews');
//        Product Route End

//        Blog Route Start
    Route::resource('blogs',BlogController::class);
    Route::resource('blog_categories',BlogCategoryController::class);
//        Blog Route End

//        Delivery Boy
    Route::resource('delivery-boy',DeliveryBoyController::class);
    Route::post('/delivery-boy-profile/{id}',[DeliveryBoyController::class,'updateProfile'])->name('deliveryBoy.updateProfile');
    Route::get('/delivery-boy-payment',[DeliveryBoyController::class,'paymentHistory'])->name('deliveryBoy.paymentHistory');
    Route::get('/delivery-boy-collected',[DeliveryBoyController::class,'collectedHistory'])->name('deliveryBoy.collectedHistory');
    Route::get('/delivery-boy-cancel-requests',[DeliveryBoyController::class,'cancel'])->name('deliveryBoy.cancelRequests');

//        Courier Module Start
        Route::resource('couriers',CourierController::class);
//        Blog Route customer
    Route::resource('customers',AdminCustomerController::class);
//        Website Setting Route customer
    Route::resource('website-settings',WebsiteSettingController::class);
    Route::resource('slider',WebsiteSliderController::class);


// Sales Route Start
        Route::get('/sales-orders',[AdminSalesController::class,'order'])->name('sales.order');
        Route::resource('orders',OrderController::class);
        Route::get('/order/invoice-show/{id}',[OrderController::class,'showInvoice'])->name('order.invoice-show');
        Route::get('/sales-in-house-orders',[AdminSalesController::class,'inHouseOrder'])->name('sales.in-house-orders');
        Route::get('/sales-seller-orders',[AdminSalesController::class,'sellerOrder'])->name('sales.seller-orders');
        Route::get('/sales-pickup-point-orders',[AdminSalesController::class,'pickUpPointOrder'])->name('sales.pickup-point-orders');
// Sales Route End


        //RoleController

        Route::controller(RoleController::class)->group(function(){
            Route::get('role/index','index')->name('role.index');
            Route::get('role/create','create')->name('role.create');
            Route::post('role/store','store')->name('role.store');
            Route::get('assign/role/{roleId}', 'assignRole')->name('assign.role');
            Route::post('assign/role-permission/{roleId}', 'rolePermission')->name('role.permission');
            Route::post('assign/role-permission/{roleId}', 'rolePermission')->name('role.permission');

        });
           Route::controller(PermissionController::class)->group(function(){
            Route::get('permission/index','index')->name('permission.index');
        });

        //AuctionProductController
       Route::controller(AuctionProductController::class)->group(function(){
            Route::get('auction-product/index','index')->name('auction.product.index');
            Route::get('auction-product/create','create')->name('auction.product.create');
            Route::post('auction-product/store','store')->name('auction.product.store');
            Route::get('auction-product/view/{auctionProductId}','show')->name('auction.product.show');
            Route::get('auction-product/edit/{auctionProductId}','edit')->name('auction.product.edit');
            Route::put('auction-product/update/{auctionProductId}','update')->name('auction.product.update');
            Route::delete('auction-product/delete/{auctionProductId}','delete')->name('auction.product.delete');
           /*  Route::get('/inHouse-product/{id}','inHouseAuctionProduct')->name('inHouse.auction.product'); */
        });
            //AuctionProductTypeController
            Route::controller(AuctionProductTypeController::class)->group(function(){
            Route::get('auction-product-type/index','index')->name('auction.product.type.index');
            Route::get('auction-product-type/create','create')->name('auction.product.type.create');
            Route::post('auction-product-type/store','store')->name('auction.product.type.store');
            Route::get('auction-product-type/show/{id}','show')->name('auction.product.type.show');
            Route::get('auction-product-type/edit{id}','edit')->name('auction.product.type.edit');
            Route::put('auction-product-type/update{id}','update')->name('auction.product.type.update');
            Route::patch('/auction-product-type/update-status/{id}', 'updateStatus')->name('auction.product.type.updateStatus');
            Route::delete('auction-product-type/delete{id}','delete')->name('auction.product.type.delete');
        });

        //WholeSaleProductTypeController
            Route::controller(WholeSaleProductTypeController::class)->group(function(){
            Route::get('whole-sale-product-type/index','index')->name('whole-sale-product-type.index');
            Route::get('whole-sale-product-type/create','create')->name('whole-sale-product-type.create');
            Route::post('whole-sale-product-type/store','store')->name('whole-sale-product-type.store');
            Route::get('whole-sale-product-type/show/{id}','show')->name('whole-sale-product-type.show');
            Route::get('whole-sale-product-type/edit{id}','edit')->name('whole-sale-product-type.edit');
            Route::put('whole-sale-product-type/update{id}','update')->name('whole-sale-product-type.update');
            Route::delete('whole-sale-product-type/delete{id}','delete')->name('whole-sale-product-type.delete');
            Route::get('whole-sale-product-type/{id}','typeOfWholesaleProduct')->name('whole-sale-product-type');
        });
        //WholeSaleProductController
            Route::controller(WholeSaleProductController::class)->group(function(){
            Route::get('whole-sale-product/index','index')->name('whole-sale-product.index');
            Route::get('whole-sale-product/create','create')->name('whole-sale-product.create');
            Route::post('whole-sale-product/store','store')->name('whole-sale-product.store');
            Route::get('whole-sale-product/show/{id}','show')->name('whole-sale-product.show');
            Route::get('whole-sale-product/edit{id}','edit')->name('whole-sale-product.edit');
            Route::put('whole-sale-product/update{id}','update')->name('whole-sale-product.update');
            Route::delete('whole-sale-product/delete{id}','delete')->name('whole-sale-product.delete');
        });
        //SellerController
        Route::controller(SellerController::class)->group(function(){
                Route::get('seller/index','index')->name('seller.index');
                Route::get('seller/create','create')->name('seller.create');
                Route::post('seller/store','store')->name('seller.store');
                Route::get('seller/show/{id}','show')->name('seller.show');
                Route::get('seller/edit{id}','edit')->name('seller.edit');
                Route::put('seller/update{id}','update')->name('seller.update');
                Route::delete('seller/delete{id}','delete')->name('seller.delete');

        });
         //SellerProductController
         Route::controller(SellerProductController::class)->group(function(){
            Route::get('product-seller/index','index')->name('product-seller.index');
            Route::get('product-seller/create','create')->name('product-seller.create');
            Route::post('product-seller/store','store')->name('product-seller.store');
            Route::get('product-seller/show/{id}','show')->name('product-seller.show');
            Route::get('product-seller/edit{id}','edit')->name('product-seller.edit');
            Route::put('product-seller/update{id}','update')->name('product-seller.update');
            Route::delete('product-seller/delete{id}','delete')->name('product-seller.delete');
        });
    });
/* });
 */
