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
    <title>Listagem de Produto</title>
    <style>
        fieldset {width:350px;margin:auto;margin-top:0px;}
    </style>
<?php include_once 'conexao.php'; ?>
</head>
<body>
<fieldset>
<?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
    <form action="buscaproduto.php" method="POST"> 
        Digite o nome do produto: </br>
        <input type="text" name="cxbuscaproduto">
        <button type = "submit">Buscar</button>
        </form></br>
        <a href="cadastrofuncionario.php"><button>Voltar ao cadastro de produto</br></button></a>
        <a href="../../menu.php"><button>Voltar ao menu</br></button></a>
        <a href="../fimsessao.php"><button>Sair</button></br></a>
    </form>
<div id=listarproduto>
        <?php
            $consulta = "select *from tbproduto";
            $executar = mysqli_query ($conn, $consulta);
            while ($linha = mysqli_fetch_array($executar)){
        ?>
        <div id="cx1"></br>
            <form action="alterarproduto.php" method="POST">

            ID: <input type="text" name="cxid" value="<?php echo $linha ['idprod'];?>" readonly> <br/>
            Nome do produto: <input type="text" name="cxnom" value="<?php echo $linha ['nomeprod'];?>" > <br/>
            Quantidade: <input type="text" name="cxqnt" value="<?php echo $linha ['quantidade'];?>" > <br/>
            Tamanho: <input type="text" name="cxtam" value="<?php echo $linha ['tamanho'];?>" > <br/>
                <div id="um">
            <button type="submit" style="border:none;background:#fff">
                <a href><img class="alterar"src="../../img/bloco.png" widht="35" height="35"></a>
            </button>
                </div>
            
            </form>
                <div id="dois">
            <a href="excluirproduto.php?id=<?php echo $linha['idprod'];?>"><img class="excluir"src="../../img/lixeira.png" widht="35" height="35"></a>
            </div>
        </div>
         <?php } ?>
         
         <a href="cadastrofuncionario.php"><button>Voltar ao cadastro de produto</br></button></a>
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
