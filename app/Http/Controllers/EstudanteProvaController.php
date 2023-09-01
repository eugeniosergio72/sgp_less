<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DisciplinaModel;
use App\Models\AssuntoModel;
use App\Models\QuestaoModel;
use App\Models\ProvaModel;
use App\Models\AlternativaModel;
use App\Models\ProvaRealizada;
use App\Models\UtilizadorModel;
use DB;

class EstudanteProvaController extends Controller
{
    //
    public function index(){
        $disciplinas = DisciplinaModel::getAll();
		$provas = ProvaModel::where('estado','true')->get();
		$assuntos = AssuntoModel::getAll();

        return view("templates.estudante.home_estudante", [
            'provas' => $provas,
            'assuntos' => $assuntos,
            'disciplinas'=>$disciplinas]);
    }

    public function informacaoProva(){
        return view("templates.estudante.informacao_prova");
    }

    public function formularioProva(){
        return view("templates.estudante.formulario_prova");
    }

    public function selecionarProva()
	{
	}

	public function selecionarDisciplina()
	{
	}
	

	public function selecionarAssunto()
	{
	}

    
	public function submeterProva(Request $request)
	{
        $listaQ = QuestaoModel::where('id_prova',$request->idProva)->get();
        $nota = 0;
        
        foreach($listaQ as $qestao){
            $q = "q".$qestao->id;
            $aq = "aq".$qestao->id;
            DB::table('provarealizada')->insert(['id_utilizador'=>$request->id_estudante,
                                                'id_prova'=>$request->idProva,
                                                'id_questao'=>$request->$q,
                                                'id_alternativa'=>$request->$aq]);
            // echo  "<h6>Q = ".$request->$q." => A = ".$request->$aq."</h6><br>
            // <h5>estudante = ".$request->id_estudante. "</h5>";
        }

        
        $provarealizada = ProvaRealizada::where('id_prova',$request->idProva)
                                        ->where('id_utilizador',$request->id_estudante)->get();
        
        foreach($provarealizada as $pr){
            foreach($listaQ as $q){
                $alt = AlternativaModel::where('id_questao',$q->id)->get();
                foreach($alt as $a){
                    if($a->id_questao == $q->id){
                        if($a->id == $pr->id_alternativa){
                            if($a->estado == 'true' ){
                                $nota += $q->cotacao;
                            }else {
                                $nota += 0;
                            }
                        }
                    }
                }
            }
        }
        return "<alert> Sua nota = ".$nota."</alert>";
        
        // for($i = $idq1->id ; $i <= $idUltimaQ->id; $i++){
        //     $q = "q".$i;
        //     $aq = "aq".$i;
        //     DB::table('provarealizada')->insert(['id_estudante'=>$request->id_estudante,
        //                                     'id_prova'=>$request->idProva,
        //                                     'id_questao'=>$request->q,
        //                                     'id_alternativa'=>$request->aq]);
        // }
        // $id_estudante = session()->get('estudante')->id;
        // $idProva = $request->idProva;
        // $minimoQuestoes = DB::table('questao')->where('id_prova',$idProva)->min('id');
        // $totalQuestoes = DB::table('questao')->where('id_prova',$idProva)->count();

        //dd($id_estudante);

        // $nota = 0;
        // $id_prova = $request->idProva;
        // $prova = ProvaModel::where("id",$id_prova)->get();
        // //foreach($prova as $p){
        //     $questao = QuestaoModel::where("id_prova",$id_prova)->get();
        //     foreach ($questao as $q) {
        //         $alternativa = AlternativaModel::where("id_questao",$q->id)->get();
        //         foreach($alternativa as $a){
        //             $resposta = $request->input("a".$a->id);
        //             dd($resposta);
        //             if($resposta == 'on'){
        //                 if($a->estado == true){
        //                     $nota += $q->cotacao;
        //                 }
        //             }
        //         }
        //     }
        // //}


        // for($i = 0; $i < $totalQuestoes; $i++){
        //     $ac = "q".($i + $totalQuestoes);
        //    $aa = $ac."a";
        //    DB::table('provarealizada')->insert(['id_estudante'=>$id_estudante,
        //                                         'id_prova'=>$idProva,
        //                                     'id_questao'=>$request->$ac,
        //                                 'id_alternativa'=>$request->$aa]);
        // }
    //   echo  $minimoQuestoes;
    //     echo "<hr>";
    //     echo  $totalQuestoes;
    //     echo "<hr>";
    //     $a = 3;
    //     $ac = "q".$a."a";
    //    echo $request->$ac;

    //   echo "<br>";
    //   $d = 5;
    //   $dc = "q".$d."a";
    //  echo $request->input($dc);

    //  echo $request->idProva;
       

        return redirect("/homeEstudante");
        //return $nota;
	}

	public function realizarProva($id)
	{  
        
		$provasm = ProvaModel::where('id',$id)->get();
		$questoesm = QuestaoModel::where('id_prova',$id)->get();
		$alternativam = AlternativaModel::get();

        $qtdQuestoes = QuestaoModel::qdtQuestoes();//, 'qdtQuestoes'=>$qdtQuestoes]

        return view("templates.estudante.formulario_prova", ['provasm'=>$provasm
        ,'questoesm'=>$questoesm,'alternativam'=>$alternativam, 'idProva'=>$id]);
	}


}
