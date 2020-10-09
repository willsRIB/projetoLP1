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
        fieldset {width:560px;margin:auto;margin-top:0px;}
    </style>
       <?php include_once 'conexao.php'; ?> 
</head>

<body> 
<fieldset>
    <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
         <a href="../../menu.php"><button> Voltar ao menu </button></a>
         <a href="listarfuncionario.php"><button> Voltar a lista de Funcionario </button></a>
         <a href="cadastrofuncionario.php"><button> Voltar ao Cadastro de Funcionario </button></a>
         <a href="../fimsessao.php"><button>Sair</button></br></a>
        <div id="listar">
        <?php
            $funcionario = $_POST ["cxbuscafuncionario"];

            $consulta = "select *from tbfuncionario where nomeusuario LIKE '%$funcionario%' ";
            $executar = mysqli_query ($conn, $consulta);
            $resultado = mysqli_num_rows ($executar);

            if($resultado != 0)
            {
                echo "<script>alert('Funcionario encontrado');</script>";
            }
            else
            {
                 echo "<script>
                        alert('Funcionario não localizado');
                         window.location.href = 'listarfuncionario.php'
                        </script>"; 
            }

            while ($linha = mysqli_fetch_array($executar)){
        ?>
        <div id="cx1"></br>

             <form action="alterarfuncionario.php" method="POST">

            ID do Funcionario: <input name="cxid" type="text" value="<?php echo $linha ['idfunc'];?>" readonly> <br/>
            Nome do Usuario: <input name="cxnom" type="text" value="<?php echo $linha ['nomeusuario'];?>" > <br/>
            Usuario: <input type="text" name="cxusr" value="<?php echo $linha ['usuario'];?>" > <br/>
            Tipo do Usuario: <input type="text" name="cxtip" value="<?php echo $linha ['perfil'];?>" > <br/></br>
                <div id="um">
            <button type="submit" style="border:none;background:#fff">
                <a href><img src="../../img/bloco.png" widht="35" height="35"></a>
            </button>
            </div>
                </form>
            
        </div>
        <div id="dois">
        <a href="excluirfuncionario.php?id=<?php echo $linha['idfunc'];?>"><img src="../../img/lixeira.png" widht="35" height="35"></a>
            </div>
         <?php } 
         
         ?>
         </br></br>
         <a href="../../menu.php"><button> Voltar ao menu </button></a>
         <a href="listarfuncionario.php"><button> Voltar a lista de Funcionario </button></a>
         <a href="cadastrofuncionario.php"><button> Voltar ao Cadastro de Funcionario </button></a>
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