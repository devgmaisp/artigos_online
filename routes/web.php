<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;

Route::redirect('/', '/artigos')->name('home');

use App\Http\Controllers\Public\ArtigoController;

// Rotas públicas para artigos
Route::get('/artigos', [ArtigoController::class, 'index'])->name('artigos.index');
Route::get('/artigos/{id}', [ArtigoController::class, 'show'])->name('artigos.show');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::middleware('aluno.ativo')->group(function () {
        Route::get('painel/aluno', [\App\Http\Controllers\PainelAlunoController::class, 'index'])->name('painel.aluno');
        Route::post('painel/aluno', [\App\Http\Controllers\PainelAlunoController::class, 'store'])->name('painel.aluno.store');
    });
});

require __DIR__.'/settings.php';
