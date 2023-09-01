<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AlternativaModel extends Model
{
    use HasFactory;

    public $table = 'alternativa';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['estado', 'alternativa', 'comentario_resposta', 'id_questao'];
    
    public function cadastrar($dados){
        DB::table('alternativa')->insert($dados);
    }
}
