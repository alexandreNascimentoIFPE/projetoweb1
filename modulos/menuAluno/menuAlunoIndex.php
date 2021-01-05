<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../estilos/menu.css">
<script src="../../js/home.js"></script>
<script src="../../js/jquery.js"></script>
</head>
<body>
<ul name="div" id="div">
  <li><a class="active" id="home" onclick="getClass(this.id); home();">Home</a></li>
  <li><a id="meus-livros" onclick="getClass(this.id); meusLivros();">Seus livros</a></li>
</ul>
<div id="divExibir"></div>
<script>
    $('#divExibir').load('../pesquisaLivros/pesquisaLivros.php');
    function meusLivros() {
      $('#divExibir').load('../meusLivros/meusLivros.php');
    }
    function home() {
      $('#divExibir').load('../pesquisaLivros/pesquisaLivros.php');
    }
</script>
</body>
</html>
