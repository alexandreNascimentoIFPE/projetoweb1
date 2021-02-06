<?php 
  include_once '../../funcoes/funcoes.php';
  $acaoBibliotecario = new Biblioteca();
  $acaoBibliotecario -> cancelarLivro($_GET["id_aluguel"]);
  echo "
    <script>
        window.location.reload();
    </script>
  "
?>