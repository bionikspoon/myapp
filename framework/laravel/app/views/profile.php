<?= Session::get('notify') ? "<p style='color:green'>" . Session::get('notify') . "</p>" : "" ?>
<h1>Welcome <?= $user->name ?></h1>
<p>Your email: <?= $user->email ?></p>
<p>Your account was created on: <?= $user->created_at ?></p>
<p><a href="<?= URL::to('profile-edit')?>">Edit your information</a></p>