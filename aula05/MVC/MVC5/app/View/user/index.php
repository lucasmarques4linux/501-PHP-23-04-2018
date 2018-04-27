<div class="row">
<h2 class="col">List of Users</h2>
<div class="col">
	<div class="float-right">
		<a href="?r=user/new" class="btn btn-sm btn-primary">New User</a>
	</div>
</div>
</div>
<table class="table">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	<?php if (isset($users)): ?>	
	<?php foreach ($users as $user): ?>
			<tr>
				<td><?=$user->getName() ?></td>
				<td><?=$user->getEmail() ?></td>
				<td>
				<a class="btn btn-sm btn-info" href="?r=user/edit/<?=$user->getId() ?>"> Edit</a>
				</td>
			</tr>
	<?php endforeach ?>
	<?php endif ?>
</table>
<div class="d-flex justify-content-center">
	<a href="?r=home" class="btn btn-sm btn-warning">Go Back</a>
</div>