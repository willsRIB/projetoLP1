<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "funcionario"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1.0">
    <title> Document </title>
    <style>
        fieldset {width:505px;margin:auto;margin-top:0px;}
    </style>
       <?php include_once 'conexao.php'; ?> 
</head>

<body> 
<fieldset>
    <?php echo "Usuário: $ut </br>Função: $cargo</br> </a>"; ?></br>
    <a href="../menuser.php"><button> Voltar ao menu </button></a>
    <a href="listarclientefunc.php"><button> Voltar a lista de cliente </button></a>
    <a href="cadastroclientefunc.php"><button> Voltar ao Cadastro de cliente</button></a>
    <a href="../fimsessao.php"><button>Sair</button></br></a>
        <div id="listar">
        <?php
            $nome = $_POST ["cxbuscanome"];

            $consulta = "select *from tbcliente where nome LIKE '%$nome%' ";
            $executar = mysqli_query ($conn, $consulta);
            $resultado = mysqli_num_rows ($executar);

            if($resultado != 0)
            {
                echo "<script>alert('Cliente encontrado');</script>";
            }
            else
            {
                 echo "<script>
                        alert('Cliente não localizado');
                         window.location.href = 'listarclientefunc.php'
                        </script>"; 
            }

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
        
    
         <?php } 
         
         ?>
    </br>
    <a href="../menuser.php"><button> Voltar ao menu </button></a>
    <a href="listarclientefunc.php"><button> Voltar a lista de cliente </button></a>
    <a href="cadastroclientefunc.php"><button> Voltar ao Cadastro de cliente</button></a>
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