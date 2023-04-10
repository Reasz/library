<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
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

Route::get('/', function () {
	return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\BookCommentsController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\RentController;

Route::get('/', function () {
	return redirect('/dashboard'); })->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/books', [BookController::class, 'books'])->name('books');
Route::get('/books-{book:id}', [BookController::class, 'book'])->name('book');
Route::post('/books-{book:id}-comments', [BookCommentsController::class, 'store']);

Route::get('/favorites', [FavoriteController::class, 'show'])->middleware('auth')->name('favorites');
Route::delete('/favorites-{favorite:id}', [FavoriteController::class, 'destroy'])->middleware('auth');
Route::post('favorites', [FavoriteController::class, 'store'])->middleware('auth');

Route::get('/reads', [ReadController::class, 'show'])->middleware('auth')->name('reads');
Route::delete('/reads-{read:id}', [ReadController::class, 'destroy'])->middleware('auth');
Route::post('reads', [ReadController::class, 'store'])->middleware('auth');

Route::get('/rent-{book:id}', [RentController::class, 'show'])->middleware('can:admin')->name('rent');
Route::post('/rent-{book:id}', [RentController::class, 'store'])->middleware('can:admin');
Route::delete('/back-{rent:id}', [RentController::class, 'destroy'])->middleware('can:admin')->name('giveback');
Route::get('/rent', [RentController::class, 'index'])->middleware('can:admin')->name('rent');


Route::get('admin-books', [AdminBookController::class, 'index'])->middleware('can:admin')->name('admin-books');
Route::post('admin-books', [AdminBookController::class, 'store'])->middleware('can:admin');
Route::get('admin-book-create', [AdminBookController::class, 'create'])->middleware('can:admin')->name('admin-book-create');

Route::get('admin-author-create', [AdminAuthorController::class, 'create'])->middleware('can:admin')->name('admin-author-create');
Route::post('admin-authors', [AdminAuthorController::class, 'store'])->middleware('can:admin');

Route::get('/admin-book-{book:id}-edit', [AdminBookController::class, 'edit'])->middleware('can:superadmin')->name('admin-book-edit');
Route::patch('/admin-book-{book:id}', [AdminBookController::class, 'update'])->middleware('can:superadmin')->name('admin-book-edit');
Route::delete('/admin-book-{book:id}', [AdminBookController::class, 'destroy'])->middleware('can:superadmin')->name('admin-book-delete');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');


});