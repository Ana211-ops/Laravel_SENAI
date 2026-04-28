<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class livro extends Model
{
    protected $fillable = [
        'nome',
        'autor',
        'descrição',
        'n_paginas',
        'data_publicação',
        'editora',
        'custo',
        'preço',
        'imposto'
    
    ];

    public function editora(){
        return $this->belongsTo(editora::class);
    }

    public function detalheLivro(){
        return $this->hasOne(detalheLivro::class);
    }
}