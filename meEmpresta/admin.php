<?php
include('functs.php');
?>
<!DOCTYPE html>
    <!--
PucPR
Fundamentos de Programação Web
Atividade Prática
Daniel Almeida Lopes
Novembro/2020
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Me empresta?</title>
        <link rel="stylesheet" type="text/css" href="_css/estilos.css" />
    </head>    
    <body>
        <header>	
            <figure class="figure">
            <!-- banner da empresa com logo "Me empresta?" -->
                <img class="knock" src="_imgs/knock.jpg">
            </figure>
        </header>
        <section class="section">
            <h1>Acesso de Administrador</h1>
            <div>
            <!-- formulário para login com imputs "usuário", "senha", botão de acessar e "esqueci a senha"  -->
                <form name="loginform" method="POST" action="loginprocessadmin.php">
                    <label>Login:</label>
                    <input class="ibox" type="text" name="logininputbox" size="25" placeholder="Informe o email:" />
                    <label>Senha: </label>
                    <input class="ibox" type="password" name="passwordinputbox" size="15" placeholder="Informe sua senha:" />
                    <input class="ibotton" type="submit" value="Acessar" />
                </form>
                <br>
            </div>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>
