@extends("templates.fragmento.professor")

@section("title","home_professor")


@section("content")

<main class="container" id="mainProfessor">
    <div class="row mb-3">
        <!-- <div class="col-12">
            <table class="table text-light ">
                <thead>
                    <th>Prova</th>
                    <th>Assunto</th>
                    <th>Duracao</th>
                    <th>Realizacao</th>
                    <th>Cotacao</th>
                    <th>Estado</th>
                    <th>Detalhes</th>
                    <th>Publicar</th>
                </thead>
                @foreach ($provas_pag as $p)
                <tbody>
                    <td>{{$p->nome}}</td>
                    @foreach ($assuntos as $a)
                    @if ($a->id == $p->id_assunto)
                        <td> {{$a->tema}}</td>
                    @endif
                    @endforeach
                    <td> {{$p->duracao}} hora</td>
                    <td> {{$p->data_realizacao}}</td>
                    <td>{{$p->cotacao}}</td>
                    <td>{{$p->estado}}</td>
                    <td><button type="button" data-toggle="modal" data-target="#modalDetalhes" class="ver-mais btn btn-outline-light mt-2">
                            Detalhes
                        </button></td>
                    <td><a href="/estadoProva/{{$p->id}}" class="ver-mais btn btn-outline-light ml-2 mt-2">
                            Publicar 
                        </a></td>
                        
                </tbody>
                @endforeach
                {{$provas_pag->links()}}
            </table>
             <div class="ml-3">
                    {{$provas_pag->links()}}
                </div> 
        </div>
    </div> -->
    <div class="row">
        @foreach ($provas as $p)
        <div class="col-lg-6">
            <div class="row mb-2">
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
                        <button type="button" data-toggle="modal" data-target="#modalDetalhes" class="ver-mais btn btn-outline-light mt-2">
                            Detalhes
                        </button>
                        <a href="/estadoProva/{{$p->id}}" class="ver-mais btn btn-outline-light ml-2 mt-2">
                            Publicar 
                        </a>
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




    <form class="modal fade text-dark" id="cadastrarAssunto" action="/cadastrarAssunto" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Cadastrar Novo Assunto
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Selecione a Disciplina:</h6>
                   
                    <select name="disciplina" id="disciplina" class="form-control">
                        <option value="" disabled selected>
                            Disciplina
                        </option>
                        @foreach ($disciplinas as $d)
                        <option value="{{$d->id}}">
                            {{$d->nome}}
                        </option>
                        @endforeach
                    </select> <br>

                    <h6>Novo Assunto:</h6>
                    <input type="text" class="form-control" placeholder="Assunto" name="tema" id="assunto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fachar
                    </button>
                    <button type="submit" class="btn btn-success">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </form>


    <section class="modal fade text-dark" id="cadastrarDisciplina">
        <form class="modal-dialog" action="/cadastrarDisciplina" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Cadastrar Nova Disciplina
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Nova Disciplina:</h6>
                    <input type="text" class="form-control" placeholder="disciplina" name="disciplina" id="disciplina">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fachar
                    </button>
                    <button type="submit" class="btn btn-success">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </section>
</main>


@endsection

 
    
