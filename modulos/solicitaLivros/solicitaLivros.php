<?php
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$arrayLivros = $acaoListarLivro -> livroSolicitado();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../estilos/tabela.css">

</head>
<body>
    <br><br>
<style>
    #customers{
    position: relative;
    width : 80%;
    right: -25%;
}
</style>
<table id="customers">
  <tr>
    <th>Nome do Aluno</th>
    <th>ISBN</th>
    <th>Nome do Livro</th>
    <th>Autor</th>
    <th>Categoria</th>
    <th>Data do aluguel</th>
    <th>Data de devolução</th>
    <th>Confirmar</th>
    <th>Cancelar</th>
  </tr>
  
  <?php
  for ($i=0; $i < count($arrayLivros["retorno"]); $i++) { 
    echo "
      <tr>
          <td>".$arrayLivros["retorno"][$i]["nome"]."</td>
          <td>".$arrayLivros["retorno"][$i]["isbn"]."</td>
          <td>".$arrayLivros["retorno"][$i]["nome_livro"]."</td>
          <td>".$arrayLivros["retorno"][$i]["autor"]."</td>
          <td>".$arrayLivros["retorno"][$i]["categoria"]."</td>
          <td>".date('H:i:s d/m/Y', strtotime($arrayLivros["retorno"][$i]["data_aluguel"]))."</td>
          <td>".date('H:i:s d/m/Y', strtotime($arrayLivros["retorno"][$i]["data_vencimento"]))."</td>
          <td><a href='../solicitaLivros/solicitaLivrosExe.php?id_aluguel=".$arrayLivros["retorno"][$i]["id_aluguel"]."'><img src='../../img/check.png' alt=''></a></td>
          <td><a href='../solicitaLivros/cancelarLivro.php?id_aluguel=".$arrayLivros["retorno"][$i]["id_aluguel"]."'><img src='../../img/delete.png' alt=''></a></td>
       </tr>
    ";
  }
  ?>
</table>

</body>
</html>