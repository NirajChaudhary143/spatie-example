<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if ($user->roles->contains('name','user')) {
        return redirect('/user');
    } else{
        return redirect('/admin');
    }
    // return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:admin|writer')->group(function () {
    Route::get('/admin',[IndexController::class,'index'])->name('admin.index');
    Route::get('/admin/add-roles',[RoleController::class,'index'])->name('admin.addRole');
    Route::post('/admin/add-roles',[RoleController::class,'storeRole'])->name('admin.storeRole');
    Route::get('/admin/view-roles',[RoleController::class,'viewRoles'])->name('admin.viewRoles');
    Route::get('/admin/delete-roles/{id}',[RoleController::class,'deleteRole'])->name('admin.deleteRole');
    Route::get('/admin/edit-roles/{id}',[RoleController::class,'editRole'])->name('admin.editRole');
    Route::post('/admin/edit-roles/{id}',[RoleController::class,'updateRole'])->name('admin.updateRole');
});
Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user',function(){
        return view('user');
    });
});
require __DIR__.'/auth.php';
