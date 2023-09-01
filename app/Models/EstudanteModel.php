<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class EstudanteModel extends Model 
{
    use HasFactory;

    public $table = 'estudante';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id_curso', 'id_utilizador'];
    
    public function cadastrar($dados){
        DB::table('estudante')->insert($dados);
    }

    public function getAll(){

        $estudantes = DB::table('estudante')->get();

        return $estudantes;
    }
}
