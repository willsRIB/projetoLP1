<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php

        include_once 'conexao.php';

        $id = $_GET ["id"];

        $excluir = "delete from tbproduto where idprod = '$id'";
        $executar = mysqli_query ($conn,$excluir);
        if($executar)
        {
            echo "Produto excluido com sucesso!";
            echo "<br>";
            echo "<a href='../../menu.php'> Voltar ao menu </a>";
        }
        else{
            echo "Produto não excluido!";
            echo "<br>";
            echo "<a href='../../menu.php'> Voltar ao menu </a>";
        }
?>
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