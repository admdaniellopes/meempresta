<?php
session_start();
include('functs.php');
require_once ('autenticacao.php');
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
                        <li><a href="sessionlogged.php">Home</a></li>
                        <li><a href="help.php">Suporte</a></li>
                    </ul>
                </nav>
            </div>
           <div class="hello"> 
               <?php if(isset($_SESSION['logininputbox'])){echo "Olá, ".$_SESSION['logininputbox'].".";} else {echo "Olá, visitante."; } ?>
               <a href='logout.php'><input type='button' value='Sair'> <a/>
            </div>
            <figure class="figure">
            <!-- banner da empresa com logo "Me empresta?" -->
                <img class="knock" src="_imgs/knock.jpg">
            </figure>
        </header>
        
        <section class="section">
            <fieldset class='fieldset'>
                <div>
                    <ul class='menu2'>
                        <li><a href="sessionloggededitprofile.php">Editar meu perfil</a></li>
                        <li><a href="sessionloggedaddthing.php">Adicionar algo para emprestar</a></li>
                        <li><a href="sessionloggedsearchthing.php">Procurar algo para solicitar empréstimo</a></li>
                    </ul>
                </div>
                <h5>Minhas coisas</h5>
                <hr>
                <?php listingThing()?>
                <h5>Meus empréstimos ativos</h5>
                <hr>
                <?php listingBorrowed()?>
            </fieldset>
        </section>
        
        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>