<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php
    include_once 'conexao.php';
    $cod = $_POST["cxid"];
    $nome = $_POST["cxnom"];
    $quantidade = $_POST["cxqnt"];
    $tamanho = $_POST["cxtam"];

    $alterar = "update tbproduto set 
        
        nomeprod = '$nome',
        quantidade = '$quantidade',
        tamanho = '$tamanho'
        where
        idprod = '$cod';
    ";
    $executar = mysqli_query($conn,$alterar);
    if($alterar)
    {
        echo "Dados alterados com sucesso!";
        echo "<br>";
        echo "<a href='../../menu.php'> Voltar ao início </a>";
        echo "</br><a href='listarproduto.php'> Alterar produto </a>";
    }
    else{
            echo "Dados não alterado!";
            echo "<br>";
            echo "<a href='../../menu.php'> Voltar ao início </a>";
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