<?php 


// Data Source Name, User, Password
// Mysql
// "mysql:host=localhost;dbname=aula",
// "lucas",
// "@da4linux";
// Postgres
// "pgsql:host=localhost;dbname=aula",
// "lucas",
// "123";
$dbMysql 	= new PDO("mysql:host=localhost;dbname=aula","lucas","@da4linux");

$dbMysql->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$dbPostgres = new PDO("pgsql:host=localhost;dbname=aula","lucas","123");

$dbPostgres->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// var_dump($dbMysql);
// var_dump($dbPostgres);