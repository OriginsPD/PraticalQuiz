<?php

use App\Http\Controllers\logoutController;
use App\Http\Livewire\Dashboard\Admin\AdminIndex;
use App\Http\Livewire\Dashboard\Admin\AdminSchedule;
use App\Http\Livewire\Dashboard\Admin\AdminStudent;
use App\Http\Livewire\Dashboard\Admin\AdminTeacher;
use App\Http\Livewire\Home\LandingPage;
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

Route::get('/', LandingPage::class)->name('index');

Route::group(['as' => 'admin.'], function () {

    Route::get('/Admin/Dashboard', AdminIndex::class)->name('dashboard');
    Route::get('/Admin/TeacherDetails', AdminTeacher::class)->name('teacher');
    Route::get('/Admin/StudentDetails', AdminStudent::class)->name('student');
    Route::get('/Admin/ScheduleDetails', AdminSchedule::class)->name('schedule');

});

Route::get('/logout', logoutController::class);
