<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "funcionario"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    <title>Listagem de Cliente</title>
    <style>
        fieldset {width:350px;margin:auto;margin-top:0px;}
    </style>
<?php include_once 'conexao.php'; ?>
</head>
<body>
<fieldset>
<?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
    <form action="buscaclientefunc.php" method="POST"> 
        Digite o nome do cliente </br>
        <input type="text" name = "cxbuscanome">
        <button type = "submit" >Buscar</button></br>
    </form>
    <a href="cadastroclientefunc.php"></br><button>Voltar ao cadastro de Cliente</br></button></a>
    <a href="../menuser.php"><button>Voltar ao menu</br></button></a>
    <a href="../fimsessao.php"><button>Sair</button></br></a>

<div id=listarcliente>
        <?php
            $consulta = "select *from tbcliente";
            $executar = mysqli_query ($conn, $consulta);
            while ($linha = mysqli_fetch_array($executar)){
        ?>
        <div id="cx1"></br>
                 
            ID: <input type="text" name ="cxid" value="<?php echo $linha ['id'];?>" readonly> <br/>
            Nome: <input type="text" name="cxnom" value="<?php echo $linha ['nome'];?>" readonly> <br/>
            Telefone: <input type="text" name="cxtel" value="<?php echo $linha ['telefone'];?>" readonly> <br/>
            CPF: <input type="text" name="cxcpf" value="<?php echo $linha ['cpf'];?>" readonly> <br/>
            E-mail: <input type="text" name="cxema" value="<?php echo $linha ['email'];?>" readonly> <br/>
            endereco: <input type="text" name="cxend" value="<?php echo $linha ['endereco'];?>" readonly> <br/>
            
            
        </div>
         <?php } ?>

         <div id="menu">
          </br>
    </div>
    <a href="cadastroclientefunc.php"></br><button>Voltar ao cadastro de Cliente</br></button></a>
    <a href="../menuser.php"><button>Voltar ao menu</br></button></a>
    <a href="../fimsessao.php"><button>Sair</button></br></a>
</fieldset>
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