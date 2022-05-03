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
                <form name="addstuff" method="POST" action="process_add_thing.php">
                    <h5>Adicione algo para emprestar:</h5>
                    <hr>
                    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
                    <table>
                        <tr>
                            <td><label for="categoria">Categoria:</label>
                            <td><label for="nome">Nome:</label>
                            <td><label for="descricao">Descrição:</label>
                            <td><label for="disponibilidade">Disponibilidade:</label>
                            <td><label for="idademinima">Idade mínima:</label>
                            <td><label hidden for="idmember">ID Membro:</label>
                        </tr>
                        <tr>
                            <td rowspan="2"><select name="categoria" required>
                                    <option value="jardinagem" name="jardinagem">Artigos para jardinagem</option>
                                    <option value="ferramentas" name="ferramentas">Ferramentas</option>
                                    <option value="livros" name="livros">Livros</option>
                                    <option value="roupas" name="roupas">Roupas</option>
                                    <option value="acessorios" name="acessorios">Acessórios</option>
                                    <option value="cosmeticos" name="cosmeticos">Cosméticos</option>
                                    <option value="brinquedos" name="brinquedos">Brinquedos</option>
                                    <option value="viagem" name="viagem">Artigos para viagens</option>
                                </select>
                            <td rowspan="2"><input type="text" name="nome" placeholder="Informe nome do item" required />	
                            <td rowspan="2"><input type="text" name="descricao" placeholder="Informe a descrição do item" required />	                                        
                            <td ><input type="radio" name="disponibilidade" value="disponível" required>Disponível
                            <td ><input type="number" min="14" max="99" name="idademinima" required />
                            <td ><input hidden type="number" name="codmember" value="<?php $id = getUser(); echo $id['id']; ?>"/>    
                        </tr>
                        <tr>
                            <td><input type="radio" name="disponibilidade" value="indisponível">Indisponível</td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Incluir" />
                        </tr>
                    </table>
                </form>
            </fieldset>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>