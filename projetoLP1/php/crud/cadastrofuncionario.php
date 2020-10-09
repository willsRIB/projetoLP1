<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    <title>Cadastro de Funcionario</title>
    <style>
        fieldset {width:600px;margin:auto;}
    </style>
</head>
<body>

<form action="comandofuncionario.php" method="POST"> 
    <fieldset>
    <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
        Nome do Funcionario: </br>
             <input type="text" name="cxuser"></br>
        Login: </br>
             <input type="text" name="cxlogin"></br>
        Senha: </br>
             <input type="password" name="cxsenha"></br>
            Cargo do Funcionario:</br>
            Administrador:
            <input type="radio" name="perfil"value="administrador"/></br>
            Funcionário:    
            <input type="radio" name="perfil"value="funcionario" checked/></br></br>
            <input type="submit" value="Enviar">
            <a href="listarfuncionario.php"><button>Listar Funcionarios</a></button></br>
    <div id="menu">
    </br>
            <a href="cadastroproduto.php">Cadastrar Produto</a></br>
            <a href="cadastrocliente.php">Cadastrar Cliente</a></br>
            <a href="../../menu.php">Voltar ao menu</a></br>
            <a href="../fimsessao.php">Sair</a></br>
    </div>
    </fieldset>
    </form>
</body>
</html>
<?php
    }
    else
    {
        echo "<script>
            window.location.href ='../../index.php';
        </script>
        ";
    }
?>
