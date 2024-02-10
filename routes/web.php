<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [UserController::class,"index"])->name("index");
Route::get("/users/store", function () {return view('users.store');});
Route::resource("users", UserController::class);

//routes:
// Method       URI                     Action        Route Name
// GET          /users                  index         users.index
// GET          /users/create           create        users.create
// POST         /users                  store         users.store
// GET          /users/{user}           show          users.show
// GET          /users/{user}/edit      edit          users.edit
// PUT/PATCH    /users/{user}           update        users.update
// DELETE       /users/{user}           destroy       users.destroy