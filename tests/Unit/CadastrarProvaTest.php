<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use App\Models\ProvaModel;
use App\Models\ProfessorModel;
use App\Models\UtilizadorModel;
use App\Models\AssuntoModel;
use App\Models\DisciplinaModel;
use App\Models\QuestaoModel;
use Illuminate\Support\Facades\DB;

class CadastrarProvaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    
    
    //Declaracao do metodo para realizar o caso de teste Cadastrar prova
    public function test_check_save_prova()
    {
        
        //Declarando a varivel que vai receber a instancia do modelo do objecto prova
        $prova =  new ProvaModel;

        
        //Declarando a varivel que vai receber o mapeamento do modelo do objecto prova
        $expectedProva = ['nome', 'duracao', 'data_realizacao', 'cotacao', 'estado', 'id_assunto', 'id_professor'];

        //Declarando a varivel que vai comparar o mapeamento do modelo do objecto prova esperado com o mapeamento do modelo do objecto da prova dada
        $compararArrayProva = array_diff($expectedProva, $prova->getFillable());


        
        //Declarando a varivel que vai receber a instancia do modelo do objecto Disciplina
        $disicplina =  new DisciplinaModel;

        
        //Declarando a varivel que vai receber o mapeamento esperado do modelo do objecto Disciplina
        $expectedDisciplina = ['nome', 'id_professor'];

        //Declarando a varivel que vai comparar o mapeamento do modelo do objecto disciplina esperado com o mapeamento do modelo do objecto da disciplina dada
        $compararArrayDisciplina = array_diff($expectedDisciplina, $disicplina->getFillable());



        //Declarando a varivel que vai receber a instancia do modelo do objecto Assunto
        $assunto =  new AssuntoModel;

        
        //Declarando a varivel que vai receber o mapeamento esperado do modelo do objecto Assunto
        $expectedAssunto = ['tema', 'id_disciplina', 'id_professor'];

        //Declarando a varivel que vai comparar o mapeamento do modelo do objecto assunto esperado com o mapeamento do modelo do objecto da assunto dada
        $compararArrayAssunto = array_diff($expectedAssunto, $assunto->getFillable());

        #------------------------------------------------------------------------

        
        //Declarando a varivel que vai receber a instancia do modelo do objecto Questao
        $questao =  new QuestaoModel;

        
        //Declarando a varivel que vai receber o mapeamento esperado do modelo do objecto Questao
        $expectedQuestao = ['texto_descritivo', 'cotacao', 'id_prova'];

        //Declarando a varivel que vai comparar o mapeamento do modelo do objecto questao esperado com o mapeamento do modelo do objecto da questao dada
        $compararArrayQuestao = array_diff($expectedQuestao, $questao->getFillable());


         //Atribuicao de valores padroes para a realizacao de teste do caso de uso
        $nome = 'Less3';
		$duracao = 120;
		$data_realizacao = '2020-11-24';
		$cotacao = 10;
		$estado = 'false';
		$id_professor = 1;
		$id_assunto = 1;

        
        //Declaracao da variavel que recebe o mapeamento do Objecto da prova.
		$dados = array('nomes' => $nome, 
					'duracao' => $duracao,
					'data_realizacao' => $data_realizacao,
					'cotacao' => $cotacao,
					'estado' => $estado,
					'id_assunto' => $id_assunto,
					'id_professor' => $id_professor);

        #------------------------------------------------------------------------
        $this->assertEquals(0, count($compararArrayProva));
        $this->assertEquals(0, count($compararArrayDisciplina));
        $this->assertEquals(0, count($compararArrayAssunto));
        $this->assertEquals(0, count($compararArrayQuestao));
        
        
        //Verifica se os objecto do modelo dos Objectos nao estao vazio |Se tem ou nao um dado cadastrado|
        $this->assertNotNull(DisciplinaModel::getAll());
        $this->assertNotNull(AssuntoModel::getAll());
        $this->assertNotNull(ProfessorModel::getAll());

        //Verifica se cada valor ou dado atribuido nas variveis de classe sao maior que zero, pos o identificador de cada objecto nao pode ser zero
        $this->assertGreaterThan(0,$id_professor);
        $this->assertGreaterThan(0,$id_assunto);
        $this->assertGreaterThan(0,$cotacao);
        $this->assertGreaterThan(0,$duracao);
        
        //Verifica se os dados foram inseridos com sucesso na base de dados
        $this->assertTrue(DB::table('prova')->insert($dados));
        
        
    }
}
