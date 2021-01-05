<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/login.css">
    <title>Document</title>
</head>
<body>
<div id="login-container">
    <h1>Login</h1>
    <form action="verificarUsuario.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
        <label for="password">Senha</label>
        <input type="password" name="passwd" id="passwd" placeholder="Digite sua senha">
        <input type="submit" value="Login">
    </form>
    <div id="register-container">
        <p>Ainda não tem uma conta?</p>
        <a href="registrar.php">Registrar</a>
    </div>
</div>
</body>
</html>