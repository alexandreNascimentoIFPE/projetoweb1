<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../estilos/menu.css">
<script src="../../js/home.js"></script>
<script src="../../js/jquery.js"></script>

</head>
<body>
<ul>
  <li><a class="active" id="home" onclick="getClass(this.id); livrosAlugados();">Livros alugados</a></li>
  <li><a href="../cadastrarLivros/cadastrarLivros.php" id="adicionar-livro" onclick="getClass(this.id);">Adicionar livros</a></li>
  <li><a id="livros-disponiveis"onclick="getClass(this.id); livrosDisponiveis(); ">Livros disponiveis</a></li>
</ul>
<div id="divExibir"></div>
<script>
  $('#divExibir').ready(function() {
    var searchParams = new URLSearchParams(window.location.search);
    if (!searchParams.get('i')) {
      $('#divExibir').load('../pesquisaLivrosBli/livrosAlugadosBli.php');
    }
    else{
      searchParams.delete('i');
      $('#divExibir').load('../pesquisaLivrosBli/livrosDisponiveisBli.php');
      getClass("livros-disponiveis");
     
    }
    
  });
  
    function livrosAlugados() {
      $('#divExibir').load('../pesquisaLivrosBli/livrosAlugadosBli.php');
    }
    function livrosDisponiveis() {
      $('#divExibir').load('../pesquisaLivrosBli/livrosDisponiveisBli.php');
    }
</script>
</body>
</html>
