<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cargo',
        'email',
        'salario',
        'data_admissao',
        'departamento_id'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function dadosPessoais(){
        return $this->hasOne(DadosPessoais::class);
    }
}