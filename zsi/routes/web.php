<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\Client\HomeController::class, 'index'])->name('/');
Route::get('/about/overview/',[App\Http\Controllers\Client\AboutController::class, 'overview'])->name('/about/overview/');
Route::get('/events/',[App\Http\Controllers\Client\EventsController::class, 'index'])->name('/events/');
Route::get('/courses/',[App\Http\Controllers\Client\CourcesController::class, 'index'])->name('/courses/');
Route::get('/articles/',[App\Http\Controllers\Client\ArticlesController::class, 'index'])->name('/articles/');
Route::get('/contact/',[App\Http\Controllers\Client\ContactController::class, 'index'])->name('/contact/');


Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('/admin/dashboard/');
    Route::get('/admin/articles/',[App\Http\Controllers\Admin\ArticlesController::class, 'index'])->name('/admin/articles/');
    Route::post('/admin/articles/store/',[App\Http\Controllers\Admin\ArticlesController::class, 'store'])->name('/admin/articles/store/');
    Route::patch('/admin/articles/update/{id}', [App\Http\Controllers\Admin\ArticlesController::class, 'update'])->name('/admin/articles/update/');
    Route::delete('/admin/articles/delete/{id}', [App\Http\Controllers\Admin\ArticlesController::class, 'destroy'])->name('admin/articles/destroy');


    Route::get('/admin/resources/',[App\Http\Controllers\Admin\ResourcesController::class, 'index'])->name('/admin/resources/');
    Route::post('/admin/content-resource/store/', [App\Http\Controllers\Admin\ResourcesController::class, 'store'])->name('admin/content-resource/store/');
    Route::patch('/admin/content-resource/update/{id}', [App\Http\Controllers\Admin\ResourcesController::class, 'update'])->name('admin/content-resource/update/');
    Route::delete('/admin/content-resource/delete/{id}', [App\Http\Controllers\Admin\ResourcesController::class, 'destroy'])->name('admin/content-resource/destroy/');


    Route::get('/admin/events/',[App\Http\Controllers\Admin\EventsController::class, 'index'])->name('/admin/events/');
    Route::post('/admin/events/store/',[App\Http\Controllers\Admin\EventsController::class, 'store'])->name('/admin/events/store/');
    Route::patch('/admin/events/update/{id}',[App\Http\Controllers\Admin\EventsController::class, 'update'])->name('/admin/events/update/');
    Route::delete('/admin/events/delete/{id}',[App\Http\Controllers\Admin\EventsController::class, 'destroy'])->name('/admin/events/delete/');

    Route::get('/admin/courses/',[App\Http\Controllers\Admin\CoursesController::class, 'index'])->name('/admin/courses/');
    Route::post('/admin/courses/store/',[App\Http\Controllers\Admin\CoursesController::class, 'store'])->name('/admin/courses/store/');
    Route::patch('/admin/courses/update/{id}',[App\Http\Controllers\Admin\CoursesController::class, 'update'])->name('/admin/courses/update/');
    Route::patch('/admin/courses/update/status/{id}',[App\Http\Controllers\Admin\CoursesController::class, 'toggleStatus'])->name('/admin/courses/update/status/');
    Route::delete('/admin/courses/delete/{id}',[App\Http\Controllers\Admin\CoursesController::class, 'delete'])->name('/admin/courses/delete/');

    Route::post('/admin/courses/attachments/store/{course}/',[App\Http\Controllers\Admin\CoursesController::class, 'storeAttachment'])->name('/admin/courses/attachments/store/');
    Route::delete('/admin/courses/attachments/delete/{id}',[App\Http\Controllers\Admin\CoursesController::class, 'destroyAttachment'])->name('/admin/courses/attachments/delete/');

    Route::get('/admin/members/',[App\Http\Controllers\Admin\MembersController::class, 'index'])->name('/admin/members/');
    Route::post('/admin/members/store/',[App\Http\Controllers\Admin\MembersController::class, 'store'])->name('/admin/members/store/');
    Route::patch('/admin/members/update/{id}',[App\Http\Controllers\Admin\MembersController::class, 'update'])->name('/admin/members/update/');
    Route::delete('/admin/members/delete/{id}',[App\Http\Controllers\Admin\MembersController::class, 'destroy'])->name('/admin/members/delete/');

});

// Redirect to login if session expired
Route::fallback(function () {
    return redirect('/');
});

require __DIR__.'/auth.php';
