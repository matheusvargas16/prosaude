<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\SuporteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Novas rotas
Route::middleware('auth')->group(function () {
    Route::get('/comprar-planos', [PlanoController::class, 'showCompra'])->name('comprar.planos');
    Route::get('/comprar', [PlanoController::class, 'showCompra'])->name('comprarPlanos');

    
    Route::get('/comprar/{id}', [PlanoController::class, 'finalizarCompra'])->name('finalizar.compra');
    Route::post('/comprar/{id}', [PlanoController::class, 'finalizarCompra'])->name('finalizar.compra.post');
    Route::post('/confirmar-compra/{id}', [PlanoController::class, 'confirmarCompra'])->name('confirmar.compra');
    

    Route::get('/plano/{id}/detalhes', [PlanoController::class, 'detalhes'])->name('plano.detalhes');

    Route::get('/comparar', [PlanoController::class, 'showComparisonForm'])->name('compararPlanosForm');
    Route::post('/comparar', [PlanoController::class, 'comparar'])->name('compararPlanos');

    Route::get('/pesquisar', [PlanoController::class, 'showSearchForm'])->name('pesquisarPlanos');

    
    // Rota para exibir todos os tickets do usuário logado
    Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte.index');

    // Rota para exibir o formulário de criação de um novo ticket
    Route::get('/suporte/criar', [SuporteController::class, 'create'])->name('suporte.criar');

    // Rota para salvar o novo ticket
    Route::post('/suporte', [SuporteController::class, 'store'])->name('suporte.store');
    
    // Rota para exibir um ticket específico
    Route::get('/suporte/{id}', [SuporteController::class, 'show'])->name('suporte.show');

    // Rota para editar um ticket
    Route::get('/suporte/{id}/editar', [SuporteController::class, 'edit'])->name('suporte.edit');

    // Rota para atualizar um ticket
    Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suporte.edit');

    // Rota para excluir um ticket
    Route::delete('/suporte/{id}', [SuporteController::class, 'destroy'])->name('suporte.excluir');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
