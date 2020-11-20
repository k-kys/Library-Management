<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
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
// STUDENT
Route::get('/', function () {
    return view('index');
})->name('index');
Route::post('/login', [StudentController::class, 'login'])->name('login');
Route::post('/register', [StudentController::class, 'register'])->name('register');
Route::get('/logout', [StudentController::class, 'logout'])->name('logout');
Route::get('/dashboard/{id}', [StudentController::class, 'dashboard'])->name('dashboard');

Route::get('/profile/{id}', [StudentController::class, 'profile'])->name('profile');
Route::put('/profile/{id}', [StudentController::class, 'update'])->name('update');
Route::get('/change-password/{id}', [StudentController::class, 'changePassword'])->name('changePassword');
Route::put('/update-password/{id}', [StudentController::class, 'updatePassword'])->name('updatePassword');
Route::get('/book-borrowed/{id}', [StudentController::class, 'bookLoan'])->name('book-borrowed');
Route::view('/forgot-password', 'forgot-password')->name('forgot-password');
Route::post('/forgot-password', [StudentController::class, 'forgotPassword'])->name('forgotPassword');

// ADMIN
Route::view('/admin-register', 'admin-register')->name('admin.getRegister');
Route::post('/admin-register', [AdminController::class, 'register'])->name('admin.register');
Route::view('/admin-login', 'admin-login')->name('admin.getLogin');
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login');

Route::prefix('admin')->group(function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard/{id}', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('change-password/{id}', [AdminController::class, 'changePassword'])->name('admin.changePassword');
    Route::put('update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    // Author
    Route::get('add-author', [AuthorController::class, 'addAuthor'])->name('admin.addAuthor');
    Route::post('store-author', [AuthorController::class, 'storeAuthor'])->name('admin.storeAuthor');
    Route::get('manage-author', [AuthorController::class, 'manageAuthor'])->name('admin.manageAuthor');
    Route::get('edit-author/{id}', [AuthorController::class, 'editAuthor'])->name('admin.editAuthor');
    Route::put('update-author/{id}', [AuthorController::class, 'updateAuthor'])->name('admin.updateAuthor');
    Route::delete('delete-author/{id}', [AuthorController::class, 'deleteAuthor'])->name('admin.deleteAuthor');
    // Category
    Route::get('add-category', [CategoryController::class, 'addCategory'])->name('admin.addCategory');
    Route::post('store-category', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('manage-category', [CategoryController::class, 'manageCategory'])->name('admin.manageCategory');
    Route::get('edit-category/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('update-category/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');
    // Book
    Route::get('add-book', [BookController::class, 'addBook'])->name('admin.addBook');
    Route::post('store-book', [BookController::class, 'storeBook'])->name('admin.storeBook');
    Route::get('manage-book', [BookController::class, 'manageBook'])->name('admin.manageBook');
    Route::get('edit-book/{id}', [BookController::class, 'editBook'])->name('admin.editBook');
    Route::put('update-book/{id}', [BookController::class, 'updateBook'])->name('admin.updateBook');
    Route::delete('delete-book/{id}', [BookController::class, 'deleteBook'])->name('admin.deleteBook');
    // Book loan
    Route::get('add-bookloan', [BookLoanController::class, 'addBookLoan'])->name('admin.addBookLoan');
    Route::post('store-bookloan', [BookLoanController::class, 'storeBookLoan'])->name('admin.storeBookLoan');
    Route::get('manage-bookloan', [BookLoanController::class, 'manageBookLoan'])->name('admin.manageBookLoan');
    Route::get('edit-bookloan/{id}', [BookLoanController::class, 'editBookLoan'])->name('admin.editBookLoan');
    Route::put('update-bookloan/{id}', [BookLoanController::class, 'updateBookLoan'])->name('admin.updateBookLoan');
    Route::delete('delete-bookloan/{id}', [BookLoanController::class, 'deleteBookLoan'])->name('admin.deleteBookLoan');
    // Student
    Route::get('manage-student', [AdminController::class, 'manageStudent'])->name('admin.manageStudent');
    Route::get('active-student/{id}', [AdminController::class, 'activeStudent'])->name('admin.activeStudent');
    Route::get('block-student/{id}', [AdminController::class, 'blockStudent'])->name('admin.blockStudent');
});
