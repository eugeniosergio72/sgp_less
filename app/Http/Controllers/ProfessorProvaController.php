<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DisciplinaModel;
use App\Models\AssuntoModel;
use App\Models\QuestaoModel;
use App\Models\ProvaModel;
use App\Models\AlternativaModel;

class ProfessorProvaController extends Controller
{
    //
    public function index(){
		$disciplinas = DisciplinaModel::getAll();
		$provas = ProvaModel::get();
		$provas_pag = ProvaModel::orderBy("id", "DESC")->paginate(4);
		$assuntos = AssuntoModel::getAll();

        return view("templates.professor.home_professor", [
															'provas' => $provas,
															'assuntos' => $assuntos,
															'disciplinas'=>$disciplinas,
															'provas_pag'=> $provas_pag]);
    }

	public function cadastrarProva(){
		
		$questoes = QuestaoModel::getAll();
		$provas = ProvaModel::get();
		$assuntos = AssuntoModel::getAll();
		$disciplinas = DisciplinaModel::getAll();

        return view("templates.professor.cadastrar_prova", ['questoes'=>$questoes,
															'provas' => $provas,
															'assuntos' => $assuntos,
															'disciplinas' => $disciplinas]);
	}
    public function cadastrarProvaUp(Request $request){

		$nome = $request->input('nome') != null ? $request->input('nome') : '';
		$duracao = $request->input('duracao') != null ? $request->input('duracao') : 1;
		$data_realizacao = $request->input('data_realizacao') != null ? $request->input('data_realizacao') : '';
		$cotacao = $request->input('cotacao') != null ? $request->input('cotacao') : 1;
		$estado = 'false';
		$id_professor = $request->input('idProfessor') != null ? $request->input('idProfessor') : 1;
		$id_assunto = $request->input('assunto') != null ? $request->input('assunto') : '';

		$provaModel = new ProvaModel();

		$dados = array('nome' => $nome, 
					'duracao' => $duracao,
					'data_realizacao' => $data_realizacao,
					'cotacao' => $cotacao,
					'estado' => $estado,
					'id_assunto' => $id_assunto,
					'id_professor' => $id_professor);

		$provaModel->cadastrar($dados);

        return redirect("/cadastrarProva");
    }

	public function cadastrarDisciplina(Request $request)
	{
		$disciplina = $request->input('disciplina') != null ? $request->input('disciplina') : '';
		$idProfessor = $request->input('idProfessor') != null ? $request->input('idProfessor') : 1;

		
		$disciplinaModel = new DisciplinaModel();

		$disciplinaModel->cadastrar(array('nome'=>$disciplina, 'id_professor' => $idProfessor));

		$disciplinas = DisciplinaModel::getAll();
        //return view("templates.professor.home_professor", ['disciplinas'=>$disciplinas]);
		return redirect("/homeProfessor");

	}

	public function cadastrarAssunto(Request $request)
	{
		$disciplina = $request->input('disciplina') != null ? $request->input('disciplina') : '';
		$tema = $request->input('tema') != null ? $request->input('tema') : '';
		$idProfessor = $request->input('idProfessor') != null ? $request->input('idProfessor') : 1;

		
		$assuntoModel = new AssuntoModel();

		$assuntoModel->cadastrar(array('tema'=> $tema, 'id_disciplina'=>$disciplina, 'id_professor' => $idProfessor));

		$disciplinas = DisciplinaModel::getAll();
        //return view("templates.professor.home_professor", ['disciplinas'=>$disciplinas]);
		return redirect("/homeProfessor");
	}


	public function cadastrarQuestao(Request $request)
	{
		$prova = $request->input('prova') != null ? $request->input('prova') : '';
		$questao = $request->input('questao') != null ? $request->input('questao') : '';
		$cotacao = $request->input('cotacao') != null ? $request->input('cotacao') : 1;

		
		$questaoModel = new QuestaoModel();

		$questaoModel->cadastrar(array('texto_descritivo'=> $questao, 'cotacao'=>$cotacao, 'id_prova' => $prova));
		
        return redirect("/cadastrarProva");
	}

	public function cadastrarAlternativa(Request $request)
	{
		$alternativa = $request->input('alternativa') != null ? $request->input('alternativa') : '';
		$questao = $request->input('questacao') != null ? $request->input('questacao') : '';
		$statusAlternativa = $request->input('statusAlternativa') != null ? $request->input('statusAlternativa') : 1;
		$comentario = $request->input('comentario') != null ? $request->input('comentario') : '';

		$alternativaModel = new AlternativaModel();

		$alternativaModel->cadastrar(array('estado'=> $statusAlternativa, 
											'alternativa'=>$alternativa, 
											'comentario_resposta' => $comentario,
											'id_questao'=> $questao));
		
		
        return redirect("/cadastrarProva")->with('sms','cadastrado com sucesso');
	}
 
	public function publicarProva()
	{
		
		$questoes = QuestaoModel::getAll();
		$provas = ProvaModel::getAll();
		$assuntos = AssuntoModel::getAll();
		$disciplinas = DisciplinaModel::getAll();

        //return view("templates.professor.cadastrar_prova", ['questoes'=>$questoes,
		///													'provas' => $provas,
		//													'assuntos' => $assuntos,
		//													'disciplinas' => $disciplinas]);
		return redirect("/homeProfessor");
	}

	public function buscarAssuntos($id)
	{
		$assuntos = AssuntoModel::where('id_disciplina',$id)->get();

		return $assuntos;
	}

	public function estadoProva($id)
	{

		ProvaModel::where('id', $id)->update(['estado' =>'true']);

		return redirect("/homeProfessor");
	}

	public function buscarQuestao($id)
	{
		$questoao = QuestaoModel::where('id_prova',$id)->get();

		return $questoao;
	}

}
