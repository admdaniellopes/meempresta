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
            <div class="menuprincipal">
                <!-- menu principal com links para as páginas internas -->
                <nav>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
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
            <fieldset title="Editar Usuários">
                <?php

                if(isset($_SESSION['msgWrongPW'])){
                    echo $_SESSION['msgWrongPW'];
                    unset($_SESSION['msgWrongPW']);
                }

                 if(isset($_SESSION['msgEmpty'])){
                    echo $_SESSION['msgEmpty'];
                    unset($_SESSION['msgEmpty']);
                }

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }            
                    $id = getUser();
                ?>
                <form name="cadastro" method="post" action="process_edit_user.php">
                    <td><input type="hidden" name="id" value="<?php if (isset($id)){echo $id['id']; }else { echo ("");}?>" />
                    <table>
                        <tr>
                            <?php if(isset($id)){echo('ID: '.$id['id']);} ?>
                            <td><label for="nome">Nome: </label>
                            <td><input type="text" name="nome" value="<?php if (isset($id)){echo $id['nome']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="sobrenome">Sobreome: </label>
                            <td><input type="text" name="sobrenome" value="<?php if (isset($id)){echo $id['sobrenome']; }else { echo ("");}?>" />
                        </tr>
                        <tr>
                            <td><label for="sexo">Sexo:</label>
                            <td colspan="3"><input type="radio" value="Masculino" name="Sexo">Masculino
                            <input type="radio" value="Feminino" name="Sexo">Feminino
                            <input type="radio" value="Null" name="Sexo">Não informar
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
            <a href='index.php'>Cadastrar</a>            
            <a href='list.php'>Listar</a>
            </fieldset>
        </section>
    </body>
    <footer class="footer">
        Me empresta? &copy; 2020.
    </footer>
</html>