<?php
$id_aluno = $_GET["idaluno"];
$id_livro = $_GET["idlivros"];
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$dataVencimento = $acaoListarLivro -> listarDatasAluguel($id_aluno, $id_livro);
$data_vencimento =  $dataVencimento["retorno"][0]["data_vencimento"];
$data_renovada   = new DateTime($data_vencimento);
$data_renovada->modify( '+1 week' );
$data_formato    = $data_renovada->format('Y-m-d H:i:s');

$acaoListarLivro -> renovarLivro($data_formato, $id_livro, $id_aluno);
echo"<script>
        window.history.back();
    </script>";
?>