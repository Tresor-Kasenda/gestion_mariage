<?php

use App\Livewire\Home;
use App\Livewire\Pages\Candidats\AddCandidat;
use App\Livewire\Pages\Candidats\ListsCandidats;
use App\Livewire\Pages\Candidats\ShowCandidat;
use App\Livewire\Pages\Users\CreateUsers;
use App\Livewire\Pages\Users\ListsUsers;
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

Route::redirect('/', '/login');

Route::get('dashboard', Home::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('candidats', ListsCandidats::class)->name('candidats');
    Route::get('candidats/create', AddCandidat::class)->name('candidats.create');
    Route::get('candidats/{candidat}/detail', ShowCandidat::class)->name('candidat-show');
    Route::get('users', ListsUsers::class)->name('users');
    Route::get('users/create', CreateUsers::class)->name('users.create');
});
require __DIR__.'/auth.php';
