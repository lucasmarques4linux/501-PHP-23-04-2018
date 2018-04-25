<?php

    require_once 'init.php';
    if(!empty($_GET['q'])) {
        if( $_GET['q'] == 'mysql'){
            putenv("DRIVER=mysql");
        }
        if ($_GET['q'] == 'pgsql') {
            putenv("DRIVER=pgsql");
        }
    }
    else {
        putenv("DRIVER=mysql"); 
    }

    if(!empty($_POST['base'])) {
        if( $_POST['base'] == 'mysql'){
            putenv("DRIVER=mysql");
        }
        if ($_POST['base'] == 'pgsql') {
            putenv("DRIVER=pgsql");
        }
    }

    require_once 'conexao.php';
    $pdo = Conexao::getInstance();
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
<h1>System 4Linux</h1>

<form method="POST" action="index.php">
<select name="base">
    <option value="mysql" <?php if(getenv('DRIVER')=='mysql') echo 'selected'; ?> >MySQL</option>
    <option value="pgsql" <?php if(getenv('DRIVER')=='pgsql') echo 'selected'; ?> >PostgreSQL</option>
</select>
    <input type="submit" value="Select" class="btn btn-success">
</form>

<hr>
<h2>New user</h2>
<form method="POST" action="actions/createUser.php">
    <p>Name:<input type="text" name="name"></p>
    <p>Email:<input type="email" name="email"></p>
    <p>Pass:<input type="password" name="pass"></p>
    <input type="hidden" name="driver" value=="<?php print getenv('DRIVER'); ?>">
    <p><input type="submit" value="Save" class="btn btn-success"></p>
</form>

<hr>

<table border="1" class="table">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
 

    <?php
    $query = "SELECT * FROM users";

    $stmt = $pdo->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
    $driver = getenv('DRIVER');

    foreach($users as $user){
        echo "<tr>";
            echo "<td>$user->id</td>";
            echo "<td>$user->name</td>";
            echo "<td>$user->email</td>";
            echo "<td>
                 <a href='actions/updateUser/?id={$user->id}' class='btn btn-success'> Edit</a>
                  <form method='POST' action='actions/deleteUser.php'>
                      <input type='hidden' name='id' value='{$user->id}'>
                      <input type='hidden' name='driver' value='{$driver}'>
                      <input type='submit' value='Delete' class='btn btn-danger'>
                  </form> 
                </td>";
        echo "</tr>";
    }

    ?>

</table>

</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
