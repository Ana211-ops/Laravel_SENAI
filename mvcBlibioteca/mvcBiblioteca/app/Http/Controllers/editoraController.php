<?php
namespace App\Http\Controllers;
use App\Models\livro;
use App\Models\editora;

use Illuminate\Http\Request;

class editoraController extends Controller
{
    public function listar(){
        $editora = editora::all();
        return view('listarEditora', compact('Editora'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'CNPJ' => 'required|numeric|max:255',
            'país' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',

            
        ]);

        

        return redirect()->back()->with('success','editora Cadastrada com sucesso!');

    }
}