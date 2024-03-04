<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\FeedController;
use App\Http\Controllers\Cart\MultiSearchController;

Route::get('/bascet/thencs', [CartController::class, "thencs"])->name("bascet_thencs");
Route::get('/bascet', [CartController::class, "index"])->name("bascet");
Route::post('/bascet/add', [CartController::class, "add"])->name("bascet_add");
Route::post('/bascet/update', [CartController::class, "update"])->name("bascet_update");
Route::get('/bascet/get', [CartController::class, "get_all"])->name("bascet_get");
Route::delete('/bascet/clear', [CartController::class, "clear"])->name("bascet_clear");
Route::delete('/bascet/delete', [CartController::class, "delete"])->name("bascet_delete");
Route::post('/bascet/send', [CartController::class, "send"])->name("bascet_send");
Route::post('/bascet/ocsend', [CartController::class, "send_oc"])->name("bascet_oc_send");

Route::get('/yml-feed/{slug}', [FeedController::class, "yml_actegory"])->name('yml_actegory');

Route::get('/multi_search', [MultiSearchController::class, "index"])->name('multi_search');
