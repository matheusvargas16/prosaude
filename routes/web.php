<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ApoliceController;
use App\Http\Controllers\SuporteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PlanosController;
use App\Http\Controllers\Admin\SuporteAdminController;
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

    // Rota para exibir o formulário de edição
    Route::get('/suporte/{id}/edit', [SuporteController::class, 'edit'])->name('suporte.edit');

    // Rota para atualização do ticket
    Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suporte.update');

    // Rota para excluir um ticket
    Route::delete('/suporte/{id}', [SuporteController::class, 'destroy'])->name('suporte.destroy');

    // Rota para cancelar a apólice
    Route::put('/cancelar-apolice/{id}', [ApoliceController::class, 'cancel'])->name('cancelar.apolice');

    Route::get('/historico-apolices', [ApoliceController::class, 'historico'])->name('historico.apolices');



    Route::post('/compra/{id}/finalizar', [PlanoController::class, 'confirmarCompra'])->name('confirmar.compra');
    Route::get('/apolice/gerar/{id}', [ApoliceController::class, 'gerarApolice'])->name('apolice.gerar');


    Route::get('/apolice/{id}/renovar', [ApoliceController::class, 'mostrarRenovacao'])->name('apolice.renovar');
    Route::put('/apolice/{id}/renovar/confirmar', [ApoliceController::class, 'renovar'])->name('apolice.renovar.confirmar');


});


Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard do admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Gerenciamento de usuários
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/admin/usuarios/create', [UserController::class, 'create'])->name('admin.usuarios.create');
    Route::post('/admin/usuarios', [UserController::class, 'store'])->name('admin.usuarios.store');
    Route::get('/admin/usuarios/{user}/edit', [UserController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{user}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/admin/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
    
    // Gerenciamento de planos
    Route::get('/admin/planos', [PlanosController::class, 'index'])->name('admin.planos.index');
    Route::get('/admin/planos/create', [PlanosController::class, 'create'])->name('admin.planos.create');
    Route::post('/admin/planos', [PlanosController::class, 'store'])->name('admin.planos.store');
    Route::get('/admin/planos/{plano}/edit', [PlanosController::class, 'edit'])->name('admin.planos.edit');
    Route::put('/admin/planos/{plano}', [PlanosController::class, 'update'])->name('admin.planos.update');
    Route::delete('/admin/planos/{plano}', [PlanosController::class, 'destroy'])->name('admin.planos.destroy');
    
    // Gerenciamento de suporte (tickets)
    Route::get('/admin/suporte', [SuporteAdminController::class, 'index'])->name('admin.suporte.index');
    Route::put('/admin/suporte/{suporte}', [SuporteAdminController::class, 'update'])->name('admin.suporte.update');
    Route::delete('/admin/suporte/{ticket}', [SuporteAdminController::class, 'destroy'])->name('admin.suporte.destroy');
    // Rota para exibir a página de resolução
    Route::get('/admin/suporte/{suporte}/resolve', [SuporteAdminController::class, 'resolvePage'])->name('admin.suporte.resolvePage');

    // Rota para processar o formulário de resolução
    Route::post('/admin/suporte/{suporte}/resolve', [SuporteAdminController::class, 'resolve'])->name('admin.suporte.resolve');


});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    });
});

require __DIR__.'/auth.php';
