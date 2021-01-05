<?php
include_once '../../funcoes/funcoes.php';
$arrayConsulta = json_decode($_REQUEST["arrayConsulta"]);
$acaoCadastrarLivro = new Biblioteca();
$acaoCadastrarLivro -> cadastrarLivros($arrayConsulta[0], $arrayConsulta[1], $arrayConsulta[2], $arrayConsulta[3]);

?>