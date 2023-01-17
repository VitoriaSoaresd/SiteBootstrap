<?php

$host="localhost";
$user="root";
$pass="";
$dbname="academia1";
$port=3306;

try{
    $conn=new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
        //echo "Conexão com o Banco de Dados realizado com sucesso!";
} catch(PDOException $erro) {
    echo "Erro: Conexão com o Banco de Dados não realizada.".$erro;
}

?>