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
    <title>Listagem de Funcionario</title>
    <style>
        fieldset {width:370px;margin:auto;margin-top:0px;}
    </style>
<?php include_once 'conexao.php'; ?>
</head>
<body>
<fieldset>
<?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
    <form action="buscafuncionario.php" method="POST"> 
        Digite o nome do funcionario </br>
        <input type="text" name="cxbuscafuncionario">
        <button type = "submit">Buscar</button>
    </form>
    <a href="cadastrofuncionario.php"></br><button>Voltar ao cadastro de Funcionario</br></button></a>
    <a href="../../menu.php"> <button>Voltar ao menu</br></button></a>
    <a href="../fimsessao.php"><button>Sair</button></br></a>
    </form>
<div id=listarfuncionario>
        <?php
            $consulta = "select *from tbfuncionario";
            $executar = mysqli_query ($conn, $consulta);
            while ($linha = mysqli_fetch_array($executar)){
        ?>
        <div id="cx1"></br>

            <form action="alterarfuncionario.php" method="POST">

            ID do Funcionario: <input name="cxid" type="text" value="<?php echo $linha ['idfunc'];?>" readonly> <br/>
            Nome do Usuario: <input name="cxnom" type="text" value="<?php echo $linha ['nomeusuario'];?>" > <br/>
            Usuario: <input type="text" name="cxusr" value="<?php echo $linha ['usuario'];?>" > <br/>
            Tipo do Usuario: <input type="text" name="cxtip" value="<?php echo $linha ['perfil'];?>" > <br/>
                <div id="um">
            <button type="submit" style="border:none;background:#fff">
                <a href><img class="alterar"src="../../img/bloco.png" widht="35" height="35"></a>
            </button>
                </div>
            
            </form> 
                <div id="dois">
            <a href="excluirfuncionario.php?id=<?php echo $linha['idfunc'];?>"><img class="excluir" src="../../img/lixeira.png" widht="35" height="35"></a>
                </div>
        </div>
         <?php } ?>
         <a href="cadastrofuncionario.php"></br><button>Voltar ao cadastro de Funcionario</br></button></a>
         <a href="../../menu.php"> <button>Voltar ao menu</br></button></a> 
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
