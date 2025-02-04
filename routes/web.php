<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookmarkController;

Route::get('/', function (IndexController $indexController) {
    return $indexController->index();
})->name('index');


Route::group(
    ['prefix' => 'bookmark'],
    function () {

        Route::get('/{id}/edit', [BookmarkController::class, 'edit'])->name('bookmark.edit');//just load the edit page
        Route::patch('{id}', [BookmarkController::class, 'update'])->name('bookmark.update');//update the record
        Route::delete('{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    }
);
