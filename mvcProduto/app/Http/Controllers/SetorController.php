<?php

namespace App\Http\Controllers;
use App\Models\Setor;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(){
        $query = Setor::query();
        $Setor = $query->get();
        return view('listar', compact('setor'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'require|string|max:255',
            'id' => 'require|string|max:255|unique:nome,id'
        ]);



        Setor::create([
            'nome' => $request->nome,
            'id' => $request->id
        ]);

        return redirect()->back()->with('success','Setor Cadastrado com sucesso!');
    }

    
    public function atualizar($id){
        $Setor = Setor::findOrFail($id);
        return view('atualizar', compact('setor'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'id' => "required|string|max:255|unique:alunos,id, $id"
        ]);

        $Setor = setor::findOrFail($id);

        $Setor->nome = $request->nome;
        $Setor->id = $request->id;

        $aluno->save();
        return redirect()->back()->with('success','setor atualizado com sucesso');
    }

    public function deletar($id){
        $Setor = setor::findOrFail($id);
        $Setor->delete();

        return redirect()->route('setor.listar')
            ->with('succes','setor excluido com sucesso!');
    }
    
}