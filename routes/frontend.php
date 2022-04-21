<?php


Route::get('/',[\App\Http\Controllers\forntend\IndexController::class,'home'])->name('homes');

//--about us
Route::get('/about-us',[\App\Http\Controllers\forntend\IndexController::class,'aboutUs'])->name('about.us');
//---Authentication
Route::get('users/auth',[\App\Http\Controllers\forntend\IndexController::class,'userAuth'])->name('users.auth');
Route::post('users/login',[\App\Http\Controllers\forntend\IndexController::class,'loginSubmit'])->name('login.submit');
Route::post('users/register',[\App\Http\Controllers\forntend\IndexController::class,'registerSubmit'])->name('register.submit');


Route::get('product-category/{slug}/',[\App\Http\Controllers\forntend\IndexController::class,'productCategory'])->name('product.category');
Route::get('product-details/{slug}/',[\App\Http\Controllers\forntend\IndexController::class,'productDetails'])->name('product.details');

//--- Cart section

Route::get('cart',[\App\Http\Controllers\forntend\CartController::class,'cart'])->name('cart');
Route::post('cart/store',[\App\Http\Controllers\forntend\CartController::class,'cartStore'])->name('cart.store');
Route::post('cart/delete',[\App\Http\Controllers\forntend\CartController::class,'cartDelete'])->name('cart.delete');
Route::post('/update-cart/{rowId}',[
    'uses' => 'App\Http\Controllers\forntend\CartController@update',
    'as'   => 'cart.update'
]);

//---Product review Section
Route::post('product-review/{slug}',[\App\Http\Controllers\ProductReviewController::class,'productReview'])->name('product.review');

//--- Coupon Section
Route::post('coupon/add',[\App\Http\Controllers\forntend\CartController::class,'couponAdd'])->name('coupon.add');

//---Wishlist section
Route::get('wishlist',[\App\Http\Controllers\forntend\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[\App\Http\Controllers\forntend\WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[\App\Http\Controllers\forntend\WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[\App\Http\Controllers\forntend\WishlistController::class,'wishlistDelete'])->name('wishlist.delete');

//--- contact_us section
Route::get('contact-us',[\App\Http\Controllers\forntend\IndexController::class,'contactUs'])->name('contact.us');
Route::post('contact-submit',[\App\Http\Controllers\forntend\IndexController::class,'contactSubmit'])->name('contact.submit');

//---Compare section
Route::get('compare',[\App\Http\Controllers\forntend\CompareController::class,'compare'])->name('compare');
Route::post('compare/store',[\App\Http\Controllers\forntend\CompareController::class,'compareStore'])->name('compare.store');
Route::post('compare/move-to-cart',[\App\Http\Controllers\forntend\CompareController::class,'moveToCart'])->name('compare.move.cart');
Route::post('compare/move-to-wishlist',[\App\Http\Controllers\forntend\CompareController::class,'moveToWishlist'])->name('compare.move.wishlist');
Route::post('compare/delete',[\App\Http\Controllers\forntend\CompareController::class,'compareDelete'])->name('compare.delete');




//--- Checkout section

Route::get('checkout1', [\App\Http\Controllers\forntend\CheckoutController::class,'checkout1'])->name('checkout1')->middleware('users');
Route::post('checkout-first', [\App\Http\Controllers\forntend\CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-second', [\App\Http\Controllers\forntend\CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout-third', [\App\Http\Controllers\forntend\CheckoutController::class,'checkout3Store'])->name('checkout3.store');
Route::post('checkout-store', [\App\Http\Controllers\forntend\CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete-checkout/{order}', [\App\Http\Controllers\forntend\CheckoutController::class,'completeCheckout'])->name('users.complete');

//paypal checkout

Route::get('paypal/payment/cancel',[\App\Http\Controllers\PaypalController::class,'getCancel']);
Route::get('paypal/payment/done',[\App\Http\Controllers\PaypalController::class,'getDone']);
Route::get('paypal/payment/cancel',[\App\Http\Controllers\PaypalController::class,'getCancel']);

//--Razor pay section
Route::post('razor/payment',[\App\Http\Controllers\RazorpayController::class,'razorPayment'])->name('razor.payment');

//shop section
Route::get('shop',[\App\Http\Controllers\forntend\IndexController::class,'shop'])->name('shop');
Route::post('shop-filter',[\App\Http\Controllers\forntend\IndexController::class,'shopFilter'])->name('shop.filter');

//Search and auto-search function
Route::get('autosearch' ,[\App\Http\Controllers\forntend\IndexController::class,'autoSearch'])->name('autosearch');
Route::get('search' ,[\App\Http\Controllers\forntend\IndexController::class,'search'])->name('search');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//User admin section
Route::group(['prefix'=>'user'],function(){
    Route::get('dashboard',[\App\Http\Controllers\forntend\IndexController::class,'userDashboard'])->name('users.dashboard');
    Route::get('orders',[\App\Http\Controllers\forntend\IndexController::class,'userOrders'])->name('users.orders');

    //--- user Address section
    Route::get('address',[\App\Http\Controllers\forntend\IndexController::class,'userAddress'])->name('users.address');
    Route::get('address-edit',[\App\Http\Controllers\forntend\IndexController::class,'userAddressEdit'])->name('user.address-edit');
    Route::post('address-update/{id}',[\App\Http\Controllers\forntend\IndexController::class,'userAddressUpdate'])->name('user.address-update');

    //-- shipping address
    Route::get('shipping-address',[\App\Http\Controllers\forntend\IndexController::class,'userShippingAddress'])->name('users.shipping-address');
    Route::get('edit-shipping-address',[\App\Http\Controllers\forntend\IndexController::class,'userShippingAddressEdit'])->name('users.edit-shipping-address');
    Route::post('shipping-address-update/{id}',[\App\Http\Controllers\forntend\IndexController::class,'userShippingAddressUpdate'])->name('user.shipping-address-update');

    Route::get('/profile',[\App\Http\Controllers\forntend\IndexController::class,'userProfile'])->name('users.profile');
    Route::get('logout',[\App\Http\Controllers\forntend\IndexController::class,'userLogout'])->name('users.logout');

    Route::get('/edit/account/',[\App\Http\Controllers\forntend\IndexController::class,'editAccount'])->name('account.edit');
    Route::post('/update/account/{id}',[\App\Http\Controllers\forntend\IndexController::class,'updateAccount'])->name('account.update');

});
