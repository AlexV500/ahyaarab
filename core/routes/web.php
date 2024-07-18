<?php

use App\Http\Controllers\Catalog\CartController;
use App\Http\Controllers\Catalog\OrderController;
use App\Http\Controllers\Catalog\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('cron', 'CronController@cron')->name('cron');

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{id}', 'replyTicket')->name('reply');
    Route::post('close/{id}', 'closeTicket')->name('close');
    Route::get('download/{attachment_id}', 'ticketDownload')->name('download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');


Route::group(['namespace' => 'Catalog'], function () {
    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/', 'IndexController')->name('catalog');
        //    Route::get('/{category:slug?}', 'CatalogController')->name('catalog');

        Route::get('check_catalog_slug', 'BaseController@checkCatalogSlug')->name('catalog.base.check.slug');

        Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
            Route::get('/{category:slug}', 'IndexController')->name('catalog.category.index');
        });

        Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
            Route::get('/', 'ShowController')->name('catalog.product.show');
        });
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/{product:slug}', 'ProductController')->name('product');
    });

    Route::controller(CartController::class)
        ->prefix('cart')
        ->group(function () {
            Route::get('/', 'index')->name('cart');
            Route::get('/add', 'add')->name('cart.add');
            Route::post('/{item}/quantity', 'quantity')->name('cart.quantity');
            Route::delete('/{item}/delete', 'delete')->name('cart.delete');
            Route::delete('/truncate', 'truncate')->name('cart.truncate');
        });

    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::post('/order', [OrderController::class, 'handle'])->name('order.handle');
});


Route::controller('SiteController')->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::post('/subscribe', 'subscribe')->name('subscribe.post');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('games', 'games')->name('games');

    Route::get('blog', 'blog')->name('blog');
    Route::get('blog/{slug}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::get('maintenance-mode', 'SiteController@maintenance')->withoutMiddleware('maintenance')->name('maintenance');

    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});

//Route::group(['namespace' => 'Catalog', 'prefix' => 'catalog'], function () {
//
//
//});

