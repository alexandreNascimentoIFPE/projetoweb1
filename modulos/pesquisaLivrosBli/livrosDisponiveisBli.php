<?php
include_once '../../funcoes/funcoes.php';
$acaoListarLivro = new Biblioteca();
$arrayLivros = $acaoListarLivro ->livrosDisponiveisBli();
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
&nbsp;

<table id="customers">
  <tr>
    <th>ISBN</th>
    <th>Nome do Livro</th>
    <th>Autor</th>
    <th>Categoria</th>
  </tr>
  
  <?php
  
  for ($i=0; $i < count($arrayLivros["retorno"]); $i++) { 
    echo "
      <tr>
          <td>".$arrayLivros["retorno"][$i]["isbn"]."</td>
          <td>".$arrayLivros["retorno"][$i]["nome_livro"]."</td>
          <td>".$arrayLivros["retorno"][$i]["autor"]."</td>
          <td>".$arrayLivros["retorno"][$i]["categoria"]."</td>
      </tr>
    ";
  }
  ?>
</table>
</body>
</html>