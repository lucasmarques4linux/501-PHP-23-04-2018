<h2>List of Users</h2>
<a href="?r=home">Go Back</a>
<?php foreach ($users as $user): ?>
	<p><?= $user->getName() ?> - <?= $user->getEmail() ?></p>
<?php endforeach ?>