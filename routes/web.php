<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

Route::get('/', [ MemberController::class, 'index' ])->name('index');
Route::get('/createmember', [ MemberController::class, 'createMember' ])->name('createmember');
Route::post('/storemember', [ MemberController::class, 'storeMember' ])->name('storemember');

