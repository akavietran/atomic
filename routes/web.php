<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AtomicController;
use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::controller(CountryController::class)->group(function () {
    Route::get('/', 'showCountry')->name('index');
    Route::get('/create', 'createCountry')->name('create');
    Route::post('/store', 'storeCountry')->name('store');
    Route::get('/edit/{id}', 'editCountry')->name('edit');
    Route::put('/update/{id}', 'updateCountry')->name('update');
    Route::delete('/destroy/{id}', 'destroyCountry')->name('destroy');
});
Route::resources(
    [
        'user' => UserController::class,
        'person' => PersonController::class,
        'company' => CompanyController::class,
        'role' => RoleController::class,
        'department' => DepartmentController::class,
        'project' => ProjectController::class,
        'task' => TaskController::class,
        'atomic'=> AtomicController::class,
    ],
    [
        'except' => ['show'],
    ],
);
Route::post('/projects/persons', [ProjectController::class, 'getPersons'])->name('projects.persons');
Route::post('/tasks/persons', [TaskController::class, 'getPersonsInProject'])->name('tasks.persons');
Route::get('/tasks/search', [TaskController::class, 'search'])->name('task.search');
Route::get('/tasks/export', [TaskController::class, 'exportExcel'])->name('tasks.export');

