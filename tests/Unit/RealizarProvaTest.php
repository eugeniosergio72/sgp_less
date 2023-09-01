<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\ProvaModel;
use App\Models\ProfessorModel;
use App\Models\UtilizadorModel;
use App\Models\AssuntoModel;
use App\Models\DisciplinaModel;
use App\Models\QuestaoModel;
use App\Models\ProvaRealizada;
use Illuminate\Support\Facades\DB;

class RealizarProvaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    //Declaracao do metodo para realizar o caso de teste Realizar prova
    public function test_do_prova()
    {
        #-------------------------------------------------------------------------
        
        
    //Declarando a varivel que vai receber a instancia do modelo do objecto prova realizada
        $prova =  new ProvaRealizada;

        
        //Declarando a varivel que vai receber o mapeamento do modelo do objecto prova realizada
        $expected = ['id_utilizador', 'id_prova', 'id_questao', 'id_alternativa'];

        //Declarando a varivel que vai comparar o mapeamento do modelo do objecto prova realizada esperado com o mapeamento do modelo do objecto da prova realizada dada
        $compararArray = array_diff($expected, $prova->getFillable());

         //Atribuicao de valores padroes para a realizacao de teste do caso de uso
        $id_utilizador = 1;
        $idProva = 1;
		$id_questao = 1;
		$id_alternativa = 1;

        //Declaracao da variavel que recebe o mapeamento do Objecto da prova realizada.
		$dados = array('id_utilizador' => $id_utilizador, 
					'id_prova' => $idProva,
					'id_questao' => $id_questao,
					'id_alternativa' => $id_alternativa);

                    
        //Iniciacao dos teste de assertion para realizacao dos testes
        #-----------------------------------------------------------------------------
        $this->assertEquals(0, count($compararArray)); //Se retorna o valor 0 significa que o mapeamento eh valido
        #-------------------------------------------------------------------------------
  

        //Verifica se os objecto do modelo dos Objectos nao estao vazio |Se tem ou nao um dado cadastrado|
        $this->assertNotNull(DisciplinaModel::getAll());
        $this->assertNotNull(AssuntoModel::getAll());
        $this->assertNotNull(ProfessorModel::getAll());

        //Verifica se cada valor ou dado atribuido nas variveis de classe sao maior que zero, pos o identificador de cada objecto nao pode ser zero
        $this->assertGreaterThan(0,$id_utilizador);
        $this->assertGreaterThan(0,$idProva);
        $this->assertGreaterThan(0,$id_questao);
        $this->assertGreaterThan(0,$id_alternativa);

        //Verifica se os dados foram inseridos com sucesso na base de dados
        $this->assertTrue(DB::table('provarealizada')->insert($dados));
        
    }
}
