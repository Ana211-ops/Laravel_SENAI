<?php
namespace App\Http\Controllers;
use App\Models\funcionarios;
use App\Models\departamento;
use App\Models\dadosPessoais;

use Illuminate\Http\Request;

class funcionariosController extends Controller
{
    public function listar(){
        $funcionarios = funcionarios::with(['departamento', 'dadosPessoais'])->get();
        return view('listarfuncionarios', compact('funcionarios'));
    }

    public function cadastrar(){
        $departamento = departamento::get();
        return view('cadastrarfuncionarios', compact('departamento'));
    }


    
    public function add(Request $request){
    
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'e-mail' => 'required|string|max:255',
            'data_admissão' => 'required|date',
            'salario(opcional)' => 'required|numeric',
            'sobrenome' => 'required|string',
            
            
        ]);

        $funcionarios = funcionarios::create([
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'e-mail' => $request->email,
            'data_admissão' => $request->data_admissão,
            'salario(opcional)' => $request->salario,
            'sobrenome' => $request->sobrenome,
        ]);

        dadosPessoais::create([
            'CPF' => $request->CPF,
            'RG' => $request->RG,
            'CEP' => $request->CEP,
            
        ]);

        return redirect()->back()->with('success','funcionario Cadastrado com sucesso!');

    }

    public function atualizar($nome){
        $funcionario = funcionario::findOrFail($nome); 
        $departamento = departamento::get();
        return view('atualizarfuncionario', compact('funcionario','departamento'));
    }

    public function update(Request $request, $nome){
        $request->validate([
            'nome' => $request->nome,
            'data_criação' => $request->data_criação,
            'orçamento' => $request->orçamento,
            'sigla' => $request->sigla,
            
           
        ]);

        $funcionario = funcionario::findOrFail($nome); 
        $dados = dadosPessoais::where('funcionario_nome', $funcionario->nome)->first();

        $funcionario->nome = $request->nome; 
        $funcionario->cargo = $request->cargo;
        $funcionario->email = $request->email;  
        $funcionario->data_admissão = $request->data_admissão; 
        $funcionario->salario = $request->salario; 
        $funcionario->sobrenome = $request->sobrenome; 
        

        $funcionario->save(); 

        $dadosPessoais->CPF = $request->CPF;
        $dadosPessoais->RG = $request->RG;
        $dadosPessoais->CEP = $request->CEP;
        $dadosPessoais->data_nascimento = $request->data_nascimento;


        $dadosPessoais->save();

        return redirect()->back()->with('success','funcionario atualizado com suceso');
    }

    public function deletar($nome){
        $funcionario = funcionario::findOrFail($nome); 
        $dadosPessoais = dadosPessoais::where('funcionario_nome', $funcionario->nome)->first();
        $funcionario->delete(); 
        $dadosPessoais->deletar();

        return redirect()->route('funcionario.listar')
            ->with('success','funcionario excluído com sucesso!');
    }




}