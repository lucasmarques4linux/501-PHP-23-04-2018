<?php

require_once '../init.php';


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['driver'])) {

    $driver = str_replace('"', "", $_POST['driver']);
    $driver = str_replace('=', "", $driver);
    putenv("DRIVER=$driver");
    require_once '../conexao.php';

    $pdo = Conexao::getInstance();
    $sql = "INSERT INTO users (name,email,pass) VALUES (:name,:email,:pass)";

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name',$_POST['name']);
        $stmt->bindValue(':email',$_POST['email']);
        $stmt->bindValue(':pass',$_POST['pass']);
        $stmt->execute();
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        die($e->getMessage());
    }
    header("location: localhost/?q=$driver");
}

