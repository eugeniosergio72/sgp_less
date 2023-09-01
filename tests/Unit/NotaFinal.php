<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\ProvaModel;
use App\Models\ProfessorModel;
use App\Models\UtilizadorModel;
use App\Models\AssuntoModel;
use App\Models\DisciplinaModel;
use App\Models\QuestaoModel;
use App\Models\ProvaRealizada;

class NotaFinal extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    //Declarando a varivel que vai receber a instancia do modelo do objecto prova realizada
    private $prova;

    
    //Declarando a varivel que vai receber o mapeamento do modelo do objecto prova realizada
    private $expected = ['id_utilizador', 'id_prova', 'id_questao', 'id_alternativa'];

    
    //Declarando a varivel que vai comparar o mapeamento do modelo do objecto prova realizada esperado com o mapeamento do modelo do objecto da prova realizada dada
    private $compararArray;

    
    //Declarando a varivel que vai receber o identificador do estudante que realizara a prova
    private $id_utilizador;

    
    //Declarando a varivel que vai receber o identificaor da prova que se realizara
    private $idProva;

    
    //Declarando a varivel que vai receber  o identificaor da  questao escolheu numa dada prova 
    private $id_questao;

    
    //Declarando a varivel que vai receber  o identificaor da alternativa escolhida na questao
    private $id_alternativa;

    
    //Declaracao do metodo padrao da classe de teste
    public function test_example()
    {
        $this->assertTrue(true);
    }

    
    //Declarando o metodo que realizaza o teste de aresentar resultados no final da realizacao de cada prova
    public function notaFinal($prova, $expected, $id_utilizador, $idProva, $id_questao, $id_alternativa){
        //Referenciando as variaveis do parametro com as variaveis da classe
        $this->prova = $prova;
        $this->$expected = $expected;
        $this->id_utilizador = $id_utilizador;
        $this->idProva = $idProva;
        $this->id_questao = $id_questao;
        $this->id_alternativa = $id_alternativa;


        //instanciando o objecto modelo ProvaRealizada que contem dados das provas realizada.
        $this->prova = new ProvaRealizada;

        //Comparando se os mapeamentos dos modelos de provarealizada sao equivalentes o esperado
        $this->compararArray = array_diff($this->expected, $this->prova->getFillable());
        
        //Atribuicao de valores padroes para a realizacao de teste do caso de uso
        $this->prova = 1;
        $this->id_utilizador = 1;
        $this->idProva = 1;
        $this->id_questao = 1;
        $this->id_alternativa = 1;


        //Iniciacao dos teste de assertion para realizacao dos testes
        #-----------------------------------------------------------------------------
        $this->assertEquals(0, count($compararArray));  //Se retorna o valor 0 significa que o mapeamento eh valido
        #-------------------------------------------------------------------------------

        //Verifica se os objecto do modelo dos Objectos nao estao vazio |Se tem ou nao um dado cadastrado|
        $this->assertNotNull(DisciplinaModel::getAll()); 
        $this->assertNotNull(AssuntoModel::getAll()); 
        $this->assertNotNull(ProfessorModel::getAll());

        //Verifica se cada valor ou dado atribuido nas variveis de classe sao maior que zero, pos o identificador de cada objecto nao pode ser zero
        $this->assertGreaterThan(0,$this->id_utilizador);
        $this->assertGreaterThan(0,$this->idProva);
        $this->assertGreaterThan(0,$this->id_questao);
        $this->assertGreaterThan(0,$this->id_alternativa);

        //Declaracao da variavel que recebe todas as questoes da prova indicada pelo identificador
        $listaQ = QuestaoModel::where('id_prova',$idProva)->get();

        //Declaracao da variavel que recebe a nota final do estudante que realizou a prova
        $nota = 0;
        
        //Realizacao da prova 
        foreach($listaQ as $qestao){
            $q = $qestao->id;
            $aq = $id_alternativa;
            $this->assertTrue(DB::table('provarealizada')->insert(['id_utilizador'=>$this->d_utilizador,
                                                'id_prova'=>$this->idProva,
                                                'id_questao'=>$q,
                                                'id_alternativa'=>$aq]));
        }
        
        //Declaracao da variavel que recebe a prova realizada por um determinado estudante
        $provarealizada = ProvaRealizada::where('id_prova',$this->idProva)
                                        ->where('id_utilizador',$this->id_utilizador)->get();
        
        //Realizacao do calculo da nota final obtida por um estudante em uma dada prova
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

        //retorno da nota final obtida pelo estudante numa dada prova
        return "Sua nota = ".$nota;
    }
}
