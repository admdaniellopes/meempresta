<?php
session_start();
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
                    <a href="newuser.php"><input class="ibotton" type="button" value="Novo membro"></a>
                </form>
            </div>
            <figure class="figure">
            <!-- banner da empresa com logo "Me empresta?" -->
                <img class="knock" src="_imgs/knock.jpg">
            </figure>
        </header>
        <fieldset class="fieldset">
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
            ?>
                <h5>Parece que você ainda não é membro. Vamos resolver isso?<br>
                Preencha os dados abaixo e seja um membro emprestador!</h5>
            <form name="cadastro" method="post" action="process_add_user.php">
                <table>
                    <tr>
                        <td><label for="nome">Nome: </label>
                        <td><input type="text" name="nome" placeholder="Informe seu nome" required />
                    </tr>
                    <tr>
                        <td><label for="sobrenome">Sobreome: </label>
                        <td><input type="text" name="sobrenome" placeholder="Informe seu sobrenome" required />
                    </tr>
                    <tr>
                        <td><label for="sexo">Sexo:</label>
                        <td colspan="3"><input type="radio" value="Masculino" name="sexo">Masculino
                                        <input type="radio" value="Feminino" name="sexo">Feminino
                                        <input type="radio" value="Nulo" name="sexo">Não informar
                    </tr>
                    <tr>		 
                       <td><label for="telefone">Telefone: </label>
                        <td><input type="tel" name="telefone" placeholder="Informe seu telefone" required />
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label>
                        <td><input type="email" name="email" placeholder="Informe seu email" required />
                    </tr>
                    <tr>
                        <td><label for="endereco">Endereço completo:</label>
                        <td><input type="text" name="endereco" placeholder="Informe seu endereço"/ required>
                        <td><input type="number" name="numero" min="0" max="99999" required /> 
                        <td><input type="text" name="complemento" placeholder="Informe apto/bloco/referência"/>
                    </tr>
                    <tr>
                        <td><label for="cidade">Cidade/UF:</label>
                        <td><input type="text" name="cidade" placeholder="Informe sua cidade" required />
                        <td><input type="text" name="uf" size="4" />
                    </tr>
                    <tr>
                        <td><label for="cep">CEP:</label>
                        <td><input type="text" name="cep" placeholder="Informe seu CEP" required />
                    </tr>
                    <tr>
                        <td colspan="4"><hr>
                    </tr>
                    <tr>
                        <td><label for="senha">Senha:</label>
                        <td><input type="password" name="senha" placeholder="Informe uma senha" required/>
                        <td><label for="confsenha">Confirme a senha:</label>
                        <td><input type="password" name="confsenha" placeholder="Confirme a senha" required/>
                    </tr>
                    <tr>
                        <td colspan="4"><hr>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Cadastrar" />
                    </tr>
                </table>
            </form>
        </fieldset>
        
        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>

<?php
    
?>

</html>