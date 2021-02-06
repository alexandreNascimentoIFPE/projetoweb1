<?php
include_once 'conexao.php';



class Biblioteca 
{
    public function adicionarUsuario($nome, $email, $senha, $funcao, $sexo)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "INSERT INTO usuario(nome, email, senha, funcao, sexo) 
			VALUES ('{$nome}', '{$email}', '{$senha}', '{$funcao}', '{$sexo}')";
			
			$mySQL->runQuery($sql);

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}
	

	public function alugarLivro($id_aluno, $id_livro, $data_aluguel, $data_vencimento)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "INSERT INTO aluguel_livro(id_aluno, id_livro, data_aluguel, data_vencimento) 
			VALUES ('{$id_aluno}', '{$id_livro}', '{$data_aluguel}', '{$data_vencimento}')";
			
			$mySQL->runQuery($sql);

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
    }

    public function login($email, $senha)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}'";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{

				$arrayConfig[$x]["id_usuario"]       = $inf["id_usuario"];
				$arrayConfig[$x]["nome"] 	       = $inf["nome"];
                $arrayConfig[$x]["email"] 	       = $inf["email"];
                $arrayConfig[$x]["senha"] 	       = $inf["senha"];
                $arrayConfig[$x]["funcao"] 	       = $inf["funcao"];
                $arrayConfig[$x]["sexo"] 	       = $inf["sexo"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}
	

	public function livrosDisponiveisBli()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT * FROM livro WHERE id_livro NOT IN (SELECT id_livro FROM aluguel_livro)";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["id_livro"]           = $inf["id_livro"];
				$arrayConfig[$x]["isbn"]               = $inf["isbn"];
				$arrayConfig[$x]["nome_livro"] 	       = $inf["nome_livro"];
                $arrayConfig[$x]["autor"] 	           = $inf["autor"];
                $arrayConfig[$x]["categoria"] 	       = $inf["categoria"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}


	public function livros()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT * FROM livro WHERE id_livro NOT IN (SELECT id_livro FROM aluguel_livro WHERE confirmado = 0)";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["id_livro"]           = $inf["id_livro"];
				$arrayConfig[$x]["isbn"]               = $inf["isbn"];
				$arrayConfig[$x]["nome_livro"] 	       = $inf["nome_livro"];
                $arrayConfig[$x]["autor"] 	           = $inf["autor"];
                $arrayConfig[$x]["categoria"] 	       = $inf["categoria"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function cadastrarLivros($isbn, $nomeLivro, $autor, $categoria)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "INSERT INTO livro(isbn, nome_livro, autor, categoria)
			        VALUES('{$isbn}', '{$nomeLivro}', '{$autor}', '{$categoria}')";
			
			$exe = $mySQL->runQuery($sql);

			

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}
	
	public function meusLivros($id_aluno)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT l.id_livro, l.isbn, l.nome_livro, l.autor, l.categoria, al.data_aluguel, al.data_vencimento 
					FROM livro AS l
					INNER JOIN aluguel_livro AS al
					ON al.id_livro = l.id_livro 
					WHERE al.id_aluno = '{$id_aluno}'
					AND al.confirmado = 1";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{

				$arrayConfig[$x]["id_livro"]       = $inf["id_livro"];
				$arrayConfig[$x]["isbn"] 	       = $inf["isbn"];
                $arrayConfig[$x]["nome_livro"] 	       = $inf["nome_livro"];
                $arrayConfig[$x]["autor"] 	       = $inf["autor"];
                $arrayConfig[$x]["categoria"] 	       = $inf["categoria"];
				$arrayConfig[$x]["data_aluguel"] 	       = $inf["data_aluguel"];
				$arrayConfig[$x]["data_vencimento"] 	       = $inf["data_vencimento"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function devolverLivro($id_aluno, $id_livro)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "DELETE FROM aluguel_livro
					WHERE id_aluno = '{$id_aluno}' 
					AND id_livro = '{$id_livro}'";
			
			$exe = $mySQL->runQuery($sql);

			

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function listarDatasAluguel($id_aluno, $id_livro)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT al.data_vencimento 
					FROM aluguel_livro AS al
					WHERE al.id_aluno = '{$id_aluno}'
					AND al.id_livro = '{$id_livro}'";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["data_vencimento"] 	       = $inf["data_vencimento"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function renovarLivro($data_vencimento, $id_livro, $id_aluno)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "UPDATE aluguel_livro
			SET data_vencimento = '{$data_vencimento}'
			WHERE id_livro = '{$id_livro}' 
			AND id_aluno = '{$id_aluno}'";
			
			$exe = $mySQL->runQuery($sql);

			

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function listarLivrosAlugados()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT u.nome, l.id_livro, l.isbn, l.nome_livro, l.autor, l.categoria, al.data_aluguel, al.data_vencimento 
					FROM livro AS l
					INNER JOIN aluguel_livro AS al
					ON al.id_livro = l.id_livro 
					INNER JOIN usuario AS u
					ON u.id_usuario = al.id_aluno
					WHERE al.confirmado = 1";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["nome"]       = $inf["nome"];
				$arrayConfig[$x]["id_livro"]       = $inf["id_livro"];
				$arrayConfig[$x]["isbn"] 	       = $inf["isbn"];
                $arrayConfig[$x]["nome_livro"] 	       = $inf["nome_livro"];
                $arrayConfig[$x]["autor"] 	       = $inf["autor"];
                $arrayConfig[$x]["categoria"] 	       = $inf["categoria"];
				$arrayConfig[$x]["data_aluguel"] 	       = $inf["data_aluguel"];
				$arrayConfig[$x]["data_vencimento"] 	       = $inf["data_vencimento"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function listarDestinatariosAlunos()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT *
					FROM usuario
					WHERE funcao = 'aluno'";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["email"] 	       = $inf["email"];
				$arrayConfig[$x]["nome"] 	       = $inf["nome"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function listarDestinatariosBibliotecario()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT *
					FROM usuario
					WHERE funcao = 'bibliotecario'";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["email"] 	       = $inf["email"];
				$arrayConfig[$x]["nome"] 	       = $inf["nome"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function livroSolicitado()
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "SELECT u.nome, l.id_livro, l.isbn, l.nome_livro, l.autor, l.categoria, al.data_aluguel, al.data_vencimento, al.confirmado, al.id_aluguel 
					FROM livro AS l
					INNER JOIN aluguel_livro AS al
					ON al.id_livro = l.id_livro 
					INNER JOIN usuario AS u
					ON u.id_usuario = al.id_aluno
					WHERE al.confirmado = 0";
			
			$exe = $mySQL->runQuery($sql);

			$x = 0;
			$arrayConfig = array();
			while ($inf = mysqli_fetch_array($exe))
			{
				$arrayConfig[$x]["nome"]       = $inf["nome"];
				$arrayConfig[$x]["id_livro"]       = $inf["id_livro"];
				$arrayConfig[$x]["isbn"] 	       = $inf["isbn"];
                $arrayConfig[$x]["nome_livro"] 	       = $inf["nome_livro"];
                $arrayConfig[$x]["autor"] 	       = $inf["autor"];
                $arrayConfig[$x]["categoria"] 	       = $inf["categoria"];
				$arrayConfig[$x]["data_aluguel"] 	       = $inf["data_aluguel"];
				$arrayConfig[$x]["data_vencimento"] 	       = $inf["data_vencimento"];
				$arrayConfig[$x]["confirmado"] 	       = $inf["confirmado"];
				$arrayConfig[$x]["id_aluguel"] 	       = $inf["id_aluguel"];
				$x++;

			}

			$mySQL->closeConnMySQL();
			$arrayRetorno["status"]   = "ok";
			$arrayRetorno["mensagem"] = "ok.";
			$arrayRetorno["retorno"]  = $arrayConfig;

			return $arrayRetorno;

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function confirmarLivro($id_aluguel)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "UPDATE aluguel_livro
			SET confirmado = 1
			WHERE id_aluguel = '{$id_aluguel}'";
			
			$exe = $mySQL->runQuery($sql);

			

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}

	public function cancelarLivro($id_aluguel)
    {
        try{
			$mySQL = new MySQL;
			$mySQL->connMySQL();
			
			$sql = "DELETE FROM aluguel_livro
					WHERE id_aluguel = '{$id_aluguel}'";
			
			$exe = $mySQL->runQuery($sql);

			

		}catch( Exception $e ){
			$arrayRetorno["status"]   = "erro";
			$arrayRetorno["mensagem"] = $e->getMessage();
			$arrayRetorno["retorno"]  = "";
			return $arrayRetorno;
		}
	}
}

?>