<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style> 
		table, th, td {
			border: 1px solid #444
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Email</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user): ?>
			<tr>
				<td><?=$user->id?></td>
				<td><?=$user->username?></td>
				<td><?=$user->email?></td>
				<td><a href="users/record/<?=$user->id?>">Edit</a>
				<form action="users/record" method="post">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="user_id" value="<?=$user->id?>">
					<input type="submit" value="Delete">
				</form></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<a href="users/create">Add New User</a>
</body>
</html>