<?php
session_start();
include('functs.php');
?>
    
<!DOCTYPE html>
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
            <div class="hello"> 
               <?php if(isset($_SESSION['logininputbox'])){echo "Olá, ".$_SESSION['logininputbox'].".";} else {echo "Olá, visitante."; } ?>
               <a href='logout.php'><input type='button' value='Sair'> <a/>
            </div>
        </header>
        <fieldset class="fieldset">
            <h5>Acesso de administrador</h5>
            <?php
            
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            
            listingUseradmin();
                    
            ?>
        </fieldset>
        
        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>