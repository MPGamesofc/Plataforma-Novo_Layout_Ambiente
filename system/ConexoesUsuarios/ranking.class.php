<?php 
header("Access-Control-Allow-Origin: *");
require_once('polargames.class.php');

class Ranking extends PolarGames{
	public function __construct(){
		parent::__construct('users');
	}
}