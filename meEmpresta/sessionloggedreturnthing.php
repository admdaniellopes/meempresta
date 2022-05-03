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
                <?php   $id = getThing(); 
                        if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } 
                        if(isset($_SESSION['msgEmpty'])){ echo $_SESSION['msgEmpty']; unset($_SESSION['msgEmpty']); }
                ?>
                <div>
                    <ul class='menu2'>
                        <li><a href="sessionloggededitprofile.php">Editar meu perfil</a></li>
                        <li><a href="sessionloggedaddthing.php">Adicionar algo para emprestar</a></li>
                        <li><a href="sessionloggedsearchthing.php">Procurar algo para solicitar empréstimo</a></li>
                    </ul>
                </div>
                <form  name="editthing" method="POST" action="process_return_thing.php">
                    <h5>Gerencie suas coisas:</h5>
                    <hr>
                    <?php   $idop = getopId(filter_input(INPUT_GET, 'idop', FILTER_SANITIZE_NUMBER_INT));
                            $idt = getThingId(filter_input(INPUT_GET, 'idt', FILTER_SANITIZE_NUMBER_INT)); ?>
                    <td><input type="hidden" name="idop" value="<?php if(isset($idop)){echo $idop['idop'];}?>" />	
                    <td><input type="hidden" name="idt" value="<?php if(isset($idt)){echo $idt['id'];}?>" />	
                    <table>
                        <tr>
                            <td><label for="Nome">Categoria:</label>
                            <td><label for="Descrição">Nome:</label>
                            <td><label for="Status">Status:</label>
                        </tr>
                        <tr>
                            <td><input type="text" name="nome" value="<?php if(isset($idt)){echo $idt['nome'];}?>" />	
                            <td><input type="text" name="descricao" value="<?php if(isset($idt)){echo $idt['descricao'];}?>" /> 
                            <td><input type="text" name="opstatus" value="<?php if(isset($idop)){ echo $idop['opstatus'];} ?>" />
                        </tr>
                    </table>
                    <input type="submit" value="devolver" />	
                </form>
            </fieldset>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>