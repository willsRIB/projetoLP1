<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        fieldset {width:60px;margin:auto;margin-top:250px;}
    </style>
</head>
<body>
    <fieldset>
        <form action="php/crud/validar.php" method="POST"> 
            Funcionário:    
            <input type="radio" name="perfil"value="funcionario" checked/> 
            Administrador:
            <input type="radio" name="perfil"value="administrador"/></br></br>  
            Login:
            <input type="text" name="cxlogin"></br>
            Senha:
            <input type="password" name="cxsenha"></br></br>
            <input type="submit" value="Acessar">
        </form>
    </fieldset>
</body>
</html>