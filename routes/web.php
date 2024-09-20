<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Frontend\MyorderController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\DeliveryChargeController;
use App\Http\Controllers\Frontend\FrontContactController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Frontend\ProductBuyNowController;
use App\Http\Controllers\Admin\AdminContactMessageController;







Auth::routes();

//user dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/*================================= Admin all route =======================================================*/

Route::get('/admin/login',[LoginController::class,'showAdminLoginForm']);
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');


Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');

    //category
    Route::get('/category/add',[CategoryController::class,'addCategory'])->name('admin/category/add');
    Route::post('/category/store',[CategoryController::class,'storeCategory'])->name('admin.category.store');
    Route::get('/category/manage',[CategoryController::class,'manageCategory'])->name('admin.category.manage');
    Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin.category.delete');
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin.category.edit');
    Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('admin.category.update');


     //subcategory
     Route::get('/subcategory/add',[SubcategoryController::class,'add'])->name('admin.subcategory.add');
     Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('admin.subcategory.store');
     Route::get('/subcategory/manage',[SubcategoryController::class,'index'])->name('admin.subcategory.manage');
     Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('admin.subcategory.edit');
     Route::post('/subcategory/update',[SubcategoryController::class,'update'])->name('admin.subcategory.update');
     Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'delete'])->name('admin.subcategory.delete');

     //global route
    Route::get('/category/subcategory/ajax/{category_id}',[SubcategoryController::class,'subcategoryAutoSelect']);



    //brand
    Route::get('/brand/add',[BrandController::class,'add'])->name('admin.brand.add');
    Route::post('/brand/store',[BrandController::class,'store'])->name('admin.brand.store');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('admin.brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
    Route::post('/brand/update',[BrandController::class,'update'])->name('admin.brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');


    //coupon
    Route::get('/coupon',[CouponController::class,'index']);
    Route::get('/coupon/add',[CouponController::class,'add']);
    Route::post('/coupon/store',[CouponController::class,'store']);
    Route::get('/coupon/edit/{id}',[CouponController::class,'edit']);
    Route::post('/coupon/update',[CouponController::class,'update']);
    Route::get('/coupon/trash/{id}',[CouponController::class,'trash']);


    //color
    Route::get('/color/list',[ColorController::class,'index'])->name('admin.color.list');
    Route::get('/color/add',[ColorController::class,'add'])->name('admin.color.add');
    Route::post('/color/store',[ColorController::class,'store'])->name('admin.color.store');
    Route::get('/color/edit/{id}',[ColorController::class,'edit'])->name('admin.color.edit');
    Route::post('/color/update/{id}',[ColorController::class,'update'])->name('admin.color.update');
    Route::get('/color/delete/{id}',[ColorController::class,'delete'])->name('admin.color.delete');


    //about us
    Route::get('/about-us',[AboutUsController::class,'index']);
    Route::post('/about-us-update',[AboutUsController::class,'update'])->name('admin.aboutus.update');


    //delivery charge
    Route::get('/delivery-charge',[DeliveryChargeController::class,'index']);
    Route::post('/delivery-charge-update',[DeliveryChargeController::class,'update'])->name('admin.delivery_charge.update');



    //product
    Route::get('/product/add',[ProductController::class,'add']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::get('/product/view/{id}',[ProductController::class,'view']);
    Route::get('/product/edit/{id}',[ProductController::class,'edit']);
    Route::get('/product/delete/{id}',[ProductController::class,'delete']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::get('/product/manage',[ProductController::class,'manage']);
    Route::get('/product/filter/by-category',[ProductController::class,'filterBycategory']);
    Route::get('/product/filter/by-brand',[ProductController::class,'filterByBrand']);
    Route::get('/product/filter/by-status',[ProductController::class,'filterByStatus']);
    Route::get('/product-status/deactive/{id}',[ProductController::class,'productStatusDeactive']);
    Route::get('/product-status/active/{id}',[ProductController::class,'productStatusActive']);
    Route::get('/product-featured/deactive/{id}',[ProductController::class,'productFeaturedDeactive']);
    Route::get('/product-featured/active/{id}',[ProductController::class,'productFeaturedActive']);
    Route::get('/today-deal/deactive/{id}',[ProductController::class,'productDealDeactive']);
    Route::get('/today-deal/active/{id}',[ProductController::class,'productDealActive']);
    Route::get('/best-selling/deactive/{id}',[ProductController::class,'bestSellingDeactive']);
    Route::get('/best-selling/active/{id}',[ProductController::class,'bestSellingActive']);
    Route::get('/multiImg/delete/{id}',[ProductController::class,'ProductMultiImgDelete']);


    //slider
    Route::get('/slider/add',[SliderController::class,'add'])->name('admin.slider.add');
    Route::post('/slider/store',[SliderController::class,'store'])->name('admin.slider.store');
    Route::get('/slider/manage',[SliderController::class,'manage'])->name('admin.slider.manage');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('admin.slider.edit');
    Route::post('/slider/update',[SliderController::class,'update'])->name('admin.slider.update');
    Route::get('/slider/delete/{id}',[SliderController::class,'delete'])->name('admin.slider.delete');


    //order
    Route::get('/order/all',[AdminOrderController::class,'allOrder'])->name('admin.order.all');
    Route::get('/order/status-change/{id}',[AdminOrderController::class,'changeOrderStatus'])->name('admin.order-status.change');
    Route::get('/order/details/{id}',[AdminOrderController::class,'orderDetails'])->name('admin.order-details');
    Route::get('/order/delete/{id}',[AdminOrderController::class,'orderDelete'])->name('admin.order-delete');
    Route::post('/update-order-status', [AdminOrderController::class, 'updateStatus'])->name('update.order.status');
    Route::get('/order/invoice/{id}',[AdminOrderController::class,'orderInvoice'])->name('admin.order-invoice');



    //contact message
    Route::get('/contact/all',[AdminContactMessageController::class,'show'])->name('admin.contact.all');
    Route::get('/message/view/{id}',[AdminContactMessageController::class,'viewMessage'])->name('admin.message.view');

    //delete multiple message
    Route::post('/delete',[AdminContactMessageController::class,'delete'])->name('delete');


});

/*================================= Admin all route end =======================================================*/


/*===================================== Frontend all route start   ==============================================*/

//home page
Route::get('/',[FrontendHomeController::class,'index']);

//about us page
Route::get('/about-us',[FrontendHomeController::class,'aboutUs'])->name('about');

//product single page
Route::get('/product/single/{id}',[FrontendHomeController::class,'productSingle'])->name('product.single');

//category wise product view
Route::get('/subcategory-wise/product/show/{id}',[FrontendHomeController::class,'subcategoryWiseProductShow'])->name('subcategory-wise.product.show');

//product filter
Route::get('/products/filter', [FrontendHomeController::class, 'filter'])->name('products.filter');

//product search
Route::get('/products/search', [FrontendHomeController::class, 'productSearch'])->name('product.search');


//order tracking
Route::get('/order-tracking',[OrderTrackingController::class,'index'])->name('order.track');
Route::get('/order-fetch',[OrderTrackingController::class,'fetchOrder'])->name('fetch.order');


//frontend protected route
Route::middleware(['auth'])->group(function () {
   //product review by user
   Route::post('/product/review',[ReviewController::class,'reviewStore']);

    //shopping cart
    Route::get('/cart/view',[ShoppingCartController::class,'viewShoppingCart']);
    Route::post('/addTo/cart',[ShoppingCartController::class,'productAddToCart']);
    Route::post('/quantity/increment',[ShoppingCartController::class,'incrementQuantity']);
    Route::post('/quantity/decrement',[ShoppingCartController::class,'decrementQuantity']);
    Route::get('/cart-item/delete/{id}',[ShoppingCartController::class,'cartItemDelete']);
    Route::post('/cart-color/update',[ShoppingCartController::class,'cartProductColorUpdate']);
    Route::get('/cart/empty',[ShoppingCartController::class,'emptyCart']);

    //product buy now
    Route::post('/product/buy/now',[ProductBuyNowController::class,'buyNow']);

    //checkout page
    Route::get('/checkout',[CheckoutController::class,'checkout']);
    Route::post('/apply/coupon',[CheckoutController::class,'applyCoupon']);
    Route::get('/coupon/remove',[CheckoutController::class,'removeCoupon']);
    Route::post('/place/order',[CheckoutController::class,'placeOrder']);


    //customer order list
    Route::get('my-order-list',[MyorderController::class,'index']);
    Route::get('my-order-details/{id}',[MyorderController::class,'orderDetails']);
});




//contact us
Route::get('/contact/us',[FrontContactController::class,'index'])->name('contact');
Route::post('/insert/message',[FrontContactController::class,'insertMessage'])->name('insert.message');

/*===================================== Frontend all route end   ==============================================*/
