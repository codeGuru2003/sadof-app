<?php

use App\Http\Controllers\BirthMonthController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PositionController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
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
    $totalpayment = DB::table('payments')->sum('amount');
    $totalmember = DB::table('members')->count('*');
    $totalmales = DB::table('members')->where('gender_id','=','1')->count('*');
    $totalfemales = DB::table('members')->where('gender_id','=','2')->count('*');
    return view('home/index',[
        'title' => 'Dashboard',
        'totalpayment' => $totalpayment,
        'totalmember' => $totalmember,
        'totalmales' => $totalmales,
        'totalfemales' => $totalfemales,
    ]);
})->name('home.index')->middleware('auth');

Route::get('/genders',[GenderController::class, 'index'])->name('genders.index')->middleware('auth');
Route::get('/genders/create',[GenderController::class, 'create'])->name('genders.create')->middleware('auth');
Route::post('/genders/create',[GenderController::class, 'store'])->name('genders.store')->middleware('auth');
Route::get('/genders/edit/{id}',[GenderController::class, 'edit'])->name('genders.edit')->middleware('auth');
Route::post('/genders/edit/{id}',[GenderController::class, 'update'])->name('genders.update')->middleware('auth');
Route::post('/genders/delete/{id}',[GenderController::class, 'destroy'])->name('genders.delete')->middleware('auth');

Route::get('/birthmonths', [BirthMonthController::class, 'index'])->name('birthmonths.index')->middleware('auth');
Route::get('/birthmonths/create',[BirthMonthController::class, 'create'])->name('birthmonths.create')->middleware('auth');
Route::post('/birthmonths/create',[BirthMonthController::class, 'store'])->name('birthmonths.store')->middleware('auth');
Route::get('/birthmonths/edit/{id}',[BirthMonthController::class, 'edit'])->name('birthmonths.edit')->middleware('auth');
Route::post('/birthmonths/edit/{id}',[BirthMonthController::class, 'update'])->name('birthmonths.update')->middleware('auth');
Route::post('/birthmonths/delete/{id}',[BirthMonthController::class, 'destroy'])->name('birthmonths.delete')->middleware('auth');

Route::get('/paymenttypes', [PaymentTypeController::class, 'index'])->name('paymenttypes.index')->middleware('auth');
Route::get('/paymenttypes/create',[PaymentTypeController::class, 'create'])->name('paymenttypes.create')->middleware('auth');
Route::post('/paymenttypes/create',[PaymentTypeController::class, 'store'])->name('paymenttypes.store')->middleware('auth');
Route::get('/paymenttypes/edit/{id}',[PaymentTypeController::class, 'edit'])->name('paymenttypes.edit')->middleware('auth');
Route::post('/paymenttypes/edit/{id}',[PaymentTypeController::class, 'update'])->name('paymenttypes.update')->middleware('auth');
Route::post('/paymenttypes/delete/{id}',[PaymentTypeController::class, 'destroy'])->name('paymenttypes.delete')->middleware('auth');

Route::get('/positions', [PositionController::class, 'index'])->name('positions.index')->middleware('auth');
Route::get('/positions/create',[PositionController::class, 'create'])->name('positions.create')->middleware('auth');
Route::post('/positions/create',[PositionController::class, 'store'])->name('positions.store')->middleware('auth');
Route::get('/positions/edit/{id}',[PositionController::class, 'edit'])->name('positions.edit')->middleware('auth');
Route::post('/positions/edit/{id}',[PositionController::class, 'update'])->name('positions.update')->middleware('auth');
Route::post('/positions/delete/{id}',[PositionController::class, 'destroy'])->name('positions.delete')->middleware('auth');

Route::get('/members', [MemberController::class, 'index'])->name('members.index')->middleware('auth');
Route::get('/members/create',[MemberController::class, 'create'])->name('members.create')->middleware('auth');
Route::post('/members/create',[MemberController::class, 'store'])->name('members.store')->middleware('auth');
Route::get('/members/edit/{id}',[MemberController::class, 'edit'])->name('members.edit')->middleware('auth');
Route::post('/members/edit/{id}',[MemberController::class, 'update'])->name('members.update')->middleware('auth');
Route::get('/members/details/{id}',[MemberController::class, 'show'])->name('members.details')->middleware('auth');
Route::post('/members/delete/{id}',[MemberController::class, 'destroy'])->name('members.delete')->middleware('auth');
Route::post('members/upload',[MemberController::class, 'upload'])->name('members.upload')->middleware('auth');
Route::get('members/export',[MemberController::class, 'exportToCSV'])->name('members.export')->middleware('auth');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index')->middleware('auth');
Route::get('/payments/create',[PaymentController::class, 'create'])->name('payments.create')->middleware('auth');
Route::post('/payments/create',[PaymentController::class, 'store'])->name('payments.store')->middleware('auth');
Route::get('/payments/edit/{id}',[PaymentController::class, 'edit'])->name('payments.edit')->middleware('auth');
Route::patch('/payments/{id}',[PaymentController::class, 'update'])->name('payments.update')->middleware('auth');
Route::get('/payments/details/{id}',[PaymentController::class, 'show'])->name('payments.details')->middleware('auth');
Route::post('/payments/delete/{id}',[PaymentController::class, 'destroy'])->name('payments.delete')->middleware('auth');

Auth::routes();
Route::get('/users', function(){
    $users = User::all();
    return view('users.index',[
        'title' => 'Manage Users',
        'users' => $users,
    ]);
})->name('user');
