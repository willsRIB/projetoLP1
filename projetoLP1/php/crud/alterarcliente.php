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
    $telefone = $_POST["cxtel"];
    $cpf = $_POST["cxcpf"];
    $email = $_POST["cxema"];
    $endereco= $_POST["cxend"];

    $alterar = "update tbcliente set 
        
        nome = '$nome',
        telefone = '$telefone',
        cpf = '$cpf',
        email = '$email',
        endereco= '$endereco'
        where
        id = '$cod';
    ";
    $executar = mysqli_query($conn,$alterar);
    if($alterar)
    {
        echo "Dados alterados com sucesso!";
        echo "<br>";
        echo "<a href='../../menu.php'> Voltar ao início </a>";
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