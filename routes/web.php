<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;


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

Route::get('/admin/settings', [AdminController::class, 'generalSettings'])->name('admin.settings');
Route::post('/admin/settings', [AdminController::class, 'updateGeneralSettings'])->name('admin.settings.update');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/hero-settings', [AdminController::class, 'heroSettings'])->name('admin.hero.settings');
Route::post('/admin/hero-settings', [AdminController::class, 'updateHeroSettings'])->name('admin.hero.update');
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
Route::get('/services', [AdminController::class, 'index'])->name('admin.services');
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
Route::post('/admin/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
Route::get('/admin/projects/{id}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
Route::post('/admin/projects/{id}/update', [AdminController::class, 'updateProject'])->name('admin.projects.update');
Route::delete('/admin/projects/{id}', [AdminController::class, 'deleteProject'])->name('admin.projects.delete');
Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
Route::post('/admin/services/{id}/update', [AdminController::class, 'updateService'])->name('admin.services.update');
Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
Route::get('/admin/services', [AdminController::class, 'index'])->name('admin.services.index');
Route::get('/profile-settings', [AdminController::class, 'profileSettings'])->name('admin.profile.settings');
Route::post('/profile-settings', [AdminController::class, 'updateProfileSettings'])->name('admin.profile.update');
Route::get('/admin/profile-settings', [AdminController::class, 'profileSettings'])->name('admin.profile.settings');
Route::post('/admin/profile-settings', [AdminController::class, 'updateProfileSettings'])->name('admin.profile.update');
Route::post('/profile-settings', [AdminController::class, 'updateProfileSettings'])->name('admin.profile_settings.update');
        Route::get('/profile-settings', [AdminController::class, 'profileSettings'])->name('admin.profile_settings');
Route::get('/about-settings', [AdminController::class, 'aboutSettings'])->name('admin.about_settings');
Route::post('/about-settings', [AdminController::class, 'updateAboutSettings'])->name('admin.about_settings.update');
    Route::get('/about-settings', [AdminController::class, 'aboutSettings'])->name('admin.about.settings');
Route::post('/about-settings', [AdminController::class, 'updateAboutSettings'])->name('admin.about.update');
Route::post('/admin/about-settings', [AdminController::class, 'updateAboutSettings'])->name('admin.about.update');

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/', [HomeController::class, 'index']);

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
    // ...
});
