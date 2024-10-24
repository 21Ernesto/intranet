<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\DocumentController as StudentDocumentController;
use App\Http\Controllers\Student\EventController as StudentEventController;
use App\Http\Controllers\Student\JustificationController as StudentJustificationController;
use App\Http\Controllers\Student\NewsController as StudentNewsController;
use App\Livewire\CategoryManager;
use App\Livewire\CreatePost;
use App\Livewire\JustificationComponent;
use App\Livewire\LevelManager;
use App\Livewire\PostIndex;
use App\Livewire\PostShow;
use App\Livewire\RoleManager;
use App\Livewire\UserManager;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/comando', function () {
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    Artisan::call('migrate', ['--seed' => true]);

    return 'Comandos ejecutados satisfactoriamente.';
});

// Rutas públicas para estudiantes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/noticias', [StudentNewsController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/{id}', [StudentNewsController::class, 'show'])->name('noticias.show');

    Route::get('/eventos', [StudentEventController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/{id}', [StudentEventController::class, 'show'])->name('eventos.show');

    Route::get('/documentos', [StudentDocumentController::class, 'index'])->name('documentos.index');
    Route::get('/documentos/{id}', [StudentDocumentController::class, 'show'])->name('documentos.show');

    Route::get('/cursos', [StudentCourseController::class, 'index'])->name('cursos.index');
    Route::get('/cursos/{id}', [StudentCourseController::class, 'show'])->name('cursos.show');

    Route::get('/justificacion', [StudentJustificationController::class, 'index'])->name('justificacion.index');
    Route::post('/justificacion', [StudentJustificationController::class, 'store'])->name('justificacion.store');
    Route::delete('/justificacion/{justification}', [StudentJustificationController::class, 'destroy'])->name('justificacion.destroy');

    Route::get('/foro', PostIndex::class)->name('post.index');
    Route::get('/foro/{postId}', PostShow::class)->name('post.show');

});

// Rutas protegidas para profesores y coordinadores
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:Docente,Coordinador'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/roles', RoleManager::class)->name('roles.index');
    Route::get('/levels', LevelManager::class)->name('levels.index');
    Route::get('/users', UserManager::class)->name('users.index');
    Route::get('/categories', CategoryManager::class)->name('categories.index');

    Route::resource('/news', NewsController::class)->names('news');
    Route::resource('/events', EventController::class)->names('events');
    Route::resource('/documents', DocumentController::class)->names('documents');
    Route::resource('/courses', CourseController::class)->names('courses');
    // Route::resource('/justifications', JustificationController::class)->names('justifications');
    Route::get('/courses/material/{course}', [CourseMaterialController::class, 'show'])->name('courses.material');

    Route::get('/post/create', CreatePost::class)->name('post.create');
    Route::get('/justifications', JustificationComponent::class)->name('justifications.index');



});
