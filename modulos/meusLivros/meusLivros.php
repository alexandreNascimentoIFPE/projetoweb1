<?php
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
session_start();
$id_aluno = $_SESSION["id_usuario"];
$arrayLivros = $acaoListarLivro ->meusLivros($id_aluno)
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
    
    right: -15%;
}
</style>
<table id="customers">
  <tr>
    <th>ISBN</th>
    <th>Nome do Livro</th>
    <th>Autor</th>
    <th>Categoria</th>
    <th>Data do aluguel</th>
    <th>Data de devolução</th>
    <th>Renovar</th>
    <th>Devolver</th>
  </tr>
  
  <?php
  for ($i=0; $i < count($arrayLivros["retorno"]); $i++) { 
    echo "
      <tr>
          <td>".$arrayLivros["retorno"][$i]["isbn"]."</td>
          <td>".$arrayLivros["retorno"][$i]["nome_livro"]."</td>
          <td>".$arrayLivros["retorno"][$i]["autor"]."</td>
          <td>".$arrayLivros["retorno"][$i]["categoria"]."</td>
          <td>".date('H:i:s d/m/Y', strtotime($arrayLivros["retorno"][$i]["data_aluguel"]))."</td>
          <td>".date('H:i:s d/m/Y', strtotime($arrayLivros["retorno"][$i]["data_vencimento"]))."</td>
          <td align='center'> <a href='../pesquisaLivros/renovarLivros.php?idlivros=".$arrayLivros['retorno'][$i]['id_livro']."&idaluno=".$_SESSION['id_usuario']."'><img src='../../img/check.png' alt='' style='width:25px; height:25px;'></a></td>
          <td align='center'> <a href='../pesquisaLivros/devolverLivros.php?idlivros=".$arrayLivros['retorno'][$i]['id_livro']."&idaluno=".$_SESSION['id_usuario']."'><img src='../../img/delete.png' alt='' style='width:25px; height:25px;'></a></td>
      </tr>
    ";
  }
  ?>
</table>
</body>
</html>