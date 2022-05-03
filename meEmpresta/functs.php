<?php

function conn(){
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "empresta";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    return $conn;
}

function login(){
    
    if(empty($_POST['logininputbox']) || empty($_POST['passwordinputbox'])){
        header("Location: index.php");
        exit();
    }

    $conn = conn();
    $user = mysqli_real_escape_string($conn, $_POST['logininputbox']);
    $pw = mysqli_real_escape_string($conn, $_POST['passwordinputbox']);

    $query = "select nome, email from member where email = '{$user}' and senha = md5('{$pw}')";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);

    if($row == 1){  
        $_SESSION['logininputbox'] = $user;
        header("Location: sessionlogged.php");
        exit();
    } else{
        $_SESSION['nao_autenticado'] = True;
        header("Location: add_new_user.php");
        exit();
    }
}

function loginadmin(){
    
    if(empty($_POST['logininputbox']) || empty($_POST['passwordinputbox'])){
        header("Location: admin.php");
        exit();
    }

    $conn = conn();
    $user = mysqli_real_escape_string($conn, $_POST['logininputbox']);
    $pw = mysqli_real_escape_string($conn, $_POST['passwordinputbox']);

    $query = "select * from memberadmin where email = '{$user}' and senha = md5('{$pw}') and nome = 'ADMIN'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);

    if($row == 1){  
        $_SESSION['logininputbox'] = $user;
        header("Location: list.php");
        exit();
    } else{
        $_SESSION['nao_autenticado'] = True;
        header("Location: admin.php");
        exit();
    }
}

function logout(){
    
    session_destroy();
    header('Location: index.php');
    exit();
}

function addingUser(){
    
    $nome = FILTER_INPUT(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);   
    $sobrenome = FILTER_INPUT(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);     $sexo = FILTER_INPUT(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $telefone = FILTER_INPUT(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);   $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  
    $endereco = FILTER_INPUT(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);       $numero = FILTER_INPUT(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT); 
    $complemento = FILTER_INPUT(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING); $cidade = FILTER_INPUT(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING); 
    $uf = FILTER_INPUT(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);                   $cep = FILTER_INPUT(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $senha = FILTER_INPUT(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);             $confsenha = FILTER_INPUT(INPUT_POST, 'confsenha', FILTER_SANITIZE_STRING);    
    
    if(empty($nome) || empty($sobrenome) || empty($telefone) || empty($email) || empty($endereco) || empty($numero) || empty($cidade) || empty($uf) || empty($cep) || empty($senha) || empty($confsenha))
    {header("Location: index.php"); $_SESSION['msgEmpty'] = "<p style='color:red;'>Todos os campos são necessários.</p>"; exit();}
    
    if($senha !== $confsenha){header("Location: index.php"); $_SESSION['msgWrongPW'] = "<p style='color:red;'>Senhas não conferem.</p>"; exit();};
    $conn = conn();
    $query = "INSERT INTO member (nome, sobrenome, sexo, telefone, email, endereco, numero, complemento, cidade, uf, cep, senha, dataregistro) VALUES
            ('$nome','$sobrenome', '$sexo', '$telefone', '$email', '$endereco', '$numero', '$complemento', '$cidade', '$uf', '$cep', md5('$confsenha'), NOW())";
    $exec_query= mysqli_query($conn, $query);
    if(mysqli_insert_id($conn)){
        header("Location: add_new_user.php"); $_SESSION['msg'] = "<p style='color:green;'>Registro efetuado.</p>"; } else {
        header ("Location: add_new_user.php"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Registro não efetuado.</p>";}}

function listingUser(){
    
    $conn = conn();
    $query = "SELECT * FROM member";
    $exec_query = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($exec_query)){
        echo (' | '.$row['sobrenome']);
        echo (' |  '.$row['nome']);
        echo ('<br> '.$row['sexo']);
        echo (' | '.$row['telefone']);
        echo (' | '.$row['email']);
        echo ('<br>| '.$row['endereco'].', '.$row['numero'].' - '.$row['complemento']);
        echo (' | '.$row['cidade'].'/'.$row['uf']);
        echo ('<br>| <a href="edit_user.php?id='.$row['id'].'">Editar</a>');
        echo ('<hr>');
    }
}

function listingUseradmin(){
    
    $conn = conn();
    $query = "SELECT * FROM member";
    $exec_query = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($exec_query)){
        echo (' | '.$row['sobrenome']);
        echo (' |  '.$row['nome']);
        echo ('<br> | '.$row['sexo']);
        echo (' | '.$row['telefone']);
        echo (' | '.$row['email']);
        echo ('<br>| '.$row['endereco'].', '.$row['numero'].' - '.$row['complemento']);
        echo (' | '.$row['cidade'].'/'.$row['uf']);
        echo ('<br>| <a href="edit_user.php?id='.$row['id'].'">Notificar</a>');
        echo (' | <a href="edit_user.php?id='.$row['id'].'">Bloquear</a>');
        echo (' | <a href="edit_user.php?id='.$row['id'].'">Banir</a>');        
        echo ('<hr>');
    }
}
    
function editingUser(){
    
    $id = FILTER_INPUT(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);               $nome = FILTER_INPUT(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);   
    $sobrenome = FILTER_INPUT(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);     $sexo = FILTER_INPUT(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $telefone = FILTER_INPUT(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);   $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  
    $endereco = FILTER_INPUT(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);       $numero = FILTER_INPUT(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT); 
    $complemento = FILTER_INPUT(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING); $cidade = FILTER_INPUT(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING); 
    $uf = FILTER_INPUT(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);                   $cep = FILTER_INPUT(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $senha = FILTER_INPUT(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);             $confsenha = FILTER_INPUT(INPUT_POST, 'confsenha', FILTER_SANITIZE_STRING);    
    
    if(empty($nome) || empty($sobrenome) || empty($telefone) || empty($email) || empty($endereco) || empty($numero) || empty($cidade) || empty($uf) || empty($cep) || empty($senha) || empty($confsenha))
    {header("Location: sessionloggededitprofile.php"); $_SESSION['msgEmpty'] = "<p style='color:red;'>Todos os campos são necessários.</p>"; exit();}
    
    if($senha !== $confsenha){header("Location: sessionloggededitprofile.php"); $_SESSION['msgWrongPW'] = "<p style='color:red;'>Senhas não conferem.</p>"; exit();};
    $conn = conn();
    $query = "UPDATE member SET nome='$nome', sobrenome='$sobrenome', sexo='$sexo', telefone='$telefone', email='$email', endereco='$endereco', numero='$numero', complemento='$complemento', cidade='$cidade', uf='$uf', cep='$cep', senha=md5('$senha') where id='$id'"; 
    $exec_query= mysqli_query($conn, $query);
    
    if(mysqli_affected_rows($conn)){header("Location: sessionloggededitprofile.php"); $_SESSION['msg'] = "<p style='color:green;'>Edição efetuada.</p>";} else {
        header ("Location: sessionloggededitprofile.php?id=$id"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Edição não efetuada.</p>"; }
    
    return $id;}

function getUser(){         

    $conn = conn();
    $id = $_SESSION['logininputbox'];
    $query = "SELECT * FROM member where email = '{$id}'";
    $exec_query = mysqli_query($conn, $query); 
    global $id;
    $id = mysqli_fetch_assoc($exec_query);

    return $id;                
}

function addingThing(){
    
    $categoria = FILTER_INPUT(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);         $nome = FILTER_INPUT(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);   
    $descricao = FILTER_INPUT(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);         $disponibilidade = FILTER_INPUT(INPUT_POST, 'disponibilidade', FILTER_SANITIZE_STRING);     
    $idademinima = FILTER_INPUT(INPUT_POST, 'idademinima', FILTER_SANITIZE_NUMBER_INT); $codmember = FILTER_INPUT(INPUT_POST, 'codmember', FILTER_SANITIZE_NUMBER_INT);
    
    if(empty($categoria) || empty($nome) || empty($descricao) || empty($disponibilidade) || empty($idademinima))
    {header("Location: sessionloggedaddthing.php"); $_SESSION['msgEmpty'] = "<p style='color:red;'>Todos os campos são necessários.</p>"; exit();}
    
    $conn = conn();
    $query = "INSERT INTO thing (categoria, nome, descricao, disponibilidade, idademinima, codmember, dataregistro) VALUES
            ('$categoria','$nome', '$descricao', '$disponibilidade', '$idademinima', '$codmember', NOW())";
    $exec_query= mysqli_query($conn, $query);
    if(mysqli_insert_id($conn)){
        header("Location: sessionloggedaddthing.php"); $_SESSION['msg'] = "<p style='color:green;'>Registro efetuado.</p>"; } else {
        header ("Location: sessionloggedaddthing.php"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Registro não efetuado.</p>";}}

function listingThing(){

    $tabela = '<table class="tabelacoisas">'.'<thead>'.'<tr>'.'<th>Categoria</th>'.'<th>Nome</th>'
    .'<th>Descrição</th>'.'<th>Disponibilidade</th>'.'<th>Idade mínima</th>'.'<th colspan="3" >Ação</th>'.'</tr>'
    .'</thead>'.'<tbody>';
    $conn = conn();
    if (isset($_SESSION['logininputbox'])){$id = $_SESSION['logininputbox'];} else {exit();}
    $query = "SELECT t.id as idt, categoria as cat, t.nome as nomet, descricao as descr, disponibilidade as disp, idademinima as age, m.nome as nomem, m.sobrenome as sn FROM thing as t left join member as m on m.id = t.codmember where m.email = '{$id}'";
    $exec_query = mysqli_query($conn, $query);
    if ($exec_query == False){ echo "Não encontramos coisa alguma.";} else {
    $numrows = mysqli_num_rows($exec_query);
    $tabela2 ='</tbody>'.'</table><hr>'.'Encontramos '.$numrows.' coisa(s).';
    echo $tabela;
    while($row = mysqli_fetch_assoc($exec_query)){
        echo $tabela1 = '<tr>'.
        '<td>'.$row['cat'].'</td>'.
        '<td>'.$row['nomet'].'</td>'.
        '<td>'.$row['descr'].'</td>'. 
        '<td>'.$row['disp'].'</td>'.
        '<td>'.$row['age'].'</td>'.
        '<td><a href="sessionloggededitthing.php?id='.$row['idt'].'">Editar</a></td>'.
        '</tr>';}
    echo $tabela2; 
    }
}
    
function editingThing(){
    
    $id = FILTER_INPUT(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $categoria = FILTER_INPUT(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);   
    $nome = FILTER_INPUT(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $descricao = FILTER_INPUT(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);         
    $disponibilidade = FILTER_INPUT(INPUT_POST, 'disponibilidade', FILTER_SANITIZE_STRING);
    $idademinima = FILTER_INPUT(INPUT_POST, 'idademinima', FILTER_SANITIZE_NUMBER_INT);
    
    if(empty($nome) || empty($categoria) || empty($descricao) || empty($descricao) || empty($idademinima))
    {header("Location: sessionloggededitthing.php?id=$id"); $_SESSION['msgEmpty'] = "<p style='color:red;'>Todos os campos são necessários.</p>"; exit();}
    
    $conn = conn();
    $query = "UPDATE thing SET nome='$nome', categoria='$categoria', descricao='$descricao', disponibilidade='$disponibilidade', idademinima='$idademinima' where id='$id'";
    $exec_query= mysqli_query($conn, $query);
    
    if(mysqli_affected_rows($conn)){header("Location: sessionloggededitthing.php"); $_SESSION['msg'] = "<p style='color:green;'>Edição efetuada.</p>";} else {
        header ("Location: sessionloggededitthing.php?id=$id"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Edição não efetuada.</p>"; }
    
    return $id;}

function getThing(){         

    $conn = conn();
    $id = $_SESSION['logininputbox'];
    $query = "SELECT * FROM thing as t inner join member as m where t.id = '{$id}'";
    $exec_query = mysqli_query($conn, $query);
    $thing = mysqli_fetch_assoc($exec_query);

    return $thing;                
}

function getThingId($idt){         

    $conn = conn();
    $query = "SELECT * FROM thing WHERE id = '{$idt}'";
    $exec_query = mysqli_query($conn, $query);
    $thing = mysqli_fetch_assoc($exec_query);

    return $thing;                
}

function getopId($idop){         

    $conn = conn();
    $query = "SELECT * FROM borrow WHERE idop = '{$idop}'";
    $exec_query = mysqli_query($conn, $query);
    $op = mysqli_fetch_assoc($exec_query);

    return $op;                
}

function searchThing($categoria, $email){
    
    $tabela = '<table class="tabelacoisas">'.'<thead>'.'<tr>'.'<th>Categoria</th>'.'<th>Nome</th>'
    .'<th>Descrição</th>'.'<th>Disponibilidade</th>'.'<th>Idade mínima</th>'.'<th>Membro proprietário</th>'.'<th colspan="3" >Ação</th>'.'</tr>'
    .'</thead>'.'<tbody>';
    $conn = conn();
    if (isset($_SESSION['logininputbox'])){$id = $_SESSION['logininputbox'];} else {exit();}
    $query = "SELECT t.id as idt, categoria as cat, t.nome as nomet, descricao as descr, disponibilidade as disp, idademinima as age, m.nome as nomem, m.sobrenome as sn FROM thing as t left join member as m on t.codmember = m.id where m.email <> '{$email}' and categoria = '{$categoria}'";
    $exec_query = mysqli_query($conn, $query);
    if ($exec_query == False){ echo "Não encontramos coisa alguma.";} else {    
    $numrows = mysqli_num_rows($exec_query);
    $tabela2 ='</tbody>'.
    '</table><hr>'.'Encontramos '.$numrows.' coisa(s).';
    $acao = ' ';
    echo $tabela;
    while($row = mysqli_fetch_assoc($exec_query)){
        if ($row['disp'] == 'disponível'){$acao = 'Solicitar';} else {$acao = ' ';};
        echo $tabela1 = '<tr>'.
        '<td>'.$row['cat'].'</td>'.
        '<td>'.$row['nomet'].'</td>'.
        '<td>'.$row['descr'].'</td>'. 
        '<td>'.$row['disp'].'</td>'.
        '<td>'.$row['age'].'</td>'.
        '<td>'.$row['nomem'].' '.$row['sn'].'</td>'.
        '<td><a href="sessionloggededborrow.php?id='.$row['idt'].'">'.$acao.'</a></td>'.'</tr>'; }
    }
    echo $tabela2;
}

function borrowThing(){
    
    $idthing = FILTER_INPUT(INPUT_POST, 'idthing', FILTER_SANITIZE_NUMBER_INT);         
    $idmember = FILTER_INPUT(INPUT_POST, 'idmember', FILTER_SANITIZE_NUMBER_INT);   
    $idsolic = FILTER_INPUT(INPUT_POST, 'idsolic', FILTER_SANITIZE_NUMBER_INT);
    $dataget = FILTER_INPUT(INPUT_POST, 'dataget', FILTER_SANITIZE_STRING);         
    $datareturn = FILTER_INPUT(INPUT_POST, 'datareturn', FILTER_SANITIZE_STRING);     

        
    $conn = conn();
    $query1 = "UPDATE thing SET disponibilidade='indisponível' where id = '$idthing';";
    $exec_query = mysqli_query($conn, $query1);
    
    $query2 = "INSERT INTO borrow (idthing, idmbrsolic, idmbrprop, dataget, datareturn, dataregistro, opstatus) VALUES
            ('$idthing', '$idsolic', '$idmember', '$dataget', '$datareturn', NOW(), 'ativo');";
    $exec_query = mysqli_query($conn, $query2);
    
    if(mysqli_insert_id($conn)){
        header("Location: sessionloggededborrow.php"); $_SESSION['msg'] = "<p style='color:green;'>Solicitação efetuada.</p>"; } else {
        header ("Location: sessionloggededborrow.php"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Solicitação não efetuada.</p>";}
        }
    
function listingBorrowed(){ 
    
    echo $tabela = '<table class="tabelacoisas">'.'<thead>'.'<tr>'.'<th>N. Emprétimo</th>'.'<th>Id coisa</th>'.'<th>Categoria</th>'.'<th>Nome</th>'
    .'<th>Descrição</th>'.'<th>Data de devolução</th>'.'<th>Status</th>'.'<th colspan="3" >Ação</th>'.'</tr>'
    .'</thead>'.'<tbody>';
    $conn = conn();
    if (isset($_SESSION['logininputbox'])){$id = $_SESSION['logininputbox'];} else {exit();}
    $query = "select idop, opstatus, datareturn as dtr, t.id as idt, t.nome as tnm, t.descricao as tdes, t.categoria as tcat, m.nome as nm, m.sobrenome as sn from borrow as b left join thing as t on b.idthing = t.id left join member as m on b.idmbrsolic = m.id where m.email = '{$_SESSION['logininputbox']}'";
    $exec_query = mysqli_query($conn, $query);
    $numrows = mysqli_num_rows($exec_query);
    $acao = ' ';
    while($row = mysqli_fetch_assoc($exec_query)){
        if($row['opstatus'] == 'ativo'){ $acao = 'Devolver';} else {$acao = ' ';};
        echo $tabela1 = '<tr>'.
        '<td>'.$row['idop'].'</td>'.
        '<td>'.$row['idt'].'</td>'.        
        '<td>'.$row['tcat'].'</td>'.
        '<td>'.$row['tnm'].'</td>'.
        '<td>'.$row['tdes'].'</td>'.
        '<td>'.$row['dtr'].'</td>'.
        '<td>'.$row['opstatus'].'</td>'.
        '<td><a href="sessionloggedreturnthing.php?idop='.$row['idop'].'&idt='.$row['idt'].'">'.$acao.'</a></td>'.
        '</tr>';}
    echo $tabela2 ='</tbody>'.
    '</table><hr>'.'Encontramos '.$numrows.' coisa(s).';
    }
    
    function returnThing(){
    
    $idop = FILTER_INPUT(INPUT_POST, 'idop', FILTER_SANITIZE_NUMBER_INT);
    $idthing = FILTER_INPUT(INPUT_POST, 'idt', FILTER_SANITIZE_NUMBER_INT);
        
    $conn = conn();
    $query1 = "UPDATE thing SET disponibilidade='disponível' where id = '$idthing';";
    $exec_query = mysqli_query($conn, $query1);
    $conn2 = conn();
    $query2 = "UPDATE borrow SET opstatus='inativo' where idop = '$idop'";
    $exec_query = mysqli_query($conn2, $query2);
    
    if(mysqli_affected_rows($conn2)){
        header("Location: sessionloggedreturnthing.php"); $_SESSION['msg'] = "<p style='color:green;'>Solicitação efetuada.</p>"; } else {
        header ("Location: sessionloggedreturnthing.php"); $_SESSION['msg'] = "<p style='color: red;'>Erro. Solicitação não efetuada.</p>";}
        }