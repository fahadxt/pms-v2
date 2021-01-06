<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/' , \App\Http\Livewire\Home::class)->name('home');
    
    Route::get('/projects' , \App\Http\Livewire\Projects\index::class)->name('projects.index');
    Route::get('/projects/{id}' , \App\Http\Livewire\Projects\Show::class)->name('projects.show');
    Route::get('/projects/{projectsid}/tasks' , \App\Http\Livewire\Tasks\Index::class)->name('tasks.index');
    Route::get('/projects/{projectsid}/tasks/{id}' , \App\Http\Livewire\Tasks\Show::class)->name('tasks.show');

    Route::get('/dashboard' , App\Http\Livewire\Dashboard\Index::class)->name('dashboard.index');
    
});
