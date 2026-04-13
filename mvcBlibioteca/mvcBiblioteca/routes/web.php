<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\livroController;
use App\Http\Controllers\editoraController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/livro/listar',[livroController::class, 'listar'])->name('livro.listar');

Route::get('/livro/cadastrar',[livroController::class, 'cadastrar']
)->name('livro.cadastrar');


Route::post('/livro/salvar',[livroController::class, 'add'])
->name('livro.salvar');


Route::get('/livro/{nome}/atualizar', [livroController::class, 'atualizar'])
->name('produto.atualizar');

Route::put('/livro/{nome}/update',[livroController::class, 'update'])
->name('livro.update');

Route::delete('/livro/{nome}',[livroController::class, 'deletar'])
->name('livro.deletar');


Route::get('/editora/listar',[editoraController::class, 'listar'])->
name('editora.listar');

Route::get('/editora/cadastrar', function(){ 
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar',[editoraController::class, 'add'])
->name('editora.salvar');