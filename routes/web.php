<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});


Route::get('login/{provider}', [SocialController::class,'redirect'],function($provider)
{

});
Route::get('login/{provider}/callback',[SocialController::class, 'Callback'],function($provider)
{

});


// Route::get('login/facebook/callback',[SocialController::class,'callback']);
// Route::get('login/facebook', [SocialController::class,'redirect']);

// Route::get('login/google/callback',[SocialController::class,'callback']);
// Route::get('login/google', [SocialController::class,'redirect']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index']);

Route::get('logout', function () {
    if(session()->has('email'))
    {
       // session()->pull('email');
       // session_unset();
       Auth::logout();
        echo " <script>alert('Thank You....');window.location.href='/'</script> ";
      //  return redirect('login');
    }
    else
    {
        
       echo " <script>alert('Some error occured')</script> ";
      // return redirect('user');
    }
   
 });

//admin 
Route::get('admin', [AdminController::class,'basic'],function () {
    return view('admin');
});

Route::post('add_product', [AdminController::class,'add_product'],function () {
    return view('admin');
});

Route::get('edit_product', [AdminController::class,'edit_product'],function () {
    return view('admin');
});

Route::get('delete_product', [AdminController::class,'delete_product'],function () {
    return view('admin');
});


Route::post('edit_product_submit', [AdminController::class,'edit_product_submit'],function () {
  
});

Route::post('edit_admin', [AdminController::class,'edit_admin'],function () {
  
});

//user

Route::get('add_to_cart', [UserController::class,'add_to_cart'],function () {
    return view('admin');
});


Route::get('temp',function()
{
    return view('auth.temp');
});