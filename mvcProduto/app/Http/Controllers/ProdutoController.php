<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $query = Produto::query();
        $Produto = $query->get();
        return view('listar', compact('Produto'));
    }
}