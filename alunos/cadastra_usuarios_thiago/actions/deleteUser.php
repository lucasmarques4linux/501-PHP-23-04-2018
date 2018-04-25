<?php

require_once '../init.php';


if (isset($_POST['id']) && isset($_POST['driver'])) {

    $driver = str_replace('"', "", $_POST['driver']);
    $driver = str_replace('=', "", $driver);
    putenv("DRIVER=$driver");
    require_once '../conexao.php';

    $pdo = Conexao::getInstance();
    $sql = "DELETE FROM users WHERE id={$_POST['id']}";

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        die($e->getMessage());
    }
    header("location: localhost/?q=$driver");
}

