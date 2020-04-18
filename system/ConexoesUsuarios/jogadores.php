<?php
header("Access-Control-Allow-Origin: *");
require_once("jogadores.class.php");
$jogadores = new Jogadores();

$jogadores->update(4);

$email = "CEO"; // Nome de usuario
$senha = "rofilu1408"; // Senha que virá pelo usuario



$verifica = $jogadores->verificajogador($email, $senha);



var_dump($verifica);

if($verifica){
   die("1");
} else{
    die("0");
}



$HasharSenha = $verifica->password;




$hash = $HasharSenha;

if (password_verify($senha, $hash)) {
    return 1;
} else {
   return 0;
}

