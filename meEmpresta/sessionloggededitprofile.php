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
                <?php   if(isset($_SESSION['msgWrongPW'])){ echo $_SESSION['msgWrongPW']; unset($_SESSION['msgWrongPW']); }
                        if(isset($_SESSION['msgEmpty'])){ echo $_SESSION['msgEmpty']; unset($_SESSION['msgEmpty']); }
                        if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); }            
                        $id = getUser(); ?>
                <div>
                    <ul class='menu2'>
                        <li><a href="sessionloggededitprofile.php">Editar meu perfil</a></li>
                        <li><a href="sessionloggedaddthing.php">Adicionar algo para emprestar</a></li>
                        <li><a href="sessionloggedsearchthing.php">Procurar algo para solicitar empréstimo</a></li>
                    </ul>
                </div>
                <form name="cadastro" method="post" action="process_edit_user.php">
                    <h5>Gerencie seus dados:</h5>
                    <hr>
                    <input type="hidden" name="id" value="<?php if (isset($id)){echo $id['id'];}?>" />
                    <table>
                        <tr>
                            <td><label for="nome">Nome: </label>
                            <td><input type="text" name="nome" value="<?php if (isset($id)){echo $id['nome']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="sobrenome">Sobreome: </label>
                            <td><input type="text" name="sobrenome" value="<?php if (isset($id)){echo $id['sobrenome']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="sexo">Sexo:</label>
                            <td colspan="3"><input type="radio" value="Masculino" name="sexo" <?php if(isset($id)){ if($id['sexo'] == 'Masculino'){ echo 'checked="True"'; }}?>>Masculino
                                            <input type="radio" value="Feminino" name="sexo" <?php if(isset($id)){ if($id['sexo'] == 'Feminino'){ echo 'checked="True"'; }}?>>Feminino
                                            <input type="radio" value="Null" name="sexo" <?php if(isset($id)){ if($id['sexo'] == "Nulo"){ echo 'checked="True"'; }}?> >Não informar
                        </tr>
                        <tr>		 
                           <td><label for="telefone">Telefone: </label>
                            <td><input type="tel" name="telefone" value="<?php if (isset($id)){echo $id['telefone']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label>
                            <td><input type="email" name="email" value="<?php if (isset($id)){echo $id['email']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="endereco">Endereço completo:</label>
                            <td><input type="text" name="endereco" value="<?php if (isset($id)){echo $id['endereco']; }else { echo ("");}?>" />
                            <td><input type="number" name="numero" min="0" max="99999" value="<?php if (isset($id)){echo $id['numero'];}?>" /> 
                            <td><input type="text" name="complemento" value="<?php if (isset($id)){echo $id['complemento']; }else { echo ("");}?>"/>
                        </tr>
                        <tr>
                            <td><label for="cidade">Cidade/UF:</label>
                            <td><input type="text" name="cidade" value="<?php if (isset($id)){echo $id['cidade'];}?>" />
                            <td><input type="text" name="uf" size="4" value="<?php if (isset($id)){echo $id['uf'];}?>" />
                        </tr>
                        <tr>
                            <td><label for="cep">CEP:</label>
                            <td><input type="text" name="cep" value="<?php if (isset($id)){echo $id['cep'];}?>" />
                        </tr>
                        <tr>
                            <td colspan="4"><hr>
                        </tr>
                        <tr>
                            <td><label for="senha">Senha:</label>
                            <td><input type="password" name="senha" placeholder="Informe uma senha"/>
                            <td><label for="confsenha">Confirme a senha:</label>
                            <td><input type="password" name="confsenha" placeholder="Confirme a senha"/>
                        </tr>
                        <tr>
                            <td colspan="4"><hr>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Editar" />
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