<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('', 'ItemsController@showItems')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('items/{item}', 'ItemsController@showItemDetail')->name('item');

Route::group(['middleware' => 'auth'], function() {
    Route::get('items/{item}/buy', function(){return "商品購入画面";})->name('item.buy');
    Route::get('sell', 'SellController@showSellForm')->name('sell');
    Route::post('sell', 'SellController@sellItem')->name('sell');
});

// コントローラー名の前に名前空間『Mypage\』をつけ忘れないこと！
Route::group(['prefix'=>'mypage', 'middleware' =>'auth'], function(){
    Route::get('edit-profile', 'Mypage\ProfileController@showProfileEditForm')->name('mypage.edit-profile');
    Route::post('edit-profile', 'Mypage\ProfileController@editProfile')->name('mypage.edit-profile');
    Route::get('sold-items', 'Mypage\SoldItemsController@showSoldItems')->name('mypage.sold-items');
});

// 教材のルーティングの書き方
// Route::prefix('mypage')
//     ->namespace('MyPage')
//     ->middleware('auth')
//     ->group(function () {
//         Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
//         Route::post('edit-profile', 'ProfileController@editProfile')->name('mypage.edit-profile');
//     });