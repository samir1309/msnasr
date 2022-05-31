<?php
Route::middleware('main')->group(function () {

//-------------------------------------Panel---------------------------------------------------------
    Route::get('panel/register', 'App\Http\Controllers\Panel\LoginController@getRegister')->name('panel.register');
    Route::post('panel/register', 'App\Http\Controllers\Panel\LoginController@postRegister')->name('register');
    Route::get('panel/login', 'App\Http\Controllers\Panel\LoginController@getPanelLogin')->name('panel.log');
    Route::post('panel/login', 'App\Http\Controllers\Panel\LoginController@postLogin')->name('panel.login');
    Route::post('panel/login-temp', 'App\Http\Controllers\Panel\LoginController@postPanelLogin')->name('panel.login-temp');
    Route::get('panel/login2', 'App\Http\Controllers\Panel\LoginController@getLoginWpass')->name('panel.logpass');
    Route::get('panel/confirm/{mobile}', 'App\Http\Controllers\Panel\LoginController@getConfirm')->name('panel.confirm');
    Route::get('panel/login-pass/{mobile}', 'App\Http\Controllers\Panel\LoginController@getPassword');
    Route::post('panel/confirm', 'App\Http\Controllers\Panel\LoginController@postConfirm')->name('confirm');
    Route::post('panel/re-confirm/{mobile?}', 'App\Http\Controllers\Panel\LoginController@postReCon');
    Route::post('/panel/login/{mobile}', 'App\Http\Controllers\Panel\LoginController@postRePassword');
    Route::post('/panel/login-pass/', 'App\Http\Controllers\Panel\LoginController@postPassword');
    Route::get('/panel/logout', 'App\Http\Controllers\Panel\LoginController@getlogout')->name('panel.logout');
    Route::post('/vue-post-like', 'App\Http\Controllers\Panel\LikeController@postVueLike')->name('pro.like');

});


    Route::middleware('PanelPermission')->group(function (){
Route::get('panel/dashboard', 'App\Http\Controllers\Panel\PanelController@dashboard')->name('panel.dashboard');
        Route::get('/pdf/{order_id}', 'App\Http\Controllers\Panel\PanelController@getPdf')->name('panel.pdf');
//==info====
Route::get('panel/edit-info', 'App\Http\Controllers\Panel\PanelController@info')->name('panel.edit');
Route::post('panel/save-info', 'App\Http\Controllers\Panel\PanelController@postEditInfo');
//====pass==
Route::get('panel/reset-password', 'App\Http\Controllers\Panel\PanelController@pass')->name('panel.pass');
Route::post('panel/save-pass', 'App\Http\Controllers\Panel\PanelController@savePassword');
//==address==
Route::post('panel/post-address', 'App\Http\Controllers\Panel\PanelController@postAddAddress');
Route::post('panel/edit-address/{id}', 'App\Http\Controllers\Panel\PanelController@postEditAddress');
Route::get('panel/delete-address/{id?}', 'App\Http\Controllers\Panel\PanelController@getDeleteAddress');
Route::get('panel/default-address/{id?}', 'App\Http\Controllers\Panel\PanelController@defaultAddress');
Route::get('panel/addresses', 'App\Http\Controllers\Panel\PanelController@address')->name('panel.address');
Route::post('panel/setcity', 'App\Http\Controllers\Panel\PanelController@setCity')->name('panel.set-city');
Route::post('panel/setcity-edit', 'App\Http\Controllers\Panel\PanelController@setCityEdit')->name('panel.set-city-edit');
//==fav==
Route::get('panel/favorites', 'App\Http\Controllers\Panel\PanelController@favorites')->name('panel.favorites');
//==order==
Route::get('panel/orders', 'App\Http\Controllers\Panel\PanelController@orders')->name('panel.orders');
Route::get('panel/order-details/{id}', 'App\Http\Controllers\Panel\PanelController@orderDetails')->name('panel.order.details');
//==discount==
Route::get('panel/discounts', 'App\Http\Controllers\Panel\PanelController@discounts')->name('panel.discounts');
//==like====
Route::post('panel/post-like', 'App\Http\Controllers\Panel\LikeController@postLike');
Route::get('panel/delete-like/{id}', 'App\Http\Controllers\Panel\LikeController@getDeleteLike');
//==ticket===
Route::get('panel/tickets', 'App\Http\Controllers\Panel\TicketController@tickets')->name('panel.tickets');
Route::get('panel/tickets/new', 'App\Http\Controllers\Panel\TicketController@getNewTicket')->name('panel.new-tickets');
Route::get('panel/returns/new/{id?}', 'App\Http\Controllers\Panel\TicketController@getReturn')->name('panel.new-return');
Route::post('panel/new-ticket', 'App\Http\Controllers\Panel\TicketController@postNewTicket');
Route::get('panel/tickets/details/{id}', 'App\Http\Controllers\Panel\TicketController@ticketDetail')->name('panel.ticket-det');
Route::post('panel/ticket-details-post', 'App\Http\Controllers\Panel\TicketController@postTicketDetails');
Route::any('panel/ticket-status/{id}', 'App\Http\Controllers\Panel\TicketController@ticketStatus');
//==track==
Route::get('panel/tracking', 'App\Http\Controllers\Panel\PanelController@tracking')->name('panel.tracking');
Route::get('panel/post-track', 'App\Http\Controllers\Panel\PanelController@track')->name('panel.track');
});


