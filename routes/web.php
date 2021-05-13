<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\CategoryController;

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

Route::post('/admin/permission/updateUserPermission',[PermissionController::class,'updateUserPermission'])->name('admin.permission.updateUserPermission');
Route::get('/admin/permission/getUserPermission',[PermissionController::class,'getUserPermission'])->name('admin.permission.getUserPermission');
Route::get('/admin/permission',[PermissionController::class,'index'])->name('admin.permission');
Route::resource('category',CategoryController::class);
Route::get('admin/views/create',[AdminController::class,'create'])->name('admin.create');
Route::get('admin/views/edit',[AdminController::class,'create'])->name('admin.edit');
Route::get('/', [PageController::class, 'index'])->middleware('auth', 'verified');
Route::get('/changeStatus', [AdminController::class,'ChangeBlogStatus'])->name('admin.changeStatus');
Route::get('/changeUserStatus', [AdminController::class,'ChangeUserStatus'])->name('admin.changeUserStatus');
Route::resource('/user', UserController::class);
Route::resource('/blog', PostController::class);
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
Route::post('/blog/commentsDisplay', [CommentController::class, 'rejectStatus'])->name('comment.reject');
Route::post('/blog/commentsDisplay/1', [CommentController::class, 'approveStatus'])->name('comment.approve');
Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/admin/views/datatable',[AdminController::class,'datatable'])->name('admin.datatable');
Route::get('/admin/views/userinfo',[AdminController::class,'userinfo'])->name('admin.userinfo');
Route::get('/admin/views/dashboard1',[AdminController::class,'dashboardpanel'])->name('admin.dashboard1');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin'],function (){
    Route::group(['middleware'=>'admin.guest:admin'],function (){
        Route::view('login','admin.login')->name('admin.login');
        Route::post('login',[App\Http\Controllers\AdminController::class,'login'])
            ->name('admin.auth');
    });
    Route::group(['middleware'=>'admin.auth'],function (){
        Route::view('dashboard','admin.views.dashboard1')
            ->name('admin.home');
        Route::post('logout',[App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
    });
});


