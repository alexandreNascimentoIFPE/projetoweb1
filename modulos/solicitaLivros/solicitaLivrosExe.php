<?php 
  include_once '../../funcoes/funcoes.php';
  $acaoBibliotecario = new Biblioteca();
  $acaoBibliotecario -> confirmarLivro($_GET["id_aluguel"]);
  echo "
    <script>
        window.history.back();
    </script>
  "
?>