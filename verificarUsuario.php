<?php
include_once 'funcoes/funcoes.php';
$acaoCadastroUsuario = new Biblioteca();

$arrayLogin = $acaoCadastroUsuario -> login($_POST["email"], $_POST["passwd"]);
var_dump($arrayLogin);
if ($arrayLogin["retorno"] == NULL) {
    echo "nada";
}
else {
    if ($arrayLogin["retorno"][0]["funcao"] == "bibliotecario") {
        session_start();
        $_SESSION["id_usuario"] = $arrayLogin["retorno"][0]["id_usuario"];
        setcookie("nome",$arrayLogin["retorno"][0]["nome"]);
        echo "<script>
         window.location.href = 'modulos/menuBibliotecario/menuBibliotecarioIndex.php';
        </script>";
        
    }
    else {
        session_start();
        $_SESSION["id_usuario"] = $arrayLogin["retorno"][0]["id_usuario"];
        setcookie("nome",$arrayLogin["retorno"][0]["nome"]);
        echo "<script>
         window.location.href = 'modulos/menuAluno/menuAlunoIndex.php';
        </script>";
    }
}

?>