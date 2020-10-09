<?php
    SESSION_START();
    $login = isset($_POST["cxlogin"])?strtolower($_POST["cxlogin"]):"";
    $senha = isset($_POST["cxsenha"])?strtolower($_POST["cxsenha"]):"";
    $perfil = isset($_POST["perfil"])?strtolower($_POST["perfil"]):"";
    include_once 'conexao.php';

    $log = mysqli_query($conn,"select *from tbfuncionario where usuario='$login' 
    and senha= '$senha' and perfil = '$perfil'") or die(mysql_error());
    
    $linha = mysqli_fetch_array($log);

    if($login == "" || $senha == "")
    {echo " Acesso restrito, efetua o login novamente !";}
    
    if($login != $linha["usuario"] && $senha != $linha["senha"])
    {echo " Acesso restrito, efetua o login novamente !";}

    if($login == $linha["usuario"] && $senha == $linha["senha"] && $perfil == "administrador")
    {
        $_SESSION["usuario"]=$linha["nomeusuario"];
        $_SESSION["cargo"]="administrador";
        echo "
            <script>
                window.location.href = '../../menu.php';
            </script>
        ";
    }
    if($login == $linha["usuario"] && $senha == $linha["senha"] && $perfil == "funcionario")
    {
        $_SESSION["usuario"]=$linha["nomeusuario"];
        $_SESSION["cargo"]="funcionario";
        echo "
            <script>
                window.location.href = '../menuser.php';
            </script>
        ";
    }
    else
    {
        echo "<script>
                alert('Acesso negado!');
                window.location.href = '../../index.php';
            </script>";
    }
?>