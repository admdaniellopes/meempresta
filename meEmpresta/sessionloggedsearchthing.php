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
        
        <section>
            <fieldset class='fieldset'>
                <div>
                    <ul class='menu2'>
                        <li><a href="sessionloggededitprofile.php">Editar meu perfil</a></li>
                        <li><a href="sessionloggedaddthing.php">Adicionar algo para emprestar</a></li>
                        <li><a href="sessionloggedsearchthing.php">Procurar algo para solicitar empréstimo</a></li>
                    </ul>
                </div>
            </div>
            <form name="addstuff" method="POST">
                    <h5>Procure algo para solicitar empréstimo:</h5>
                    <hr>
                    <?php   if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
                    <table>
                        <tr>
                            <td><label for="categoria">Categoria:</label>
                            <select name="categoria" action="">
                                <option value="jardinagem" name="jardinagem">Artigos para jardinagem</option>
                                <option value="ferramentas" name="ferramentas">Ferramentas</option>
                                <option value="livros" name="livros">Livros</option>
                                <option value="roupas" name="roupas">Roupas</option>
                                <option value="acessorios" name="acessorios">Acessórios</option>
                                <option value="cosmeticos" name="cosmeticos">Cosméticos</option>
                                <option value="brinquedos" name="brinquedos">Brinquedos</option>
                                <option value="viagem" name="viagem">Artigos para viagens</option>
                            </select>
                            <input type="submit" value="Procurar" />
                        </tr>
                    </table>
                </form>
                <?php
                $email = $_SESSION['logininputbox'];
                $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
                searchThing($categoria, $email)?>
            </fieldset>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>