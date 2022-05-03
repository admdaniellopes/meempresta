<?php
session_start();
include("functs.php");
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
                        <li><a <?php if(isset($_SESSION['logininputbox'])){echo 'href="sessionlogged.php"';} else{echo 'href="index.php"';}?>>Home</a></li>                        
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
            <h1>DÚVIDAS? AQUI TEM SUPORTE.</h1>
            <h2>Envie-nos suas dúvidas, reclmações e solicitações.</h2>
            <h2>Ajude-nos apontando onde podemos melhorar, o que poderia ser implementado para ampliar a utilização e elevar a satisfação em relação aos nossos serviços e atendimento.</h2>			

        <?php
            if(isset($_SESSION['logininputbox'])){
            $id = getUser();
            echo '<form class="formsuporte" name="formhelp" action="mailto:adm.daniel.almeida.lopes@gmail.com?subject=Website Feedback" method="post" enctype="text/plain">'.
                '<table>'.
                    '<tr>'.
                        '<td><label for="endemail">E-mail:</label>'.
                        '<td><input type="email" name="email" value="'.$id['email'].'" required />'.
                    '</tr>'.
                    '<tr>'.
                        '<td><label for="nome">Nome: </label>'.
                        '<td><input type="text" name="nome" value="'.$id['nome'].'" />'.
                    '</tr>'.
                    '<tr>'.		
                        '<td><label for="nome">Telefone: </label>'.
                        '<td><input type="tel" name="telefone" value="'.$id['telefone'].'" />'.
                    '</tr>'.
                    '<tr>'.
                        '<td><label for="resposta">Desejo minha resposta</label>'.
                        '<td><select>'.
                            '<option value="1" name="resposta"> por email'.
                            '<option value="1" name="resposta"> por telefone'.
                            '</select>'.
                    '</tr>'.
                    '<tr>'.
                        '<td><label>Tenho uma</label>'.
                        '<td><input type="radio" name="tiposolic" value="duvida"/>'.
                            '<label for="tiposolic">Dúvida</label>'.
                            '<input type="radio" name="tiposolic" value="reclamacao"/>'.
                            '<label for="tiposolic">Reclação</label>'.
                            '<input type="radio" name="tiposolic" value="sugestão"/>'.
                            '<label for="tiposolic">Sugestão</label>'.			
                            '<input type="radio" name="tiposolic" value="solicitacao"/>'.
                            '<label for="tiposolic">Solicitação</label>'.
                    '</tr>'.
                    '<tr>'.
                        '<td><label for="demanda">Demanda:</label>'.
                        '<td><textarea name="demanda" rows="5" cols="50" placeholder="Conte-nos como podemos ajudar."></textarea>'.
                    '</tr>'.
                    '<tr>'.
                        '<td><input type="submit" value="Enviar" />'.
                    '</tr>'.
                '</table>'.
            '</form>';
            } else {
                echo '<form class="formsuporte" name="formhelp" action="mailto:adm.daniel.almeida.lopes@gmail.com?subject=Website Feedback" method="post" enctype="text/plain">'.
                    '<table>'.
                        '<tr>'.
                            '<td><label for="endemail">E-mail:</label>'.
                            '<td><input type="email" name="email" required />'.
                        '</tr>'.
                        '<tr>'.
                            '<td><label for="nome">Nome: </label>'.
                            '<td><input type="text" name="nome" />'.
                        '</tr>'.
                        '<tr>'.		
                            '<td><label for="nome">Telefone: </label>'.
                            '<td><input type="tel" name="telefone" />'.
                        '</tr>'.
                        '<tr>'.
                            '<td><label for="resposta">Desejo minha resposta</label>'.
                            '<td><select>'.
                                '<option value="1" name="resposta"> por email'.
                                '<option value="1" name="resposta"> por telefone'.
                                '</select>'.
                        '</tr>'.
                        '<tr>'.
                            '<td><label>Tenho uma</label>'.
                            '<td><input type="radio" name="tiposolic" value="duvida"/>'.
                                '<label for="tiposolic">Dúvida</label>'.
                                '<input type="radio" name="tiposolic" value="reclamacao"/>'.
                                '<label for="tiposolic">Reclação</label>'.
                                '<input type="radio" name="tiposolic" value="sugestão"/>'.
                                '<label for="tiposolic">Sugestão</label>'.			
                                '<input type="radio" name="tiposolic" value="solicitacao"/>'.
                                '<label for="tiposolic">Solicitação</label>'.
                        '</tr>'.
                        '<tr>'.
                            '<td><label for="demanda">Demanda:</label>'.
                            '<td><textarea name="demanda" rows="5" cols="50" placeholder="Conte-nos como podemos ajudar."></textarea>'.
                        '</tr>'.
                        '<tr>'.
                            '<td><input type="submit" value="Enviar" />'.
                        '</tr>'.
                    '</table>'.
                '</form>';
            }
        ?>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>