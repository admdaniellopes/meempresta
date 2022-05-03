<?php
    session_start();
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
    <body class="body">
        <div class="document">
            <header class="header">	
                <div class="menuprincipal">
                    <nav>
                        <ul class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="help.php">Suporte</a></li>
                        </ul>
                    </nav>
                </div>
                <figure class="figure">
                <!-- banner da empresa com logo "Me empresta?" -->
                    <img class="knock" src="_imgs/knock.jpg">
                </figure>
            </header>
            <section>
                <div class="requestpassword">
                    <form name="requestpw" method="POST" action="requestpw.php">
                        <h5>Recuperação de senha.</h5>
                        <h6>Esqueceu sua senha? Não se preocupe.</h6>                                
                        <h6>Informe abaixo o seu email de login e lhe enviaremos uma novinha.</h6>
                        <input type="email" name="email" placeholder="Informe seu email" />
                        <input class="ibotton" type="submit" value="Recuperar senha" />	 
                    </form>
                </div>
            </section>
            <footer class="footer">
                Me empresta? &copy; 2020.
            </footer>
        </div>
    </body>
</html>
