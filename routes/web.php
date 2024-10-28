<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\MainInfoController;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\WebsideController;
use App\Http\Controllers\WebsiteController;
use App\Models\MainInfo;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;
use Illuminate\Support\Facades\Auth;
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



Route::resource('/mainInfo',MainInfoController::class);
Route::resource('/skills',SkillsController::class);
Route::resource('/experience',ExperiencesController::class);
Route::resource('/educations', EducationsController::class);
Route::resource('/services', ServicesController::class);
Route::resource('/portfolios', PortfoliosController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/website', [WebsiteController::class, 'index'])->name('website');
// Route::resource('/about', AboutController::class);

