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
               <?php    if(isset($_SESSION['logininputbox'])){echo "Olá, ".$_SESSION['logininputbox'].".";} else {echo "Olá, visitante."; } ?>
               <a href='logout.php'><input type='button' value='Sair'> <a/>
            </div>
            <figure class="figure">
            <!-- banner da empresa com logo "Me empresta?" -->
                <img class="knock" src="_imgs/knock.jpg">
            </figure>
        </header>
        
        <section>
            <fieldset class='fieldset'>
                <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
                <div>
                    <ul class='menu2'>
                        <li><a href="sessionloggededitprofile.php">Editar meu perfil</a></li>
                        <li><a href="sessionloggedaddthing.php">Adicionar algo para emprestar</a></li>
                        <li><a href="sessionloggedsearchthing.php">Procurar algo para solicitar empréstimo</a></li>
                    </ul>
                </div>
                <form name="emprestimo" method="post" action="process_borrow.php">
                    
                    <?php   $idsolic = getUser();
                            $id = getThingId(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
                    ?> 
                    
                    <h5>Gerencie seus dados:</h5>
                    <hr>                    
                    <input type="hidden" name="idthing" value="<?php if (isset($id)){echo $id['id'];}?>" />
                    <input type="hidden" name="idmember" value="<?php if (isset($id)){echo $id['codmember'];} ?>" />
                    <input type="hidden" name="idsolic" value="<?php echo $idsolic['id']; ?>" />
                    <table>
                        <tr>
                            <td><label for="nome">Coisa: </label><?php if (isset($id)){echo $id['nome']; }else { echo ("");}?>
                        </tr>
                        <tr>
                            
                            <td><label for="dataget">Data do resgate: </label>
                            <input type="date" name="dataget" required/>
                        </tr>
                            <td><label for="datareturn">Data da devolução: </label>
                                <input type="date" name="datareturn" required />
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Solicitar" />
                        </tr>
                        <tr>
                            <td colspan="4"><hr>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </section>
    </body>
    
    <footer class="footer">
        Me empresta? &copy; 2020.
    </footer>
</html>