<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;



class ProvaRealizada extends Model
{
    use HasFactory;

    public $table = 'provarealizada';
    public $timestamps = false;
    protected $fillable = ['id_utilizador', 'id_prova', 'id_questao', 'id_alternativa'];

}
