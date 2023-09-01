<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class QuestaoModel extends Model
{
    use HasFactory;

    public $table = 'questao';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['texto_descritivo', 'cotacao', 'id_prova'];

    public function cadastrar($dados){
        DB::table('questao')->insert($dados);
    }

    public function qdtQuestoes(){
        DB::table('questao')->count();
    }

    public function getAll(){

        $questoes = DB::table('questao')->get();

        return $questoes;
    }
}
