<?php
$id_aluno = $_GET["idaluno"];
$id_livro = $_GET["idlivros"];
$dataAluguel = date('Y-m-d H-i-s');
$dataVencimento = date('Y-m-d H-i-s',strtotime("+1 week"));
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$acaoListarLivro -> alugarLivro($id_aluno, $id_livro, $dataAluguel, $dataVencimento);
echo"<script>
        window.history.back();
    </script>";
?>