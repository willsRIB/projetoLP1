<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php

    if($_POST ['cxprod'] !="")
{
        include_once 'conexao.php';

        $produto = $_POST['cxprod'];
        $quantidade = $_POST['cxquant'];
        $tamanho = $_POST['cxtam'];

        $sql = "insert into tbproduto (nomeprod,quantidade,tamanho) 
        values ('$produto','$quantidade','$tamanho');";

        $query = mysqli_query($conn,$sql);
        
        echo 'Dados cadastrado com sucesso!';
}
else
{
    echo 'Dados não cadastrados!';
}
?>
</br>

<a href="cadastrofuncionario.php">Cadastrar funcionario</a></br>
<a href="cadastroproduto.php">Cadastrar Produto</a></br>
<a href="cadastrofuncionario.php">Cadastrar cliente</a>
<a href="php/crud/listarproduto.php">Listar Produto</a>
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
