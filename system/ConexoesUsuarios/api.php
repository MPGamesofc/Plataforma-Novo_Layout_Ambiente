<?php
header("Access-Control-Allow-Origin: *");
require_once("jogadores.class.php");
$jogadores = new Jogadores();

$jogadores->update(4);

