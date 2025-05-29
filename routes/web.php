<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\TaskManager;
use App\Livewire\Counter;
use App\Livewire\InputPreview;
use App\Livewire\VisibilityToggle;
use App\Livewire\UserProfile;


Route::get('/tasks', TaskManager::class)
    ->name('tasks.index');

Route::get('/counter', Counter::class)
    ->name('counter');
Route::get('/visibility-toggle', VisibilityToggle::class)
    ->name('visibility-toggle');
Route::get('/user-profile', UserProfile::class)
    ->name('user-profile');
Route::get('/input-preview', InputPreview::class)
    ->name('input-preview');


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});




require __DIR__.'/auth.php';