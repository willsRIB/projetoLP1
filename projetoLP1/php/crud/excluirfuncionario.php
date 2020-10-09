<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php

        include_once 'conexao.php';

        $id = $_GET ["id"];

        $excluir = "delete from tbfuncionario where idfunc = '$id'";
        $executar = mysqli_query ($conn,$excluir);
        if($executar)
        {
            echo "Funcionario excluido com sucesso!";
            echo "<br>";
            echo "<a href='../../menu.php'> Voltar ao menu </a>";
        }
        else{
            echo "Funcionario não excluido!";
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