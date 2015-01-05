<form action="" method="post">
	<input type="hidden" name="_method" value="put">
	<input type="hidden" name="user_id" value="<?=$user->id ?>">
	Username:<br>
	<input name="username" value="<?=$user->username ?>">
	<br>Email<br>
	<input name="email" value="<?=$user->email?>">
	<br>
	<input type="submit">
</form>