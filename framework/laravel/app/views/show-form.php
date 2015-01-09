<?=Form::open(['url' => 'show/' . $id, 'method' => $method])?>
<?=Form::label('name', 'Show Name ') . Form::text('name', $name)?>
<br>
<?=Form::label('rating', 'Show rating: ') . Form::text('rating', $rating)?>
<br>
<?=Form::submit()?>
<?=Form::close()?>