<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class editora extends Model
{
    protected $fillable = [
        'nome',
        'CNPJ',
        'país',
        'cidade'
    ];

    public function livro(){
        return $this->hasMany(livro::class);
    }
}