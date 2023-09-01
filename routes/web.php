<?php

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

// use App\Http\Middleware\Autenticacao;


use App\Http\Controllers\EstudanteProvaController;
Route::middleware('estudante')->group(function(){
    Route::get('/homeEstudante', [EstudanteProvaController::Class,'index'])->name('homeEstudante');
    Route::get('/informacaoProva', [EstudanteProvaController::Class,'informacaoProva']);
    Route::get('/formularioProva', [EstudanteProvaController::Class,'formularioProva']);
    Route::get('/formularioProva/{id}', [EstudanteProvaController::Class,'realizarProva']);
    Route::post('/submeterProva', [EstudanteProvaController::Class,'submeterProva']);
}); 

use App\Http\Controllers\ProfessorProvaController;
Route::middleware('professor')->group(function(){
    Route::controller(ProfessorProvaController::Class)->group(function(){
        Route::get('/homeProfessor', 'index')->name('homeProfessor');
        Route::get('/cadastrarProva', 'cadastrarProva');
        Route::post('/cadastrarDisciplina', 'cadastrarDisciplina');
        Route::post('/cadastrarAssunto', 'cadastrarAssunto');
        Route::post('/cadastrarProvaUp', 'cadastrarProvaUp');
        Route::post('/cadastrarQuestao', 'cadastrarQuestao');
        Route::post('/cadastrarAlternativa', 'cadastrarAlternativa');
        Route::get('/buscarAssuntos/{id}', 'buscarAssuntos');
        Route::get('/buscarQuestao/{id}', 'buscarQuestao');
        Route::get('/estadoProva/{id}', 'estadoProva');
    });

});

use App\Http\Controllers\UtilizadorController;
Route::get('/login', [UtilizadorController::Class,'login'])->middleware('login');
Route::get('/', [UtilizadorController::Class,'login'])->middleware('login');
Route::post('/efectuarCadastro', [UtilizadorController::Class,'efectuarCadastro']);
Route::post('/efectuarLogin', [UtilizadorController::Class,'efectuarLogin'])->name('efectuarLogin');
Route::get('/cadastro', [UtilizadorController::Class,'cadastro']);


Route::get('/logout', [UtilizadorController::Class,'logout'])->name('logout');
Route::fallback(function(){
    return redirect('/login');
});


