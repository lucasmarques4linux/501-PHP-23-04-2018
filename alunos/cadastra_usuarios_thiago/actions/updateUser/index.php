<?php

require_once '../../init.php';


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['driver'])) {

    $driver = str_replace('"', "", $_POST['driver']);
    $driver = str_replace('=', "", $driver);
    putenv("DRIVER=$driver");
    require_once '../conexao.php';

    $pdo = Conexao::getInstance();
    $sql = "UPDATE users SET name=:name, email=:email, pass=:pass WHERE id = :id";

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name',$_POST['name']);
        $stmt->bindValue(':email',$_POST['email']);
        $stmt->bindValue(':pass',$_POST['pass']);
        $stmt->bindValue(':id',$_POST['id']);
        $stmt->execute();
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        die($e->getMessage());
    }
    header("location: localhost/?q=$driver");
}

if(isset($_GET['id'])){
die('ok');
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
<h1>Update</h1>

<hr>
<form method="POST" action="index.php">
    <p>Name:<input type="text" name="name"></p>
    <p>Email:<input type="email" name="email"></p>
    <p>Pass:<input type="password" name="pass"></p>
    <input type="hidden" name="driver" value=="<?php print getenv('DRIVER'); ?>">
    <input type="hidden" name="driver" value=="<?php print $id; ?>">
    <p><input type="submit" value="Update" class="btn btn-success"></p>
</form>

<hr>

</div>
</html>
