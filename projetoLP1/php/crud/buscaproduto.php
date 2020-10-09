<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
    <title> Document </title>
    <style>
        fieldset {width:505px;margin:auto;margin-top:0px;}
    </style>
       <?php include_once 'conexao.php'; ?> 
</head>

<body>
    <fieldset>
        <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
                <a href="../../menu.php"><button> Voltar ao menu </button></a>
                <a href="listarproduto.php"> <button>Voltar a lista de produto </button></a>
                <a href="cadastroproduto.php"> <button>Voltar ao cadastro de produto</button></a>
                <a href="../fimsessao.php"><button>Sair</button></br></a>
            <div id="listar">
                <?php
                    $produto = $_POST ["cxbuscaproduto"];

                    $consulta = "select *from tbproduto where nomeprod LIKE '%$produto%' ";
                    $executar = mysqli_query ($conn, $consulta);
                    $resultado = mysqli_num_rows ($executar);

                    if($resultado != 0)
                    {
                        echo "<script>alert('Produto encontrado');</script>";
                    }
                    else
                    {
                        echo "<script>
                                alert('Produto não localizado');
                                window.location.href = 'listarproduto.php'
                                </script>"; 
                    }

                    while ($linha = mysqli_fetch_array($executar)){
                ?>
                <div id="cx1"></br>

                <form action="alterarproduto.php" method="POST">

                        ID: <input type="text" name="cxid" value="<?php echo $linha ['idprod'];?>" readonly> <br/>
                        Nome do produto: <input type="text" name="cxnom" value="<?php echo $linha ['nomeprod'];?>" > <br/>
                        Quantidade: <input type="text" name="cxqnt" value="<?php echo $linha ['quantidade'];?>" > <br/>
                        Tamanho: <input type="text" name="cxtam" value="<?php echo $linha ['tamanho'];?>" > <br/></br>
                
                <div id="um">
                <button type="submit" style="border:none;background:#fff">
                    <a href><img src="../../img/bloco.png" widht="35" height="35"></a>
                </button>
                </div>

                </form>
                    
                </div>
                <div id="dois">
                <a href="excluirproduto.php?id=<?php echo $linha['idprod'];?>"><img src="../../img/lixeira.png" widht="35" height="35"></a></br>
                </div>
                <?php } 
                
                ?>
                
                <a href="../../menu.php"><button> Voltar ao menu </button></a>
                <a href="listarproduto.php"> <button>Voltar a lista de produto </button></a>
                <a href="cadastroproduto.php"> <button>Voltar ao cadastro de produto</button></a>
                <a href="../fimsessao.php"><button>Sair</button></br></a>
            </div>
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