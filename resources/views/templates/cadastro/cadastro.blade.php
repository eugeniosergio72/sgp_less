<!DOCTYPE html>
<html lang="pt-PT" xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:th="http://www.thymeleaf.org"
      >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Eugenio Sergio Tomas">
        <meta name="description" content="Todo material disponibilizado de forma totalmente facilitada">
        <meta name="keywords" content="sgp, testes, mini-testes, aulas, avaliacao, documentos">
        <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        <title>SGP_Cadastro</title>
    </head>
    <body>
        <form class="form-inline" name="cadastro" id="mainCadastro" action="/efectuarCadastro" method="post" enctype="multipart/form-data"> 
            @csrf
            <fieldset>
                <legend class="mb-4">
                    SGP Cadastro
                </legend>

                <div class="form-inline mb-3">
                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="imagem/avatar.png" class="img-fluid" width="25" height="25"/>
                            </span>
                        </div>
                        <input type="text" class=" text-light"  placeholder="Nome" name="nome" autocomplete="off"/>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="imagem/avatar.png" class="img-fluid" width="25" height="25"/>
                            </span>
                        </div>
                        <input type="text" class="text-light" placeholder="Apelido" name="apelido" autocomplete="off"/>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <img src="imagem/phone-call.png" class="img-fluid" width="25" height="25"/>
                        </span>
                    </div>
                    <input type="tel" class="form-control text-light" placeholder="Telefone" name="telefone" autocomplete="off"/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <img src="imagem/envelope.png" class="img-fluid" width="25" height="25"/>
                        </span>
                    </div>
                    <input type="email" class="form-control text-light" placeholder="Email" name="email" autocomplete="off"/>
                </div>


                <div class="input-group mb-3">
                    <input type="file"  class="form-control text-light custom-file-input bg-dark" name="perfil" id="perfil"/>
                    <label for="perfil" class="custom-file-label bg-dark tex
                    t-light">Carregar Perfil</label>
                </div>

                <div class="input-group mb-3">
                    <label for="professor" class="mr-3">Professor</label>
                    <input type="radio" class="bg-dark text-light mr-5" id="professor" name="titulacao" value="professor"/>

                    <label for="estudante" class="ml-5 mr-3">Estudante</label>
                    <input type="radio" class="bg-dark text-light" id="estudante" name="titulacao" value="estudante"/>
                </div>

                <div class="form-inline mb-3">
                    <div class="input-group mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="imagem/senha.png" class="img-fluid" width="25" height="25"/>
                            </span>
                        </div>
                        <input type="password" class="text-light" placeholder="Senha" name="senha" autocomplete="off"/>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="imagem/senha.png" class="img-fluid" width="25" height="25"/>
                            </span>
                        </div>
                        <input type="password" class="text-light" placeholder="Confirmar a Senha" name="confirmarSenha" autocomplete="off"/>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar-Se</button>
                </div>
 
                <span  class="mb-5 text-warning" id="inf"> </span><br><a href="login" class="mb-5">Efectuar Login-----></a>
            </fieldset>
        </form>



        <script type="text/javascript" src="/javascript/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/javascript/bootstrap.js"></script>
        <script type="text/javascript" src="/javascript/style.js"></script>
        
        
        
        <script type="text/javascript">
            var form = document.forms["cadastro"];
            var main = document.getElementById("mainCadastro");
            
            form.addEventListener("submit", function(evento){
                evento.preventDefault();
                for(var i = 0; i < form.elements.length; i++){
                    if(form.elements[i].type === "text" || form.elements[i].type === "tel" ||
                       form.elements[i].type === "password"){
                        if((form.elements[i].value).trim() === "" || form.elements[i].value === ""){
                            form.elements[i].style.border = "2px solid red";
                            document.getElementById("inf").innerHTML = "Preencha os campos a vermelho";
                        }else {
                            if((form.elements[i].value).length <=3 && form.elements[i].type !== "tel"){
                                form.elements[i].style.border = "2px solid blue";
                                document.getElementById("inf").innerHTML = "No minimo os campos devem ter 4 caracteres";
                            }
                            if(((form.elements[i].value).length <=8 || (form.elements[i].value).length >= 15) && form.elements[i].type === "tel"){
                                form.elements[i].style.border = "2px solid orange";
                                document.getElementById("inf").innerHTML = "Numero introduzido eh invalido";
                            }
    
                            form.elements[i].style.border = "2px solid green";
                        }
                    }
                }
                
                
                var senha = form.elements["senha"].value;
                var confirmarSenha = form.elements["confirmarSenha"].value;
                if(senha !== confirmarSenha){
                    form.elements["senha"].style.border = "2px solid yellow";
                    form.elements["confirmarSenha"].style.border = "2px solid yellow";
                    document.getElementById("inf").innerHTML = "As senha sao diferentes!";
                }else {
                    main.submit();
                    //HTMLFormElement.prototype.submit().call(main);
                }
                            
                        
            });
            
        </script>
    </body>
</html>