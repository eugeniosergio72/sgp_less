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
        <title>SGP_Login</title>
    </head>
    <body>
        <main class="form-inline" id="mainLogin">
            <div id="imagemLogin">
                <img src="/imagem/perfil.png" class="img-fluid"/>
            </div>
            <form name="login" class="form-block" autocomplete="off" action="{{route('efectuarLogin')}}" method="post">
                @csrf
                <span th:if="erro ao logar" class="text-danger text-sm-center"></span><br>
                <div class="mb-4">SGP Login</div>
                <div class="input-group mb-4" id="input">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <img src="/imagem/avatar.png" class="img-fluid" width="25" height="25"/>
                        </span>
                    </div>
                    <input type="text" class="text-light" name="email" placeholder="Email de Usuario" autocomplete="off"/>
                </div>

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <img src="/imagem/senha.png" class="img-fluid" width="25" height="25"/>
                        </span>
                    </div>
                    <input type="password" class="text-light" name="senha" placeholder="Senha" autocomplete="off"/>
                </div>

                <div class="input-group ">
                    <button type="submit" class="btn btn-success">Aceder</button>
                </div>

                <div class="input-group mt-3 text-center">
                    <a>Esqueceu Nome de Usuario / Senha</a>
                </div>

                <div class="input-group mt-5">
                    <a href="cadastro">  Crie sua Conta-----></a>
                </div>   
            </form>
        </main>

        
        


        <script type="text/javascript" src="/javascript/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/bootstrap/bootstrap.js"></script>
        <script type="text/javascript" src="/javascript/style.js"></script>
    </body>
</html>