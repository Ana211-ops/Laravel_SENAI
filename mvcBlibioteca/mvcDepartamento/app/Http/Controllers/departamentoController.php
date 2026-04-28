<?php
namespace App\Http\Controllers;
use App\Models\funcionarios;
use App\Models\departamento;

use Illuminate\Http\Request;

class departamentoController extends Controller
{
    public function listar(){
        $departamento = departamento::all();
        return view('listarDepartamento', compact('departamento'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'dataCriação' => 'required|numeric|max:255',
            'orçamento' => 'required|numeric|max:255',
            'sigla(opcional)' => 'required|string|max:255',

            
        ]);

        

        return redirect()->back()->with('success','editora Cadastrada com sucesso!');

    }
}