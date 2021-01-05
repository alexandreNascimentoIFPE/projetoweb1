<?php 
class MySQL
{
	var $host   = '127.0.0.1';
	var $usr    = 'root';
	var $pw     = '';
	var $bDados = 'projetoweb';
	
//	var $host   = '127.0.0.1';
//	var $usr    = 'root';
//	var $pw     = '@ml53nh@';
//	var $bDados = 'perfisios_premium';

	var $sql;
	var $conn;
	var $resultado;
	
	function connMySQL(){

		$this->conn = mysqli_connect($this->host, $this->usr, $this->pw, $this->bDados);
		if (mysqli_connect_errno()){
			echo '<p>N&atilde;o foi poss&iacute;vel conectar-se ao servidor MySQL.</p>
				  <p><b>Erro MySQL ['. mysqli_connect_errno() .']: ' . mysqli_connect_error() . '</b></p>';
			exit();
		}
	}

	function logQuery($query){
		$pieces = explode(" ", strtolower($query));
		if($pieces[0]=='update' || $pieces[0]=='insert' || $pieces[0]=='delete'){
			$fp = fopen("/var/www/html/planos/premium/espaco_equilibrio/biblioteca/queryLog.log", "a");
			$debug = "";
			$debug = debug_backtrace();
			$query = "############################################################################################################# \n 
			ID ".$_SESSION["adm_sistema_acesso_id_usuario"]." Usuário ".$_SESSION["adm_sistema_acesso_nome"]."  \n ".$query." \n".json_encode($debug)." \n";
			fwrite($fp, $query);
			fclose($fp);
		}
	}
	
	function runQuery($sql){
		$this->connMySQL();
		
		if($this->resultado = mysqli_query($this->conn, $sql)){
			//$this->logQuery($sql);
			return $this->resultado;
		}else{
			echo '<p>N&atilde;o foi poss&iacute;vel executar a instru&ccedil;&atilde;o SQL.</p>
				  <p><b>Erro MySQL ['. mysqli_errno($this->conn) .']: ' . mysqli_error($this->conn) . '</b></p>
				   <p><pre>'.$sql.'</pre></p>';
			exit();
		}
	}
	
	function insert_id(){
		return mysqli_insert_id($this->conn);
	}
	
	function closeConnMySQL(){
		return mysqli_close($this->conn);
	}
	
	function registros_afetados(){
		return mysqli_affected_rows($this->conn);
	}
	
	function liberar_memoria(){
		return mysqli_free_result($this->resultado);
	}
	
}
?>