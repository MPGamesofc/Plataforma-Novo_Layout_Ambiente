<?php
 
/*iremos declarar as variaveis que recebemos pelo método post
 
lembra lá na explicação do metodo post o que deveria ser feito? então, os dados
 
serão pegos por aqui e transformados em comunicação entre server e cliente para gerar
 
o email do cara e te enviar*/
 
$nome=$_POST[nome];//aqui pega os dados que foram preenchidos la no formulário com o ID NOME
$email=$_POST[email];//aqui a mesma coisa, mas com o email
$assunto=$_POST[assunto];//aqui a mesma coisa, mas com o assunto
$mensagem=$_POST[mensagem];//aqui a mesma coisa, mas com o assunto
$usuario=$_POST[usuarioemail]; 
$redes=$_POST[redesocial]; 
$linkjogo=$_POST[linkjogo];
$numwhats=$_POST[numwhats];
$outroslinks=$_POST[outroslinks];
 
//agora vamos enviar todos esses dados usando a função mail que é do PHP
mail("developersmpgames@gmail.com","Desenvolvedor Parceiro","
Nome: $nome
Email: $email
Assunto: Desenvolvedor Parceiro
Número de Whatsapp: $numwhats
Mensagem: $mensagem","FROM:$nome<$email>");

mail("$email","MPGames Online | Recibo","
Olá, $nome! Agradecemos pelo seu interesse e em breve, em torno de 48h entraremos em contato!","FROM:MPGames Online<developersmpgames@gmail.com>");
 
/*Ele diz assim pro código: "Envia um email para meuemail@meudominio.com.br e que esse email tenha os dados que
foram pegos em ASSUNTO, NOME, EMAIL, ASSUNTO e MENSAGEM, eles foram pegos com o MÉTODO POST e em FROM vai conter
os dados de quem enviou o email, ou seja, la na caixa de entrada do teu e-mail vai ter isso. :)*/




// do something here



echo "sua mensagem foi enviada com sucesso!"; //aí mostramos no navegador da pessoa que enviou o email uma mensagem de sucesso
 
 header("Location: https://mpgames.online/");
 
?>