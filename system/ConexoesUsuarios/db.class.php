<?php

	//Classe de conexão com o banco de dados
	class Db extends PDO{
		
		private $host 		= 'localhost';
		private $user		= 'u570232755_mpg';
		private $password	= 'salamander566';
		private $dbname 	= 'u570232755_nmpg';


		private $type		= 'mysql';
		private $port		= 3306;

		protected $conn;
		
	
		
		function query($sql){
			$r = parent::query($sql);
			$r->setFetchMode(PDO::FETCH_OBJ);
			return $r;
		}

		public function __construct(){
		        try{
		           	$this->conn = parent::__construct($this->type.":host=".$this->host.";port=".$this->port.";dbname=".$this->dbname, $this->user, $this->password);
		        } catch(PDOException $e){
		            die("Connection failed. Try again");
		        }
		}
		    
		public function getConn(){
		        return $this->conn;
		}
		    
		/**
		* Fecha a conexao com o DB
		**/
		public function __destruct(){
		        $this->conn = null;
		}
		
		
	}


?>
