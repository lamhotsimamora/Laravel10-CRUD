<?php

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
use App\Models\Users;
use App\Http\Controllers\c_users;


Route::get('/', function () {
    return view('home');
});

Route::get('/user/{id_user}', function (string $id_user) {
  
    $Users = Users::find($id_user);
    
    return view('users',$Users);
});



Route::post('/users',function(){
    return response()->json(Users::all());
});

Route::post('/add-user',[c_users::class, 'add']);
Route::post('/update-user',[c_users::class, 'update']);
Route::post('/users-delete',[c_users::class, 'delete']);