<?php

class Conexao
{
    private static $instance;

    private $driver;
    private $host;
    private $db;
    private $user;
    private $pass;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance(){
        $driver = getenv('DRIVER');
        $host   = getenv('HOST');
        $db     = getenv('DB');
        $user   = getenv('USER');
        $pass   = getenv('PASS');
    
        if(!self::$instance){
            try {
                self::$instance = new PDO("{$driver}:host={$host};dbname={$db}",$user,$pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            } 
        }
            return self::$instance;
    }
}
// teste

/*
putenv("DRIVER=mysql");
putenv("HOST=localhost");
putenv("DB=aula");
putenv("USER=master");
putenv("PASS=master");


$db = Conexao::getInstance();
var_dump($db);

 */
