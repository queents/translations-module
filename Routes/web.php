<?php

use Illuminate\Support\Facades\Route;
use Modules\Translations\Http\Controllers\TranslationsController;
use Modules\Translations\Vilt\Resources\TranslationsResource;

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

Route::post('translations/switch', [TranslationsResource::class, 'change'])->name('translations.switch');
