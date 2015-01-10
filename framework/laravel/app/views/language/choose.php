<h2>Choose a language</h2>
<?php echo Form::open() ?>
<?php echo Form::select('language', [ 'en' => 'English', 'es' => 'Spanish', 'de' => 'German']) ?>
<?php echo Form::submit() ?>
<?php echo Form::close() ?>