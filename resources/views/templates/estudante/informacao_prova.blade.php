<!DOCTYPE html>
<html lang="pt-PT" xmlns:th="http://www.thymeleaf.org">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scaleable=no"/>
        <meta name="author" content="Eugenio Sergio Tomas">
        <meta name="description" content="Todo material disponibilizado de forma totalmente facilitada">
        <meta name="keywords" content="sgp, testes, mini-testes, aulas, avaliacao, documentos">
        <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        <title>Historico de Provas</title>
    </head>
    <body>
        <header class="navbar navbar-dark text-light navbar-expand-lg bg-dark" id="utilizador">
            <div class="container">
                    <div class="ml-0">
                        <h1 class="navbar-brand">
                            Sistema de Gestao de Provas
                        </h1>
                    </div>
                    <div class="justify-content-end">
                        <a class="ver-mais btn btn-dark"  data-toggle="modal" data-target="#perfis">
                            @if(Session::has('estudante')){{Session::get('estudante.nome')}}
                            <img src="/storage/perfil/{{Session::get('utilizador.perfil')}}" class="img-fluid" id="perfil"/>
                            @endif
                        </a>
                    </div>
            </div>
        </header>

        
        <div class="container titulo mt-5">
            <h3>Provas Realizadas</h3>
        </div>
        <nav class="container mt-3 bg-dark p-4 mb-5" id="estudanteNav">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 assunto text-left">
                <a type="button" href="/homeEstudante" class="btn btn-outline-light">
                    Home
                </a>
                </div>
            </div>
        </nav>


<main class="container" id="mainEstudante">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <h4>
                        Disciplina:
                    </h4>
                    <span>
                        Calculo I
                    </span><br><br>
                    <h4>
                        Assunto:
                    </h4>
                    <span>
                        Derivadas do primeiro grau
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
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4">
                    <h4>
                        Disciplina:
                    </h4>
                    <span>
                        TEC
                    </span><br><br>
                    <h4>
                        Assunto:
                    </h4>
                    <span>
                        Elementos pre-textuais
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
                    </div>
                </div>
            </div>
        </div>
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
                    
                    <h6>Nota:</h6>
                    <input type="number" class="form-control" placeholder="13" disabled name="nota" id="nota">


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
                    <button type="button" class="btn btn-success">
                        Mais Detalhes
                    </button>
                </div>
            </div>
        </div>
    </section>




    <section class="modal fade text-dark" id="perfis">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Perfil
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" placeholder="Nome" disabled name="Nome" id="Nome">

                    <input type="text" class="form-control mb-3" placeholder="Apelido" disabled name="apelido" id="apelido">

                    <input type="email" class="form-control mb-3" placeholder="Email" disabled name="email" id="email">

                    <input type="password" class="form-control mb-3" placeholder="*****"  name="senha" id="senha">

                    <input type="number" class="form-control mb-3" placeholder="Telefone" name="telefone" id="telefone">

                    <label for="endereco" class="mb-3">Endereco</label>
                    <input type="text" name="endereco" id="endereco" class="form-control mb-3" placeholder="Endereco" name="endereco" >
                    
                    <label for="perf" class="mb-3">Perfil</label>
                    <input type="file" class="form-control mb-3" name="perfil" id="perf">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fachar
                    </button>
                    <button type="button" class="btn btn-success">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </section>

    
</main>


<script type="text/javascript" src="/javascript/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/javascript/bootstrap.js"></script>
<script type="text/javascript" src="/javascript/style.js"></script>
 