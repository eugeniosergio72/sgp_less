<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AssuntoModel extends Model
{
    use HasFactory;

    public $table = 'assunto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['tema', 'id_disciplina', 'id_professor'];
    
    public function cadastrar($dados){
        DB::table('assunto')->insert($dados);
    }

    public function getAll(){

        $assuntos = DB::table('assunto')->get();

        return $assuntos;
    }
}
