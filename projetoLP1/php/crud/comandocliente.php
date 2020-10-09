<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php

    if($_POST ['cxnome'] !="")
{
        include_once 'conexao.php';

        $nome = $_POST['cxnome'];
        $telefone = $_POST['cxtelefone'];
        $cpf = $_POST['cxcpf'];
        $email = $_POST ['cxemail'];
        $endereco = $_POST ['cxendereco'];

        $sql = "insert into tbcliente (nome,telefone,cpf,email,endereco) 
        values ('$nome','$telefone','$cpf','$email','$endereco');";

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
<a href="cadastrocliente.php">Cadastrar cliente</a></br>
<a href="../../menu.php">Voltar ao menu</a>
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
