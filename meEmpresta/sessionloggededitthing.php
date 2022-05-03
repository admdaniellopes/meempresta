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
                <form  name="editthing" method="POST" action="process_edit_thing.php">
                    <h5>Gerencie suas coisas:</h5>
                    <hr>
                    <?php $id = getThingId(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)); ?>
                    <input type="hidden" name="id" value="<?php echo $id['id']; ?>" />
                    <input type="hidden" name="codmember" value="<?php echo $id['codmember']; ?>" />
                    <table>
                        <tr>
                            <td><label for="categoria">Categoria:</label>
                            <td><label for="nome">Nome:</label>
                            <td><label for="descricao">Descrição:</label>
                            <td><label for="disponibilidade">Disponibilidade:</label>
                            <td><label for="idademinima">Idade mínima:</label>
                        </tr>
                        <tr>
                            <td rowspan="2"><select name="categoria">
                                    <option value="jardinagem" name="jardinagem" <?php if(isset($id)){ if($id['categoria'] == 'jardinagem'){ echo 'selected="True"'; }}?>>Artigos para jardinagem</option>
                                    <option value="ferramentas" name="ferramentas" <?php if(isset($id)){ if($id['categoria'] == 'ferramentas'){ echo 'selected="True"'; }}?>>Ferramentas</option>
                                    <option value="livros" name="livros" <?php if(isset($id)){ if($id['categoria'] == 'livros'){ echo 'selected="True"'; }}?>>Livros</option>
                                    <option value="roupas" name="roupas" <?php if(isset($id)){ if($id['categoria'] == 'roupas'){ echo 'selected="True"'; }}?>>Roupas</option>
                                    <option value="acessorios" name="acessorios" <?php if(isset($id)){ if($id['categoria'] == 'acessorios'){ echo 'selected="True"'; }}?>>Acessórios</option>
                                    <option value="cosmeticos" name="cosmeticos" <?php if(isset($id)){ if($id['categoria'] == 'cosmeticos'){ echo 'selected="True"'; }}?>>Cosméticos</option>
                                    <option value="brinquedos" name="brinquedos" <?php if(isset($id)){ if($id['categoria'] == 'brinquedos'){ echo 'selected="True"'; }}?>>Brinquedos</option>
                                    <option value="viagem" name="viagem" <?php if(isset($id)){ if($id['categoria'] == 'viagem'){ echo 'selected="True"'; }}?>>Artigos para viagens</option>
                                </select>
                            <td rowspan="2"><input type="text" name="nome" value="<?php if(isset($id)){echo $id['nome'];}?>" />	
                            <td rowspan="2"><input type="text" name="descricao" value="<?php if(isset($id)){echo $id['descricao'];}?>" /> 
                            <td ><input type="radio" name="disponibilidade" value="disponível" <?php if(isset($id)){if ($id['disponibilidade'] == 'disponível'){echo 'checked="True"'; }} ?>>Disponível
                            <td rowspan="2"><input type="number" min="14" max="99" name="idademinima" placeholder="<?php if(isset($id)){echo $id['idademinima'];}?>" />
                        </tr>
                        <tr>
                            <td><input type="radio" name="disponibilidade" value="indisponível" <?php if(isset($id)){if ($id['disponibilidade'] == 'indisponível'){echo 'checked="True"'; }} ?>>Indisponível</td>
                        </tr>
                    </table>
                    <input type="submit" value="Salvar" />	
                </form>
            </fieldset>
        </section>

        <footer class="footer">
            Me empresta? &copy; 2020.
        </footer>
    </body>
</html>