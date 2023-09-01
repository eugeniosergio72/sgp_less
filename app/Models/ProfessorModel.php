<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProfessorModel extends Model
{
    use HasFactory;

    public $table = 'professor';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id_utilizador'];
    
    public function cadastrar($dados){
        DB::table('professor')->insert($dados);
    }

    public function getAll(){

        $professores = DB::table('professor')->get();

        return $professores;
    }
}
