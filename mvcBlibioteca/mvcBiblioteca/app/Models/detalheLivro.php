<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalheLivro extends Model
{
    protected $table = 'detalheLivro';

    protected $fillable = [
        'descricao',
        'nome',
        'preço',
        'autor'
    ];

    public function livro(){
        return $this->belongsTo(livro::class);
    }
}