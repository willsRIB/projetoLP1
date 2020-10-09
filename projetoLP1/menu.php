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
    <link rel="stylesheet" type="text/css" href="php/crud/estilo.css"/>
    <title>Login</title>
    <style>
        fieldset {width:800px;margin:auto;margin-top:0px;}
    </style>
</head>
<body>
<fieldset>
    <h1>Menu Principal do usuario administrador</h1>
        <div class="topo">
        <?php
            echo "Usuário: $ut </br>Função: $cargo</br>
            </a>"; 
        ?>

    <a href="php/crud/cadastrocliente.php"><button id="posicao1" style="width:90px;height:100px">
    <div>
        Cadastro Cliente
    </div>
    </button></a>
    
    <a href="php/crud/listarcliente.php"><button  style="width:90px;height:100px">
    <div>
        Listar Cliente
        </div>
    </button></a></br></br>

    <a href="php/crud/cadastroproduto.php"><button id="posicao1" style="width:90px;height:100px">
    <div>
        Cadastro Produto
    </div>
    </button></a>

    <a href="php/crud/listarproduto.php"><button style="width:90px;height:100px">
    <div>
        Listar Produto
        </div>
    </button></a></br></br>

    <a href="php/crud/cadastrofuncionario.php"><button id="posicao1" style="width:90px;height:100px">
    <div>
        Cadastrar Funcionario
    </div>
    </button></a>

    <a href="php/crud/listarfuncionario.php"><button style="width:90px;height:100px">
    <div>
        Listar Funcionario
    </div>
    </button></a></br></br>
    <a href="php/fimsessao.php"> <button id="posicao2" style="width:90px;height:100px"> 
    <div>
        Sair do Perfil
    </div>
    </button></a>
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