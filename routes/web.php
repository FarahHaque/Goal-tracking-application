<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UseraddController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CollaborationController;
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

Auth::routes();

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
});

#Route::get('/user_dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user_dashboard');
#Route::post('/user_dashboard', [App\Http\Controllers\UserController::class, 'login'])->name('user_dashboard');
Route::get('/task_by_id/{id}', [App\Http\Controllers\TaskController::class, 'tasklist'])->name('task_by_id');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'goal' => GoalController::class,
        'task' => TaskController::class,
        'user' => UseraddController::class,
        'payment' => PaymentController::class

     /*   'mygoal' => MygoalController::class,
        'mytask' => MytaskController::class,
        'myprofile' => MyprofileController::class*/
    ]);
 
    Route::get('/payment-approve/{id}',[PaymentController::class, 'approve'])->name('payment.approve');
    
    Route::get('/payment-disapprove/{id}',[PaymentController::class, 'disapprove'])->name('payment.disapprove');
    Route::get('/search_user/{id}',[CollaborationController::class,'listUser'])->name('all_users');
    Route::post('/send-offer',[CollaborationController::class,'send'])->name('send_offer');
    Route::post('/accept-offer',[CollaborationController::class,'accept'])->name('accept_offer');
    Route::get('invitation-goal',[CollaborationController::class, 'collab'])->name('invitation_goal');
 });
 
 