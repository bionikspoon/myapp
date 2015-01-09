<?php foreach($shows as $show): ?>
	<?=Form::open(['url' => 'show/' . $show->id, 'method' => 'DELETE'])?>
	<?=Form::label('name', 'Show Name: ') . $show->name ?>
	<?=Form::submit('Delete')?>
	<?=Form::close()?>
<?php endforeach; ?>