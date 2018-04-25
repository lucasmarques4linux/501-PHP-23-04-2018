<?php 
	
	require 'actions/users.php';
	$db = ($_GET['base']) ?? 'mysql';
	// $db = (isset($_GET['base'])) ? $_GET['base'] : 'mysql';
	// if(isset($_GET['base'])){ $db = $_GET['base']} else {$db ='mysql'};
	$users = Users::listAll($db);
	$dbs = ['postgres' => 'PostgreSQL','mysql'=> 'MySQL'];

	if (!empty($_POST)) {
		if (isset($_POST['del'])) {
			$id = $_POST['id'];
			Users::delete($db,$id);	
		} else {
			Users::save($db,$_POST);	
		}		
		$users = Users::listAll($db);
	}

	if (isset($_GET['id'])) {
		$id = ($_GET['id']) ?? null;
		$user = Users::list($db,$id);
	} else {
		$user = ['name' => null,'email' => null, 'pass' => null,'id' => null];
	}

 ?>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div style="margin: 25px 100px 25px 100px">
 <form>
 <div class="form-group">
 	<label>Select Database</label>
	<select name="base" class="form-control form-control-sm">
	<?php foreach ($dbs as $key => $value): ?>

		<?php $selected = ($key == $db) ? 'selected' : null; ?>

		<option value="<?= $key ?>" <?=$selected ?>><?= $value ?></option>
	<?php endforeach; ?>
	</select>
	<div class="form-group" style="margin-top: 5px;">
		<input type="submit" value="Select" class="btn btn-sm btn-primary">
	</div>
	</div>
</form>

<div class="row">
<div class="col">
<form method="POST" action="">
	<input type="hidden" name="id" value="<?= $user['id'] ?>">
	<div class="form-group">
	<label>Name:</label>
	<input type="text" name="name" class="form-control form-control-sm" value="<?= $user['name'] ?>">	
	</div>
	<div class="form-group">
	<label>Email:</label>
	<input type="email" name="email" class="form-control form-control-sm" value="<?= $user['email'] ?>">
	</div>
	<?php if (!isset($id)): ?>
		<div>
		<label>Pass:</label>
		<input type="password" name="pass" class="form-control form-control-sm" value="<?= $user['pass'] ?>">
		</div>	
	<?php endif ?>	
	<div class="form-group" style="margin-top: 5px;">
		<input type="submit" class="btn btn-sm btn-success" value="Save">
	</div>
</form>
</div>
<div class="col">
<table class="table">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	<?php if (isset($users)): ?>	
	<?php foreach ($users as $user): ?>
			<tr>
				<td><?=$user['id'] ?></td>
				<td><?=$user['name'] ?></td>
				<td><?=$user['email'] ?></td>
				<td>
				<a class="btn btn-sm btn-info" href="?base=<?= $db ?>&id=<?=$user['id'] ?>"> Edit</a>
				<form method="POST" action="#">
					<input type="hidden" name="id" value="<?=$user['id'] ?>">
					<input type="hidden" name="del" value="del">
					<input type="submit" class="btn btn-sm btn-danger" value="Delete">
				</form>
				</td>
			</tr>
	<?php endforeach ?>
	<?php endif ?>
</table>
</div>
</div>
</div>
</body>