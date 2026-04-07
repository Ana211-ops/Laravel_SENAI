<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $query = Produto::query();
        $Produto = $query->get();
        return view('listar', compact('Protudo'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'require|string|max:255',
            'id' => 'require|string|max:255|unique:nome,id',
            'preço' => 'require|string|max:255|unique:nome,id, preço'
        ]);



        produto::create([
            'nome' => $request->nome,
            'id' => $request->id
            'preço' => $request->preço
        ]);

        return redirect()->back()->with('success','Produto Cadastrado com sucesso!');
    }

    
    public function atualizar($id){
        $Produto = Produto::findOrFail($id);
        return view('atualizar', compact('Produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'id' => "required|string|max:255|unique:nome,id, $id",
            'preço' => "required|string|max:255|unique:nome,id,preço $id"
        ]);

        $setor = Produto::findOrFail($id);

        $Produto->nome = $request->nome;
        $Produto->id = $request->id;

        $Produto->save();
        return redirect()->back()->with('success','produto atualizado com sucesso');
    }

    public function deletar($id){
        $Produto = produto::findOrFail($id);
        $Produto->delete();

        return redirect()->route('produto.listar')
            ->with('succes','produto excluido com sucesso!');
    }
}