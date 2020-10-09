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
    <title>Listagem de Cliente</title>
    <style>
        fieldset {width:350px;margin:auto;margin-top:0px;}
    </style>

<?php include_once 'conexao.php'; ?>
</head>
<body>
<fieldset>
<?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
    <form action="buscacliente.php" method="POST"> 
        Digite o nome do cliente </br>
        <input type="text" name = "cxbuscanome">
        <button type = "submit" >Buscar</button></br>
    </form>
        <a href="cadastrocliente.php"> </br><button>Voltar ao cadastro de cliente</br></button></a>
        <a href="../../menu.php"><button>Voltar ao menu</br></button></a>
        <a href="../fimsessao.php"><button>Sair</button></br></a>
    

<div id=listarcliente>
        <?php
            $consulta = "select *from tbcliente";
            $executar = mysqli_query ($conn, $consulta);
            while ($linha = mysqli_fetch_array($executar)){
        ?>
        <div id="cx1"></br>
            <form action="alterarcliente.php" method="POST">
                 
            ID: <input type="text" name ="cxid" value="<?php echo $linha ['id'];?>" readonly> <br/>
            Nome: <input type="text" name="cxnom" value="<?php echo $linha ['nome'];?>" > <br/>
            Telefone: <input type="text" name="cxtel" value="<?php echo $linha ['telefone'];?>" > <br/>
            CPF: <input type="text" name="cxcpf" value="<?php echo $linha ['cpf'];?>" > <br/>
            E-mail: <input type="text" name="cxema" value="<?php echo $linha ['email'];?>" > <br/>
            endereco: <input type="text" name="cxend" value="<?php echo $linha ['endereco'];?>" > <br/>
            </br>
            <div id="um">
            <button type="submit" style="border:none;background:#fff">
                <a href><img class ="alterar" src="../../img/bloco.png" ></a>
            </button>
            </div>
            </form> 
                <div id="dois">
            <a href="excluircliente.php?id=<?php echo $linha['id'];?>"><img class ="excluir"  src="../../img/lixeira.png"></a>
                </div>
        </div>
         <?php } ?>

         <div class="menu">
          </br>
        
    </div>
        <a href="cadastrocliente.php"> </br><button>Voltar ao cadastro de cliente</br></button></a>
        <a href="../../menu.php"><button>Voltar ao menu</br></button></a>
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