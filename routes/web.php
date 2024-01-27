<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogSubCategoryController;
use App\Http\Controllers\Backend\BlogPostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserRoleController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\ReviewController;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



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




// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


// Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
//     return view('admin.index');
// })->name('admin.dashboard');

// Route::middleware(['auth:admin'])->group(function(){

// });  // end Middleware admin

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');

/////// All Admin Routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'updateChangePassword'])->name('update.change.password');



/////// All User Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('user.change.password');
Route::post('/user/password/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');


// Admin Brand Routes
Route::prefix('/brand')->group(function(){
	Route::get('/all', [BrandController::class, 'index'])->name('brand.all');
	Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
	Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
	Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
	Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
});

// Admin Category Routes
Route::prefix('/category')->group(function(){
	Route::get('/all', [CategoryController::class, 'index'])->name('category.all');
	Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
	Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
	Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
	Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');

	// Admin Subcategory Routes
	Route::get('/sub/all', [SubCategoryController::class, 'index'])->name('subcategory.all');
	Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
	Route::get('/sub/edit/{subcategory}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
	Route::post('/sub/update/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategory.update');
	Route::get('/sub/delete/{subcategory}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

	// Admin Sub-Subcategory Routes
	Route::get('/sub/sub/all', [SubSubcategoryController::class, 'index'])->name('subsubcategory.all');
	Route::post('/sub/sub/store', [SubSubcategoryController::class, 'store'])->name('subsubcategory.store');
	Route::get('/sub/sub/edit/{subsubcategory}', [SubSubcategoryController::class, 'edit'])->name('subsubcategory.edit');
	Route::post('/sub/sub/update/{subsubcategory}', [SubSubcategoryController::class, 'update'])->name('subsubcategory.update');
	Route::get('/sub/sub/delete/{subsubcategory}', [SubSubcategoryController::class, 'delete'])->name('subsubcategory.delete');
	// Admin Sub-Subcategory(ajax->subcategory) Routes
	Route::get('/subcategory/ajax/{cat_id}', [SubSubcategoryController::class, 'getSubCategory']);
	// Admin Sub-Subcategory(ajax->subsubcategory) Routes
	Route::get('/subsubcategory/ajax/{subcat_id}', [SubSubcategoryController::class, 'getSubSubCategory']);
});


// Admin Product Routes
Route::prefix('/product')->group(function(){
	Route::get('/index', [ProductController::class, 'index'])->name('product.all');
	Route::get('/create', [ProductController::class, 'create'])->name('product.create');
	Route::post('/store', [ProductController::class, 'store'])->name('product.store');
	Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
	Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
	Route::post('/product-images/update', [ProductController::class, 'productImageUpdate'])->name('product-image.update');
	Route::post('/thambnail/update/{product}', [ProductController::class, 'thambnailUpdate'])->name('product-thambnail.update');
	Route::get('/product-images/delete/{multiImg}', [ProductController::class, 'productImageDelete'])->name('product-image.delete');
	Route::get('/product-thambnail/delete/{product}', [ProductController::class, 'productThambnailDelete'])->name('product-thambnail.delete');
	Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
	// (Active/Inactive) Product Routes
	Route::get('/active/{product}', [ProductController::class, 'active'])->name('product.active');
	Route::get('/inactive/{product}', [ProductController::class, 'inactive'])->name('product.inactive');
});


// Admin Slider Routes 
Route::prefix('/slider')->group(function(){
	Route::get('/all', [SliderController::class, 'index'])->name('slider.all');
	Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
	Route::get('/edit/{slider}', [SliderController::class, 'edit'])->name('slider.edit');
	Route::post('/update/{slider}', [SliderController::class, 'update'])->name('slider.update');
	Route::get('/delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
	// (Active/Inactive) Product Routes
	Route::get('/active/{slider}', [SliderController::class, 'active'])->name('slider.active');
	Route::get('/inactive/{slider}', [SliderController::class, 'inactive'])->name('slider.inactive');
});



// ///////// Frontend Routes
// Language Routes
Route::get('/language/english', [LanguageController::class, 'english'])->name('language.english');
Route::get('/language/bangla', [LanguageController::class, 'bangla'])->name('language.bangla');


// Frontend Product Details Page url 
Route::get('/product/details/{product}/{slug}', [IndexController::class, 'productDetails'])->name('product.details');

// Frontend Product Tags Page 
Route::get('product/tag/{tag}', [IndexController::class, 'tagWiseProduct'])->name('product.tag');

// Frontend Subcategory Wise Product
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'subCatProduct'])->name('subcategory.product');

// Frontend Sub-Subcategory Wise Product
Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatProduct'])->name('subsubcategory.product');

// Frontend Product View Ajax
Route::get('product/view/ajax/{id}', [IndexController::class, 'productViewAjax']);

// Frontend Add To Card (store) Ajax
Route::post('cart/data/store/{id}', [CartController::class, 'addToCartAjax']);

// Frontend Add Mini Card with Ajax
Route::get('product/mini/cart', [CartController::class, 'addMiniCartAjax']);

// Frontend Remove Mini Card with Ajax
Route::get('minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCartAjax']);

// Frontend Add To Wishlist Ajax
Route::post('add-to-wishlist/{id}', [WishlistController::class, 'addToWishlistAjax']);


/////////////////////  User Must Login  //////////////////////
// Frontend Wishlist & Cart Page & Stripe Order & Cash Order
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
	// Wishlist Page
	Route::get('wishlist/view', [WishlistController::class, 'wishlistView'])->name('wishlist');

	// Get All Wishlist Products
	Route::get('get-wishlist-product', [WishlistController::class, 'getWishlistAjax']);

	// Remove Wishlist Products
	Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlistAjax']);


	// // My Cart Page
	// Route::get('mycart/view', [CartPageController::class, 'myCartView'])->name('mycart');

	// // Get All My Cart Products
	// Route::get('get-mycart-product', [CartPageController::class, 'getMyCartAjax']);

	// // Remove My Carts Products
	// Route::get('mycart/remove/{rowId}', [CartPageController::class, 'removeMyCartAjax']);

	// // My Carts Product Quantity Increment
	// Route::post('mycart-increment/{rowId}', [CartPageController::class, 'incrementMyCartAjax']);

	// // My Carts Product Quantity decrement
	// Route::post('mycart-decrement/{rowId}', [CartPageController::class, 'decrementMyCartAjax']);


	// Stripe Order
	Route::post('stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');

	// My Orders
	Route::get('my/order', [AllUserController::class, 'myOrders'])->name('my.orders');

	// My Order Details
	Route::get('my/order-details/{order_id}', [AllUserController::class, 'myOrderDetail']);

	// Cash Order
	Route::post('cash/order', [CashController::class, 'cashOrder'])->name('cash.order');

	// Order Invoice Download
	Route::get('my/invoice-download/{order_id}', [AllUserController::class, 'invoiceDownload']);

	// Order Return Order Request 
	Route::post('my/return/order/{order}', [AllUserController::class, 'returnOrder'])->name('return.order');

	// Order Return Orders List 
	Route::get('my/return/order/list', [AllUserController::class, 'returnOrderList'])->name('return.order.list');

	// Order Return Orders List 
	Route::get('my/cancel/order/list', [AllUserController::class, 'cancelOrderList'])->name('cancel.order.list');

	// Order Tracking
	Route::post('order/tracking', [AllUserController::class, 'orderTracking'])->name('order.tracking');

});


// My Cart Page
	Route::get('user/mycart/view', [CartPageController::class, 'myCartView'])->name('mycart');

	// Get All My Cart Products
	Route::get('user/get-mycart-product', [CartPageController::class, 'getMyCartAjax']);

	// Remove My Carts Products
	Route::get('user/mycart/remove/{rowId}', [CartPageController::class, 'removeMyCartAjax']);

	// My Carts Product Quantity Increment
	Route::post('user/mycart-increment/{rowId}', [CartPageController::class, 'incrementMyCartAjax']);

	// My Carts Product Quantity decrement
	Route::post('user/mycart-decrement/{rowId}', [CartPageController::class, 'decrementMyCartAjax']);


// Admin Coupon Routes
Route::prefix('/coupon')->group(function(){
	Route::get('/all', [CouponController::class, 'index'])->name('coupon.all');
	Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
	Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('coupon.edit');
	Route::post('/update/{coupon}', [CouponController::class, 'update'])->name('coupon.update');
	Route::get('/delete/{coupon}', [CouponController::class, 'delete'])->name('coupon.delete');
});

// Admin Shipping Area Routes
Route::prefix('/shipping')->group(function(){
	// Division All Routes
	Route::get('/division/all', [ShippingAreaController::class, 'divisionView'])->name('division.all');
	Route::post('/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
	Route::get('/division/edit/{ShipDivision}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
	Route::post('/division/update/{ShipDivision}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
	Route::get('/division/delete/{ShipDivision}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');

	Route::get('/division/active/{ShipDivision}', [ShippingAreaController::class, 'divisionActive'])->name('division.active');
	Route::get('/division/inactive/{ShipDivision}', [ShippingAreaController::class, 'divisionInactive'])->name('division.inactive');

	// Division All Routes
	Route::get('/district/all', [ShippingAreaController::class, 'districtView'])->name('district.all');
	Route::post('/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
	Route::get('/district/edit/{ShipDistrict}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
	Route::post('/district/update/{ShipDistrict}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
	Route::get('/district/delete/{ShipDistrict}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');

	Route::get('/district/active/{ShipDistrict}', [ShippingAreaController::class, 'districtActive'])->name('district.active');
	Route::get('/district/inactive/{ShipDistrict}', [ShippingAreaController::class, 'districtInactive'])->name('district.inactive');

	// State All Routes
	Route::get('/state/all', [ShippingAreaController::class, 'stateView'])->name('state.all');
	Route::post('/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
	Route::get('/state/edit/{ShipState}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
	Route::post('/state/update/{ShipState}', [ShippingAreaController::class, 'stateUpdate'])->name('state.update');
	Route::get('/state/delete/{ShipState}', [ShippingAreaController::class, 'stateDelete'])->name('state.delete');

	Route::get('/state/active/{ShipState}', [ShippingAreaController::class, 'stateActive'])->name('state.active');
	Route::get('/state/inactive/{ShipState}', [ShippingAreaController::class, 'stateInactive'])->name('state.inactive');

	Route::get('district/ajax/{div_id}', [ShippingAreaController::class, 'getDistrictAjax']);
});

// Frontend Coupon Shwo with Calculation
Route::post('/coupon-apply', [CartController::class, 'couponApplyAjax']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalAjax']);
Route::get('/coupon-remove', [CartController::class, 'removeCouponAjax']);


// Frontend Checkout Page
Route::get('/checkout', [CheckoutController::class, 'checkoutCreate'])->name('checkout');
	// AJAX
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'districtGetAjax']);
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'stateGetAjax']);

Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');


// Admin Orders Routes
Route::prefix('/orders')->group(function(){
	Route::get('/pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
	// Route::get('/pending-order/details/{orderId}', [OrderController::class, 'pendingOrderDetails'])->name('pending-order.details');
	Route::get('/order/details/{orderId}', [OrderController::class, 'orderDetails'])->name('order.details');

	Route::get('/confirm-orders', [OrderController::class, 'confirmOrders'])->name('confirm-orders');

	Route::get('/processing-orders', [OrderController::class, 'processingOrders'])->name('processing-orders');

	Route::get('/picked-orders', [OrderController::class, 'pickedOrders'])->name('picked-orders');

	Route::get('/shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');

	Route::get('/delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');

	Route::get('/cancel-orders', [OrderController::class, 'cancelOrders'])->name('cancel-orders');

// update orders
	Route::get('/panding/confirm/{orderId}', [OrderController::class, 'pandingToConfirm'])->name('pending.confirm');

	Route::get('/confirm/processing/{orderId}', [OrderController::class, 'confirmToProcessing'])->name('confirm.processing');

	Route::get('/processing/picked/{orderId}', [OrderController::class, 'processingToPicked'])->name('processing.picked');

	Route::get('/picked/shipped/{orderId}', [OrderController::class, 'pickedToShipped'])->name('picked.shipped');

	Route::get('/shipped/delivered/{orderId}', [OrderController::class, 'shippedToDelivered'])->name('shipped.delivered');

	Route::get('/delivered/cancel/{orderId}', [OrderController::class, 'deliveredToCancel'])->name('delivered.cancel');

// Invoice Download
	Route::get('/invoice/download/{orderId}', [OrderController::class, 'adminInvoiceDownload'])->name('invoice.download');

});


// Admin All Reports Routes 
Route::prefix('/reports')->group(function(){
	Route::get('/search', [ReportController::class, 'reportSearch'])->name('reports.search');
	Route::post('/by/date', [ReportController::class, 'reportByDate'])->name('reports.by.date');
	Route::post('/by/month', [ReportController::class, 'reportByMonth'])->name('reports.by.month');
	Route::post('/by/year', [ReportController::class, 'reportByYear'])->name('reports.by.year');
});

// Admin All Users List Routes 
Route::prefix('/alluser')->group(function(){
	Route::get('/view', [AdminProfileController::class, 'allUsers'])->name('all-users');
});

// Admin All Blog Category & Sub-Category & Post Routes 
Route::prefix('/blog')->group(function(){
	// blog category
	Route::get('/category', [BlogCategoryController::class, 'blogCategory'])->name('blog.category');
	Route::post('/category/store', [BlogCategoryController::class, 'blogCategoryStore'])->name('blog.category.store');
	Route::get('/category/edit/{id}', [BlogCategoryController::class, 'blogCategoryEdit'])->name('blog.category.edit');
	Route::post('/category/update/{id}', [BlogCategoryController::class, 'blogCategoryUpdate'])->name('blog.category.update');
	Route::get('/category/delete/{id}', [BlogCategoryController::class, 'blogCategoryDelete'])->name('blog.category.delete');

	// blog sub-category
	Route::get('/sub/category', [BlogSubCategoryController::class, 'blogSubCat'])->name('blog.subcategory');
	Route::post('/sub/category/store', [BlogSubCategoryController::class, 'blogSubCatStore'])->name('blog.subcategory.store');
	Route::get('/sub/category/edit/{id}', [BlogSubCategoryController::class, 'blogSubCatEdit'])->name('blog.subcategory.edit');
	Route::post('/sub/category/update/{id}', [BlogSubCategoryController::class, 'blogSubCatUpdate'])->name('blog.subcategory.update');
	Route::get('/sub/category/delete/{id}', [BlogSubCategoryController::class, 'blogSubCatDelete'])->name('blog.subcategory.delete');

	// blog post
	Route::get('/post', [BlogPostController::class, 'blogPost'])->name('blog.post');
	Route::get('/post/create', [BlogPostController::class, 'blogPostCreate'])->name('blog.post.create');
	Route::post('/post/store', [BlogPostController::class, 'blogPostStore'])->name('blog.post.store');
	Route::get('/post/edit/{id}', [BlogPostController::class, 'blogPostEdit'])->name('blog.post.edit');
	Route::post('/post/update/{id}', [BlogPostController::class, 'blogPostUpdate'])->name('blog.post.update');
	Route::get('/post/delete/{id}', [BlogPostController::class, 'blogPostDelete'])->name('blog.post.delete');
});

//  Frontend Blog Show Routes 
Route::get('blog', [HomeBlogController::class, 'blogListView'])->name('home.blog');
Route::get('blog/details/{id}', [HomeBlogController::class, 'blogDetails'])->name('blog.details');

// Admin Setting Routes 
Route::prefix('/setting')->group(function(){
	Route::get('/site/setting', [SettingController::class, 'siteSetting'])->name('site.setting');
	Route::post('/site/setting/{id}', [SettingController::class, 'updateSiteSetting'])->name('update.site.setting');
	Route::get('/seo/setting', [SettingController::class, 'seoSetting'])->name('seo.setting');
	Route::post('/seo/setting/{id}', [SettingController::class, 'updateSeoSetting'])->name('update.seo.setting');
});

// Admin Return Order Routes 
Route::prefix('/return')->group(function(){
	Route::get('/request', [ReturnController::class, 'returnRequest'])->name('return.request');
	Route::get('approved/request/{id}', [ReturnController::class, 'approvedReturnRequest'])->name('approved.return.request');
	Route::get('all/approved/request', [ReturnController::class, 'allApprovedRequest'])->name('all.approved.request');
});


// User Review Routes 
Route::prefix('/review')->group(function(){
	Route::post('/store/{product_id}', [ReviewController::class, 'reviewStore'])->name('review.store');
});

// Admin Review Routes 
Route::prefix('/review')->group(function(){
	Route::get('/pending', [ReviewController::class, 'pendingReview'])->name('pending.review');
	Route::get('/approved/pending/{id}', [ReviewController::class, 'approvePendingReview'])->name('approved.pending.review');
	Route::get('/publish', [ReviewController::class, 'publishReview'])->name('publish.review');
	Route::get('/delete/publish/{id}', [ReviewController::class, 'deletePublishReview'])->name('delete.publish.review');
});

// Admin Product Stock Routes 
Route::prefix('/stock')->group(function(){
	Route::get('/product', [ProductController::class, 'productStock'])->name('product.stock');
});

// Admin User Role Routes 
Route::prefix('/adminuserrole')->group(function(){
	Route::get('/all', [AdminUserRoleController::class, 'allAdminRole'])->name('all.admin.user');
	Route::get('/add', [AdminUserRoleController::class, 'addAdminRole'])->name('add.admin.user');
	Route::post('/store', [AdminUserRoleController::class, 'storeAdminRole'])->name('store.admin.user');
	Route::get('edit/{id}', [AdminUserRoleController::class, 'editAdminRole'])->name('edit.admin.user');
	Route::post('/update/{id}', [AdminUserRoleController::class, 'updateAdminRole'])->name('update.admin.user');
	Route::get('/delete/{id}', [AdminUserRoleController::class, 'deleteAdminRole'])->name('delete.admin.user');
});


//  Frontend Product Search Routes 
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');

//  Frontend Advanced Search Product Routes 
Route::post('/search-product', [IndexController::class, 'searchProduct']);



// ======= Extra (socialite) ==========
//  Login Google 
Route::get('/login/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

//  Login Faceboook 
Route::get('/login/facebook', [AuthenticatedSessionController::class, 'redirectToFaceboook'])->name('login.facebook');
Route::get('/login/facebook/callback', [AuthenticatedSessionController::class, 'handleFaceboookCallback']);

//  Login Github 
Route::get('/login/github', [AuthenticatedSessionController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [AuthenticatedSessionController::class, 'handleGithubCallback']);
// ======= End Extra (socialite) ==========