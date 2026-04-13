<?php
namespace App\Http\Controllers;
use App\Models\livro;
use App\Models\editora;
use App\Models\detalheLivro;

use Illuminate\Http\Request;

class livroController extends Controller
{
    public function listar(){
        $livro = livro::with(['editora', 'detalheLivro'])->get();
        return view('listarLivro', compact('livro'));
    }

    public function cadastrar(){
        $editora = editora::get();
        return view('cadastrarLivro', compact('editora'));
    }


    
    public function add(Request $request){
    
        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descrição' => 'required|string|max:255',
            'n_paginas' => 'required|numeric',
            'data_publicação' => 'required|date',
            'editora' => 'required|string',
            'custo' => 'required|numeric',
            'preço' => 'required|numeric',
            'imposto' => 'required|numeric',
            
        ]);

        $livro = livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descrição' => $request->descrição,
            'n_paginas' => $request->n_paginas,
            'data_publicação' => $request->data_publicação,
            'editora' => $request->editora,
            'custo' => $request->custo,
            'preço' => $request->preço,
            'imposto' => $request->imposto,
        ]);

        DetalheLivro::create([
            'descricao' => $request->descricao,
            'preço' => $request->preço,
            'nome' => $request->nome,
            'autor' => $produto->autor
        ]);

        return redirect()->back()->with('success','Livro Cadastrado com sucesso!');

    }

    public function atualizar($nome){
        $livro = livro::findOrFail($nome); 
        $editora = editora::get();
        return view('atualizarLivro', compact('livro','editora'));
    }

    public function update(Request $request, $nome){
        $request->validate([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descrição' => $request->descrição,
            'n_paginas' => $request->n_paginas,
            'data_publicação' => $request->data_publicação,
            'editora' => $request->editora,
            'custo' => $request->custo,
            'preço' => $request->preço,
            'imposto' => $request->imposto,
           
        ]);

        $livro = livro::findOrFail($nome); 
        $detalhe = DetalheLivro::where('livro_nome', $livro->nome)->first();

        $livro->nome = $request->nome; 
        $livro->autor = $request->autor;
        $livro->descrição = $request->descrição;  
        $livro->n_paginas = $request->n_paginas; 
        $livro->data_publicação = $request->data_publicação; 
        $livro->editora = $request->editora; 
        $livro->custo = $request->custo; 
        $livro->preço = $request->preço;
        $livro->imposto = $request->imposto;  
       

        $livro->save(); 

        $detalhe->descricao = $request->descricao;
        $detalhe->nome = $request->nome;
        $detalhe->preço = $request->preço;
        $detalhe->autor = $request->autor;


        $detalhe->save();

        return redirect()->back()->with('success','Livro atualizado com suceso');
    }

    public function deletar($nome){
        $livro = livro::findOrFail($nome); 
        $detalhe = DetalheLivro::where('livro_nome', $livro->nome)->first();
        $livro->delete(); 
        $detalhe->deletar();

        return redirect()->route('livro.listar')
            ->with('success','livro excluído com sucesso!');
    }




}