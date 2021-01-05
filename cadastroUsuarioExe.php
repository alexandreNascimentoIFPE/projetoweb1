<?php
include_once 'funcoes/funcoes.php';

$nome   = $_POST["nome"];
$email  = $_POST["email"];
$senha  = $_POST["passwd"];
$funcao = $_POST["cargo"];
$sexo   = $_POST["sexo"];
$acaoCadastroUsuario = new Biblioteca();
$acaoCadastroUsuario->adicionarUsuario($nome, $email, $senha, $funcao, $sexo);
echo "<script>
         alert('Usuario ".$nome." cadastrado com sucesso');
         window.location.href = 'index.php';
      </script>";
?>