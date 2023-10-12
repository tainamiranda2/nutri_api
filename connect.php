<?php

$host="localhost";
$user="root";
$pass="";
$dbname="nutris";
$port="3306";

//conexao coma port

$conn=new PDO("mysql:host=$host;port=$port;dbname=". $dbname, $user, $pass);


?>