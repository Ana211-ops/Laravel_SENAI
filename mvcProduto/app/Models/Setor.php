<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class setor extends Model
{
   

     protected $fillable = [
        'nome',
        'id',
        'n_corredor'
    ];

    public function setor()
    {
        return $this->bee(setor::class);
    }
}