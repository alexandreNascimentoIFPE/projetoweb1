<?php
$id_aluno = $_GET["idaluno"];
$id_livro = $_GET["idlivros"];
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$acaoListarLivro -> devolverLivro($id_aluno, $id_livro);
echo"<script>
        window.history.back();
    </script>";
?>