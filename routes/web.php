<?php

use App\Http\Livewire\Service;
use App\Http\Livewire\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/aprovacao', function () {
    return view('approval');
})->name('approval');

Route::middleware(['auth:sanctum', 'verified', 'approved'])->group(function () {
    Route::get('servicos', Service\Index::class)->name('service');
    Route::get('servicos/cadastrar', Service\Create::class)->name('service.create');
    Route::get('servicos/{service}/editar', Service\Edit::class);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/users', User\Index::class)->name('admin.users.index');
    Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
});