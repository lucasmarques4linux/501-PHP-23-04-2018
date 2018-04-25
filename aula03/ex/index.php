<form method="POST" action="">
	<select name="base">
		<option value="mysql">MySQL</option>
		<option value="postgres">PostgreSQL</option>
	</select>
	<input type="submit" value="Select">
</form>

<form method="POST" action="createUser.php">
	<p>Name:<input type="text" name="name"></p>
	<p>Email:<input type="email" name="email"></p>
	<p>Pass:<input type="password" name="pass"></p>
	<p><input type="submit" value="Save"></p>
</form>

<table border="1">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Lucas</td>
		<td>lucasmarques73@hotmail.com</td>
		<td> Editar || Excluir</td>
	</tr>
</table>