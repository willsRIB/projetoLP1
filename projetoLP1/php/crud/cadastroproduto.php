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
    <title>Cadastro de Produto</title>
    <style>
        fieldset {width:600px;margin:auto;}
    </style>
</head>
<body>

<form action="comandoproduto.php" method="POST"> 
    <fieldset>
    <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
        Nome do produto: </br>
             <input type="text" name="cxprod"></br>
        Quantidade: </br>
             <input type="text" name="cxquant"></br>
        Tamanho do calçado: </br>
             <input type="text" name="cxtam"></br></br>

            <input type="submit" value="Enviar">
            <a href="listarproduto.php"><button>Listar Produto</a></button></br>

    <div id="menu">
          </br>
          <a href="cadastrofuncionario.php">Cadastrar Funcionario</a></br>
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
