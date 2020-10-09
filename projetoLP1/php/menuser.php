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
    <link rel="stylesheet" type="text/css" href="crud/estilo.css"/>
    <title>Login</title>
    <style>
        fieldset {width:800px;margin:auto;margin-top:0px;}
    </style>
</head>
<body>
<fieldset>
        <h1>Menu Principal do usuario padrão</h1>
    <div id="topo">
        <?php
            echo "Usuário: $ut </br>Função: $cargo</br>
            </a>"; 
        ?>
    </div></br></br>
    <a href="crud/cadastroclientefunc.php"><button id="posicao" style="width:90px;height:100px">
    <div>
        Cadastro Cliente
    </div>
    </button></a>
    
    <a href="crud/listarclientefunc.php"><button style="width:90px;height:100px">
    <div>
        Listar Cliente
        </div>
    </button></a>

    <a href="crud/listarprodutofunc.php"><button style="width:90px;height:100px">
    <div>
        Listar Produto
        </div>
    </button></a>

    <a href="fimsessao.php"><button id="sairpos" style="width:90px;height:100px">
    <div>
        Sair do Perfil
    </div>
    </button></a>
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
