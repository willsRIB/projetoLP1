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
    <title>Cadastro de Cliente</title>
    <style>
        fieldset {width:600px;margin:auto;}
    </style>
</head>
<body>    
<form action="comandocliente.php" method="POST"> 
    
    <fieldset>
    <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
        Nome: </br>
             <input type="text" name="cxnome"></br>
        Telefone: </br>
             <input type="text" name="cxtelefone"></br>
        CPF: </br>
             <input type="text" name="cxcpf"></br>
        E-mail: </br>
             <input type="text" name="cxemail"></br>
        Endereço: </br>
             <input type="text" name="cxendereco"></br></br>

            <input type="submit" value="Enviar">
            <a href="listarcliente.php"><button>Listar Cliente</a></button></br>
     <div id="menu">
          </br>
          <a href="cadastrofuncionario.php">Cadastrar Funcionario</a></br>
          <a href="cadastroproduto.php">Cadastrar Produto</a></br>
          <a href="../../menu.php">Voltar ao Menu</a></br>
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