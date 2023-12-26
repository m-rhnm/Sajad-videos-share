<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\HeadlineController;

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

// Route::get('/', function () {
//     return view('admin/index');
// });

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
    Route::get('panel',[PanelController::class,'index'])->name('admin.panel');
});
