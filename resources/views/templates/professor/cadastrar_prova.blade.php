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
        <title>formulario_prova</title>
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
                            @if(Session::has('professor')){{Session::get('professor.nome')}}
                            <img src="/storage/perfil/{{Session::get('utilizador.perfil')}}" class="img-fluid" id="perfil"/>
                            @endif
                        </a>
                    </div>
            </div>
        </header>

        <div class="container titulo mt-5">
            <h3>Criar Nova Prova</h3>
        </div>

        <section class="container mt-3 bg-dark p-4 mb-5">
            <form class="row mt-3" action="/cadastrarProvaUp" method="post">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2 mb-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <select name="disciplina" id="disciplina" class="form-control bg-dark text-light">
                                <option value="" disabled selected>
                                    Disciplina
                                </option>
                                @foreach ($disciplinas as $d)
                                <option value="{{$d->id}}">
                                    {{$d->nome}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <select name="assunto" id="assunto" class="form-control bg-dark text-light">
                                <option value="" disabled selected>
                                    Assunto
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                    <input type="text" class="form-control bg-dark text-light mb-4" name="nome" id="nomeProva" placeholder="Nome">
                
                    <input type="date" class="form-control bg-dark text-light mb-4" name="data_realizacao" id="dataRealizacao" placeholder="Data da realizacao">
                
                    <input type="number" class="form-control bg-dark text-light mb-4" name="duracao" id="duracaoProva" placeholder="Duracao">
                
                    <input type="number" class="form-control bg-dark text-light mb-4" name="cotacao" id="cotacao" placeholder="Cotacao">
                
                    <button type="submit" class="btn btn-outline-success">
                        Cadastrar
                    </button>
                </div>
            </form>
        </section>

        <div class="container titulo mt-5">
            <h3>Cadastrar Questao Ou Alternativa</h3>
        </div>

        <main class="container mt-3 bg-dark p-4 mb-5" id="professorNav">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <select name="operacao" id="operacao" class="form-control bg-dark text-light mb-4">
                        <option value="operacao" disabled selected>
                            Seleciona a Operacao
                        </option>
                        <option value="questao">
                            Adicionar Questao
                        </option>
                        <option value="alternativa">
                            Adicionar Alternativa
                        </option>
                    </select>
                </div>

                <form class="col-lg-12 col-md-12 col-sm-12 mb-4 questaoHidden" id="questaoHidden" action="/cadastrarQuestao" method="post">
                    @csrf
                    <select name="prova" id="prova" class="form-control bg-dark text-light mb-4">
                        <option value="" disabled selected>
                            Seleciona a Prova
                        </option>
                        @foreach ($provas as $p)
                        <option value="{{$p->id}}">
                            {{$p->nome}}
                        </option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control bg-dark text-light mb-4" name="questao" id="" placeholder="Escreva a questao">
                    
                    <input type="number" class="form-control bg-dark text-light mb-4" name="cotacao" id="quotacao" placeholder="cotacao da questao">

                    <button type="submit" class="btn btn-outline-success">
                        Cadastrar
                    </button>
                </form>

                <form class="col-lg-12 col-md-12 col-sm-12"  id="alternativaHidden" action="/cadastrarAlternativa" method="post">
                    @csrf
                    <select name="provacao" id="provacao" class="form-control bg-dark text-light mb-4">
                        <option value="" disabled selected>
                            Seleciona a Prova
                        </option>
                        @foreach ($provas as $p)
                        <option value="{{$p->id}}">
                            {{$p->nome}}
                        </option>
                        @endforeach
                    </select>
                    <select name="questacao" id="questacao" class="form-control bg-dark text-light mb-4">
                        <option value="" disabled selected>
                            Seleciona Questao
                        </option>
                        <option value="">
                            O que eh?
                        </option>
                        <option value="">
                            Qual eh?
                        </option>
                    </select>
                    <input type="text" class="form-control bg-dark text-light mb-4" name="alternativa" id="" placeholder="Escreva a alternativa">
                
                    <label for="alternativaVerdadeira" class="mb-4">Verdadeira</label>
                    <input type="radio" name="statusAlternativa" id="alternativaVerdadeira" value="true" class="mr-5 ml-5 mb-4">
                    
                    <label for="alternativaFalsa" class="mb-4">Falsa</label>
                    <input type="radio" name="statusAlternativa" id="alternativaFalsa" value="false" class="ml-5 mb-4"><br>

                    <input type="text" class="form-control bg-dark text-light mb-4" name="comentario" id="" placeholder="Escreva da resposta correta">

                
                    <button type="submit" class="btn btn-outline-success">
                        Cadastrar
                    </button>
                </form>
                
            </div>



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



        <footer class="text-light navbar-expand-lg bg-dark mt-5">
            <div class="conainer text-center p-3">
                <div class="navbar-text">
                    &copy;CopyRight 2023
                </div>
            </div>
        </footer>
        
         <script type="text/javascript">
            var disciplina = document.getElementById("disciplina");
            var assunto = document.getElementById("assunto");

            disciplina.addEventListener("change", function () {
                assunto.innerHTML = '<option value="">Assunto</option>';
                var ajax = new XMLHttpRequest();
                ajax.open("GET", "http://127.0.0.1:8000/buscarAssuntos/" + this.value, true);
                ajax.onreadystatechange = function () {
                    if (ajax.status === 200 && ajax.readyState === 4) {
                        var resposta = JSON.parse(ajax.responseText);
                        for (var i = 0; i < resposta.length; i++) {
                            var option = '<option value=' + resposta[i].id + '>' + resposta[i].tema + '</option>';
                            assunto.innerHTML += option;
                        }
                    }
                };
                ajax.send();
            });


            var operacao = document.getElementById("operacao");
            var questaoHidden = document.getElementById("questaoHidden");
            var alternativaHidden = document.getElementById("alternativaHidden");
            

            operacao.addEventListener("change", function(){
                
                if(this.value === "questao"){
                    alternativaHidden.style.display = "none";
                    questaoHidden.style.display = "block";

                }
                if(this.value === "alternativa"){
                    alternativaHidden.style.display = "block";
                    questaoHidden.style.display = "none";
                }

                
            });



            var provacao = document.getElementById("provacao");
            var questacao = document.getElementById("questacao");

            provacao.addEventListener("change", function () {
                questacao.innerHTML = '<option value="">Assunto</option>';
                var ajax = new XMLHttpRequest();
                ajax.open("GET", "http://127.0.0.1:8000/buscarQuestao/" + this.value, true);
                ajax.onreadystatechange = function () {
                    if (ajax.status === 200 && ajax.readyState === 4) {
                        var resposta = JSON.parse(ajax.responseText);
                        for (var i = 0; i < resposta.length; i++) {
                            var option = '<option value=' + resposta[i].id + '>' + resposta[i].texto_descritivo + '</option>';
                            questacao.innerHTML += option;
                        }
                    }
                };
                ajax.send();
            });
        </script>

        <script type="text/javascript" src="/javascript/jquery-3.4.1.min.js"></script>
        <!-- <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script> -->


        
    </body>
</html>