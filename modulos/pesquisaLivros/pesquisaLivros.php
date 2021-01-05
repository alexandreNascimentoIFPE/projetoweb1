<?php
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$arrayLivros = $acaoListarLivro ->livros();
session_start();

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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="filtro" id="filtro">
  <option value="isbn">ISBN</option>
  <option value="nome">Nome do Livro</option>
  <option value="categoria">Categoria</option>
  <option value="autor">Autor</option>
</select>
<input type="text" id="barra-pesquisa">
<input type="image" src="../../img/search.png" alt="" style="width:25px; height:25px;">
<br><br>
<table id="customers">
  <tr>
    <th>ISBN</th>
    <th>Nome do Livro</th>
    <th>Autor</th>
    <th>Categoria</th>
    <th>Locar</th>
  </tr>
  
  <?php
  for ($i=0; $i < count($arrayLivros["retorno"]); $i++) { 
    echo "
      <tr>
          <td>".$arrayLivros["retorno"][$i]["isbn"]."</td>
          <td>".$arrayLivros["retorno"][$i]["nome_livro"]."</td>
          <td>".$arrayLivros["retorno"][$i]["autor"]."</td>
          <td>".$arrayLivros["retorno"][$i]["categoria"]."</td>
          <td> <a href='../pesquisaLivros/alugaLivros.php?idlivros=".$arrayLivros['retorno'][$i]['id_livro']."&idaluno=".$_SESSION['id_usuario']."'><img src='../../img/check.png' alt='' style='width:25px; height:25px;'></a></td>
      </tr>
    ";
  }
  ?>
</table>
</body>
</html>