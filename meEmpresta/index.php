<?php
ini_set('session.use_strict_mode', 1);
session_cache_expire(5);
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
            <div class="menuprincipal">
                <!-- menu principal com links para as páginas internas -->
                <nav>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="help.php">Suporte</a></li>
                    </ul>
                </nav>
            </div>
            <div class="logbox">
            <!-- formulário para login com imputs "usuário", "senha", botão de acessar e "esqueci a senha"  -->
                <form name="loginform" method="POST" action="loginprocess.php">
                    <label>Login:</label>
                    <input class="ibox" type="text" name="logininputbox" size="25" placeholder="Informe o email:" />
                    <label>Senha: </label>
                    <input class="ibox" type="password" name="passwordinputbox" size="15" placeholder="Informe sua senha:" />
                    <input class="ibotton" type="submit" value="Acessar" />
                    <a href="forgetpassword.php" target="blank"><input class="ibotton" type="button" value="Esqueci a senha"></a>
                    <a href="add_new_user.php"><input class="ibotton" type="button" value="Novo membro"></a>
                </form>
            </div>
            <figure class="figure">
            <!-- banner da empresa com logo "Me empresta?" -->
                <img class="knock" src="_imgs/knock.jpg">
            </figure>
        </header>
        <section class="section">
            <h5 class="alerta"><?php if(isset($_SESSION['erroLog'])){echo $_SESSION['erroLog']; unset($_SESSION['erroLog']);} ?></h5>
            <h5>Para que comprar algo se você irá utilizá-lo apenas uma vez. E se o seu vizinho já possui e o disponibilizasse para lhe emprestar?</h5>
            <h5>Esse é o nosso negócio, ajudar as pessoas a se conectarem para compartilhar coisas.</h5>
            <h5>São milhares de itens disponíveis. Basta acessar, buscar o item e agendar a data de retirada.</h5>
            <h5>Isso mesmo, simples assim.</h5>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>
