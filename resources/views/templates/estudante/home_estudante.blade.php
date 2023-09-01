@extends("templates.fragmento.estudante")

@section("title","home_estudante")


@section("content")


<main class="container" id="mainEstudante">
<div class="row">
        @foreach ($provas as $p)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <h6>
                        Disciplina:
                    </h6>
                    <span>
                        {{$p->nome}}
                    </span>
                    <br><br>
                    <h6>
                        Assunto:
                    </h6>
                    
                    @foreach ($assuntos as $a)
                    @if ($a->id == $p->id_assunto)
                    <span>
                        {{$a->tema}}
                    </span>
                    @endif
                    @endforeach
                    <br><br>
                    <h6>
                        Cotacao:
                    </h6>
                    <span>
                        {{$p->cotacao}}
                    </span>
                    
                    <br><br>
                    <h6>
                        Duracao:
                    </h6>
                    <span>
                        {{$p->duracao}}
                    </span>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="img">
                            <img src="/imagem/image.png" alt="prova">
                        </div>
                        <a href="/formularioProva/{{$p->id}}" class="ver-mais btn btn-outline-light mt-2 mr-3">
                            Iniciar
                        </a>
                        <button type="button" data-toggle="modal" data-target="#modalDetalhes" class="ver-mais btn btn-outline-light mt-2">
                            Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>




    <section class="modal fade text-dark" id="modalDetalhes">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Detalhes da Prova
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-success">
                        Apos selecionar o botao iniciar, o sistema 
                        mostrara o formulario da prova a ser resolvida e o tempo 
                        comecara a contar.
                    </h6>
                    <h6>Disciplina:</h6>
                    <input type="text" class="form-control" placeholder="Calculo I" disabled name="disciplina" id="disciplina">

                    <h6>Assunto:</h6>
                    <input type="text" class="form-control" placeholder="Integrais Duplas" disabled name="assunto" id="sssunto">

                    <h6>Data da Realizacao:</h6>
                    <input type="text" class="form-control" placeholder="23-06-2023" disabled name="dataRealizacao" id="dataRealizacao">

                    <h6>Duracao:</h6>
                    <input type="text" class="form-control" placeholder="01h:30m" disabled name="duracao" id="duracao">

                    <h6>Numero de questoes:</h6>
                    <input type="number" class="form-control" placeholder="30" disabled name="qtdQuestoes" id="qtdQuestoes">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fachar
                    </button>
                </div>
            </div>
        </div>
    </section>




    <section class="modal fade text-dark" id="realizarProva">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Realizar Prova
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-success">
                        Ao selecionar a opcao de iniciar, o sistema ira
                        escolher ao acaso 10 questoes, independente da disciplina
                        ou assunto!
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fachar
                    </button>
                    <button type="button" class="btn btn-success">
                        Iniciar
                    </button>
                </div>
            </div>
        </div>
    </section>

</main>


@endsection


<script type="text/javascript" src="/javascript/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/javascript/bootstrap.js"></script>
<script type="text/javascript" src="/javascript/style.js"></script>
 