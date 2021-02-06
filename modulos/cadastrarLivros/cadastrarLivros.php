<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../estilos/menu.css">
<script src="../../js/home.js"></script>
<script src="../../js/jquery.js"></script>

</head>
<body>

<br><br><br><br><br><br><br>
<div style="position: relative; left: -50%;">
<strong>ISBN: &emsp;&emsp;&emsp;&nbsp;&nbsp;</strong><input type="text" id='isbn' style="height: 26px; border: 2px solid grey border-radius: 5px;">
<br>
<strong>Nome do livro :</strong><input type="text" id='nome-livro' style="height: 26px; border: 2px solid grey border-radius: 5px;">
<br>
<strong>Autor :&emsp;&emsp;&emsp;&nbsp;&nbsp;</strong><input type="text" id='autor' style="height: 26px; border: 2px solid grey border-radius: 5px;">
<br>
<strong>categoria:&emsp;&emsp;</strong> <input type="text" id='categoria' style="height: 26px; border: 2px solid grey border-radius: 5px;">
<br>
&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<button onclick="cadastrarLivro();">cadastrar</button>
</div>
<div id="divExibir"></div>
<script>
  function cadastrarLivro() {
    var isbn = $('#isbn').val();
    var nomeLivro = $('#nome-livro').val();
    var autor = $('#autor').val();
    var categoria = $('#categoria').val();
    var arrayCadastro = [];
    arrayCadastro[0] = isbn.replace(/\s/g, '%20');
    arrayCadastro[1] = nomeLivro.replace(/\s/g, '%20');
    arrayCadastro[2] = autor.replace(/\s/g, '%20');
    arrayCadastro[3] = categoria.replace(/\s/g, '%20');
    $('#divExibir').load('../cadastrarLivros/cadastrarLivrosExe.php?arrayConsulta='+JSON.stringify(arrayCadastro));
  }
</script>
</body>
</html>