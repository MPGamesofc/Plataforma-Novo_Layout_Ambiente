<?php
header("Access-Control-Allow-Origin: *");
require_once("ranking.class.php");
$ranking = new Ranking();

if($_POST){
	$ranking->add();
}


$username=trim($_GET['username']); // tirar espaços com TRIM
$senha=trim($_GET['senha']); // tirar espaços com TRIM





if($_GET['lista'] == "sim"){

	$lista = $ranking->getList();
	foreach ($lista as $show) {
		if($show->username==$username){ // trazer o nome de usuario que corresponda
		    echo '1';
		} else{
		    echo '';
		}
		
		
        if (password_verify($senha, $show->password)) {  // trazer a senha de usuario que corresponda
            $senha = $show->password;
            echo "1";
            die();
        } else {
            echo '';
        } 
        
		
	} //
} // 