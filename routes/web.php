<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OnlineBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RackController;
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

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('index');
        Route::post('add', [ProfileController::class, 'add'])->name('add');
        Route::post('edit/{profile}', [ProfileController::class, 'edit'])->name('edit');
        Route::get('delete/{profile}', [ProfileController::class, 'delete'])->name('delete');
    });

    Route::prefix('rack')->name('rack.')->group(function () {
        Route::get('', [RackController::class, 'index'])->name('index');
        Route::post('add', [RackController::class, 'add'])->name('add');
        Route::post('edit/{rack}', [RackController::class, 'edit'])->name('edit');
        Route::get('delete/{rack}', [RackController::class, 'delete'])->name('delete');
    });
    Route::prefix('faculty')->name('faculty.')->group(function () {
        Route::get('', [FacultyController::class, 'index'])->name('index');
        Route::post('add', [FacultyController::class, 'add'])->name('add');
        Route::post('edit/{faculty}', [FacultyController::class, 'edit'])->name('edit');
        Route::get('delete/{faculty}', [FacultyController::class, 'delete'])->name('delete');
    });
    Route::prefix('bookcategory')->name('bookcategory.')->group(function () {
        Route::get('', [BookCategoryController::class, 'index'])->name('index');
        Route::post('add', [BookCategoryController::class, 'add'])->name('add');
        Route::post('edit/{cat}', [BookCategoryController::class, 'edit'])->name('edit');
        Route::get('delete/{cat}', [BookCategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('book')->name('book.')->group(function () {
        Route::get('', [BookController::class, 'index'])->name('index');
        Route::post('load', [BookController::class, 'load'])->name('load');
        Route::post('search', [BookController::class, 'search'])->name('search');
        Route::match(['GET', 'POST'], 'add', [BookController::class, 'add'])->name('add');
        Route::match(['GET', 'POST'], 'edit/{book}', [BookController::class, 'edit'])->name('edit');
        // Route::post('edit', [BookController::class, 'edit'])->name('edit');
        Route::get('delete/{book}', [BookController::class, 'delete'])->name('delete');
    });
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('', [MemberController::class, 'index'])->name('index');
        Route::match(['get', 'post'], 'add', [MemberController::class, 'add'])->name('add');
        Route::match(['get', 'post'], 'search', [MemberController::class, 'search'])->name('search');
        Route::match(['get', 'post'], 'edit/{member}', [MemberController::class, 'edit'])->name('edit');
        Route::get('delete/{member}', [MemberController::class, 'delete'])->name('delete');
    });
    Route::prefix('bookIssue')->name('bookIssue.')->group(function () {
        Route::get('', [BookIssueController::class, 'index'])->name('index');
        Route::post('add', [BookIssueController::class, 'add'])->name('add');
        Route::post('submit', [BookIssueController::class, 'submit'])->name('submit');
        Route::post('edit/{issue}', [BookIssueController::class, 'edit'])->name('edit');
        // Route::match(['get', 'post'], 'edit/{issue}', [BookIssueController::class, 'edit'])->name('edit');
        Route::get('delete/{issue}', [BookIssueController::class, 'delete'])->name('delete');
    });
    Route::prefix('onlineBook')->name('onlineBook.')->group(function () {
        Route::get('', [OnlineBookController::class, 'index'])->name('index');
        Route::post('add', [OnlineBookController::class, 'add'])->name('add');
        Route::post('edit/{ob}', [OnlineBookController::class, 'edit'])->name('edit');
        Route::get('delete/{ob}', [OnlineBookController::class, 'delete'])->name('delete');
    });
    Route::prefix('fine')->name('fine.')->group(function () {
        Route::get('', [FineController::class, 'index'])->name('index');
        Route::post('add', [FineController::class, 'add'])->name('add');
        Route::get('delete/{fine}', [FineController::class, 'delete'])->name('delete');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    });
});

Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout'])->name('logout');
