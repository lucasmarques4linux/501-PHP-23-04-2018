<h1>List of Users</h1>
<?php foreach ($users as $user): ?>
	<p><?= $user->getName() ?></p>
<?php endforeach ?>