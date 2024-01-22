<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Home\HomeVideosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('')->group(function(){
    Route::get('',[HomeVideosController::class,'index'])->name('home.videos.all');
    Route::get('{videos_id}/show',[HomeVideosController::class,'show'])->name('home.videos.show');
    // Route::get('{videos_id}/addToBasket',[BasketController::class,'addToBasket'])->name('home.basket.add');
    // Route::get('{videos_id}/removeFromBasket',[BasketController::class,'removeFromBasket'])->name('home.basket.remove');
    // Route::get('checkout',[CheckoutController::class,'show'])->name('home.checkout');

 });

Route::prefix('admin')->group(function()
{
    Route::prefix('headlines')->group(function()
    {
        Route::get('',[HeadlineController::class,'all'])->name('headlines.all');
        Route::get('create',[HeadlineController::class,'create'])->name('headlines.create');
        Route::post('store',[HeadlineController::class,'store'])->name('headlines.store');
        Route::get('edit/{headlines_id}',[HeadlineController::class,'edit'])->name('headlines.edit');
        Route::put('update/{headlines_id}',[HeadlineController::class,'update'])->name('headlines.update');
        Route::delete('remove/{headlines_id}',[HeadlineController::class,'remove'])->name('headlines.remove');

    });
    Route::prefix('videos')->group(function()
    {
        Route::get('',[VideoController::class,'all'])->name('videos.all');
        Route::get('create',[VideoController::class,'create'])->name('videos.create');
        Route::post('store',[VideoController::class,'store'])->name('videos.store');
        Route::get('edit/{videos_id}',[VideoController::class,'edit'])->name('videos.edit');
        Route::patch('update/{videos_id}',[VideoController::class,'update'])->name('videos.update');
        Route::delete('remove/{videos_id}',[VideoController::class,'remove'])->name('videos.remove');
    });
    Route::get('panel',[PanelController::class,'index'])->name('admin.panel');
});
