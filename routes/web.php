<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Use_;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\CastController;

Route::get('/', function () {
    return view('welcome');
});

// 管理画面
Route::group(['prefix' => '/admin', 'as' => 'admin.'],function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('works', WorkController::class);
});
// キャスト検索
Route::get('/admin/casts/search', [CastController::class, 'search']);
