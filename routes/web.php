<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeerlistController; //追加
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

Route::get('/', function () {
    return view('welcome');
}); #'/'でhome画面 いずれ違う画面をhomeにする


/*prefix(‘admin’) の設定を次の無名関数function(){}の中のすべてのRoutingの設定に適用
URLの末尾 /adminから始まるものに適用*/
Route::controller(BeerlistController::class)->prefix('admin')->name('admin.')
    ->middleware('auth')->group(function () { 
            /*Route:: group化 prefix(‘admin’) の設定を無名関数function(){}の中のすべてのRoutingの設定に適用 
            prefixでadminから始まるurl middleware('auth')；リダイレクト*/
        Route::get('beerlist/create', 'add')->name('beerlist.add'); 
            #getメソッド；create にアクセスが来たらcontrollerのadd action にわたす 
        Route::post('beerlist/create', 'create')->name('beerlist.create'); #postメソッド：createAction
});

Route::get('/admin/beerlist/create', function () {
    return view('admin/beerlist/create');
    }); #viewの確認用。覚えておくとよい


Auth::routes();

use App\Http\Controllers\Auth\LogoutController;
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
#LogoutControllerをhttp>Auth に作成

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');