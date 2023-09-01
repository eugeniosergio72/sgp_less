<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class DisciplinaModel extends Model
{
    use HasFactory;

    
    public $table = 'disciplina';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nome', 'id_professor'];

    public function cadastrar($dados){
        DB::table('disciplina')->insert($dados);
    }

    public function getAll(){

        $disciplinas = DB::table('disciplina')->get();

        return $disciplinas;
    }

    
    public function getById($id){

        $disciplinas = DB::table('disciplina')->get($id);

        return $disciplinas;
    }
}
