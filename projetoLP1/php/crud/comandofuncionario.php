<?php
    SESSION_START();
    if(isset($_SESSION ["usuario"]) && $_SESSION ['cargo'] == "administrador"){
        $ut = $_SESSION["usuario"];
        $cargo = $_SESSION["cargo"];

?>
<?php

    if($_POST ['cxuser'] !="")
{
        include_once 'conexao.php';

        $nomeuser = $_POST['cxuser'];
        $login = $_POST['cxlogin'];
        $senha = $_POST['cxsenha'];
        $perfil = $_POST['perfil'];

        $sql = "insert into tbfuncionario (nomeusuario,usuario,senha,perfil)
        values ('$nomeuser','$login','$senha','$perfil');";

        $query = mysqli_query($conn,$sql);
        
        echo 'Dados cadastrado com sucesso!';
}
else
{
    echo 'Dados não cadastrados!';
}
?>
</br>

<a href="cadastrofuncionario.php">Cadastrar Funcionario</a></br>
<a href="cadastroproduto.php">Cadastrar Produto</a></br>
<a href="cadastrofuncionario.php">Cadastrar cliente</a></br>
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
