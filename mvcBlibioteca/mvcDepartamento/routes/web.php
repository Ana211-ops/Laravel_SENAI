<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/departamento/listar', [DepartamentoController::class, 'listar'])
    ->name('departamento.listar');

Route::get('/departamento/cadastro', [DepartamentoController::class, 'cadastro'])
    ->name('departamento.cadastro');

Route::post('/departamento/salvar', [DepartamentoController::class, 'salvar'])
    ->name('departamento.salvar');



Route::get('/funcionario/listar', [FuncionarioController::class, 'listar'])
    ->name('funcionario.listar');

Route::get('/funcionario/cadastro', [FuncionarioController::class, 'cadastro'])
    ->name('funcionario.cadastro');

Route::post('/funcionario/salvar', [FuncionarioController::class, 'salvar'])
    ->name('funcionario.salvar');



Route::get('/funcionario/{id}/atualizar', [FuncionarioController::class, 'atualizar'])
    ->name('funcionario.atualizar');

Route::put('/funcionario/{id}', [FuncionarioController::class, 'update'])
    ->name('funcionario.update');


Route::delete('/funcionario/{id}', [FuncionarioController::class, 'deletar'])
    ->name('funcionario.deletar');