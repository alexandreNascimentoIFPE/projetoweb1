<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/reg.css">
</head>
<body>
<div id="login-container">
    <h1>Cadastro</h1>
    <form action="cadastroUsuarioExe.php" method="POST" name="dados"
onSubmit="return enviardados();">
        <label for="nome">nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
        <label for="password">Senha</label>
        <input type="password" name="passwd" id="passwd" placeholder="Digite sua senha">
        <label for="cargo">Função:</label>
        <select name="cargo" id="cargo">
            <option value="bibliotecario">Bibliotecario</option>
            <option value="aluno">Aluno</option>
        </select>
        <br><br>
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo">
            <option value="m">masculino</option>
            <option value="f">feminino</option>
        </select>
        <br><br>

        <input type="submit" value="Sign up">
    </form>
    <div id="register-container">
        <p>Já tem uma conta ?</p>
        <a href="index.php">Login</a>
    </div>
</div>

<script language="JavaScript" >
    function enviardados(){
        if(document.dados.nome.value=="" ||
        document.dados.nome.value.length < 8)
        {
        alert( "Preencha campo NOME corretamente!" );
        document.dados.nome.focus();
        return false;
        }


        if( document.dados.email.value=="" ||
        document.dados.email.value.indexOf('@')==-1 ||
        document.dados.email.value.indexOf('.')==-1 )
        {
        alert( "Preencha campo E-MAIL corretamente!" );
        document.dados.email.focus();
        return false;
        }

        if( document.dados.passwd.value=="")
        {
        alert( "Preencha campo SENHA corretamente!" );
        document.dados.email.focus();
        return false;
        }
    }

</script>
</body>
</html>