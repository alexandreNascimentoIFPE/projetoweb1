<!DOCTYPE html>
<html>
<head>
<?php 
  include_once '../../funcoes/funcoes.php';
  $acaoBibliotecario = new Biblioteca();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../estilos/menu.css">
<script src="../../js/home.js"></script>
<script src="../../js/jquery.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<ul name="div" id="div">
  <li><a class="active" id="home" onclick="getClass(this.id); home();">Home</a></li>
  <li><a id="meus-livros" onclick="getClass(this.id); meusLivros();">Seus livros</a></li>
  <li><a id="entrar-contato" onclick="getClass(this.id); document.getElementById('id01').style.display='block'">Entrar em contato com bibliotecário</a></li>
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
<div class="w3-container">

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'; livrosAlugados(); getClass('home')" class="w3-button w3-display-topright">&times;</span>
          <br>
          <br>
          <div align="center">
            Assunto: <input type="text" id="assunto">
            <br>
            Destinatário: 
            <select name="destinatario" id="destinatario">
              <?php 
                $arrayDestinatarios = $acaoBibliotecario -> listarDestinatariosBibliotecario();
                for ($i=0; $i < count($arrayDestinatarios["retorno"]); $i++) { 
                  echo '<option value="'.$arrayDestinatarios["retorno"][$i]["nome"].'">'.$arrayDestinatarios["retorno"][$i]["nome"].'</option>';
                }
              ?>
            </select>
            <br>
            <br>
            <br>
            <div id="editor" style="height: 200px;"></div>
            
          </div>
          <div align="center">
          <button id="env" align="center" onclick="entrarContato();">Enviar Email</button>
          </div>
          <br>
          
      </div>
    </div>
  </div>
</div>
<script>
var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [ 'link', 'image', 'video', 'formula' ],          // add's image support
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
                ];
                
                var quill = new Quill('#editor', {
                	modules: {
                		toolbar: toolbarOptions
                	},

                	theme: 'snow'
                });
                var texto;
                var toolbar = quill.getModule('toolbar');
                toolbar.addHandler('image', showImageUI);
                toolbar.addHandler('clean', clearAll);
                function showImageUI() {
                	var range = this.quill.getSelection();
                	var value = prompt('digite o URL da imagem');
                	if(value){
                		this.quill.clipboard.dangerouslyPasteHTML(range.index, '<img src="'+value+'">');
                	}
                }

                function clearAll() {
                	quill.setText('');
                }
function entrarContato() {
  alert('Email enviado com sucesso !!!');    
}
</script>
</body>
</html>
