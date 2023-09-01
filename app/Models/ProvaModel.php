<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProvaModel extends Model
{
    use HasFactory;

    public $table = 'prova';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nome', 'duracao', 'data_realizacao', 'cotacao', 'estado', 'id_assunto', 'id_professor'];

    public function cadastrar($dados){
        DB::table('prova')->insert($dados);
    }

    
    public function getAlsl(){

        $provas = DB::table('prova')->get();

        return $provas;
    }
}
