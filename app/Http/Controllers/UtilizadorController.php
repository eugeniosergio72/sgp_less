<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UtilizadorModel;
use App\Models\EstudanteModel;
use App\Models\ProfessorModel;
use Auth;
use Hash;

use App\Models\DisciplinaModel;
use App\Models\AssuntoModel;
use App\Models\QuestaoModel;
use App\Models\ProvaModel;
use App\Models\AlternativaModel;

class UtilizadorController extends Controller
{
    //

	

    public function login(){
        return view("templates.login.login");
    }

    public function cadastro(){
        return view("templates.cadastro.cadastro");
    }

    public function alterarSenha()
	{
	}

	public function efectuarLogin(Request $request)
	{
		//dd(UtilizadorModel::first()->nome);
		$utilizador = UtilizadorModel::where('email', $request->email)->first();
		if($utilizador->titulacao == 'estudante'){
			session()->put("estudante", $utilizador);
			return redirect()->route('homeEstudante');
		}elseif($utilizador->titulacao == 'professor'){
			session()->put("professor", $utilizador);
			return redirect()->route('homeProfessor');
		}
		
		return redirect()->route('login')->with('erro', 'credenciais invalidas');
	}

	public function efectuarCadastro(Request $request)
	{
		$utiliadorModel = new UtilizadorModel;

		if($request->hasFile('perfil')){
			$ficheiroComExtesao = $request->file('perfil')->getClientOriginalName();
			$ficheiroSemExtensao = pathinfo($ficheiroComExtesao,PATHINFO_FILENAME);
			$extensao = $request->file('perfil')->getClientOriginalExtension();
			$armazenarFicheiro = $ficheiroSemExtensao.'_'.time().'.'.$extensao;

			//if($extensao == 'png' || $extensao == 'jpeg' || $extensao == 'jpg')
			$pasta = $request->file('perfil')->storeAs('public/perfil',$armazenarFicheiro);

		}else {
			$armazenarFicheiro = 'perfil.png';
		}

		$nome = $request->input('nome') != null ? $request->input('nome') : '';
		$senha = $request->input('senha') != null ? $request->input('senha') : '';
		$email = $request->input('email') != null ? $request->input('email') : '';
		$telefone = $request->input('telefone') != null ? $request->input('telefone') : '';
		$endereco = $request->input('endereco') != null ? $request->input('endereco') : '';
		$titulacao = $request->input('titulacao') != null ? $request->input('titulacao') : '';
		$apelido = $request->input('apelido') != null ? $request->input('apelido') : '';

		$dados = array('nome' => $nome,
						'senha' => $senha,
						'email' => $email, 
						'telefone' => $telefone, 
						'endereco' => $endereco, 
						'perfil' => $armazenarFicheiro, 
						'titulacao' => $titulacao, 
						'apelido' => $apelido);

		$utiliadorModel->cadastrar($dados);

		return view("templates.login.login");
	}

	public function logout(){
		if(session()->has('estudante') ){
			session()->forget('estudante');
		}
		if(session()->has('professor')){
			session()->forget('professor');
		}
		return redirect('/login');
		
	}
	public function alterarPerfil()
	{						
	}

	public function alterarEndereco()
	{
	}

}
