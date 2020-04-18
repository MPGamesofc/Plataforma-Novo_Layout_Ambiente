<?php 
header("Access-Control-Allow-Origin: *");
require_once('polargames.class.php');

class Jogadores extends PolarGames{
	public function __construct(){
		parent::__construct('users');
	}
	
	public function verificajogador($email, $senha){
	    return $this->query("SELECT * FROM $this->tabela WHERE username='$email' ")->Fetch();
	}
	
}
