<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UtilizadorModel extends Model
{
    use HasFactory;

    protected $table = 'utilizador';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nome', 'senha', 'email', 'telefone', 'endereco', 'perfil', 'titulacao', 'apelido'];

    public function cadastrar($dados){
        DB::table('utilizador')->insert($dados);
    }
    
}
