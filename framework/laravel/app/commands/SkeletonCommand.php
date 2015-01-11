<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem as File;

class SkeletonCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'skeleton:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates an HTML5 skeleton';

	protected $file;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->file = new File();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$view = $this->argument('view');
		$file_name = 'app/views/' . $view;
		$ext = ($this->option('blade')) ? '.blade.php' : '.php';
		$template = '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
			
		</body>
		</html>
		';
		if (!$this->file->exists($file_name)) {
			$this->info('HTML5 skeleton created!');
			return $this->file->put($file_name . $ext, $template) !== false;
		} else {
			$this->info('HTML5 skeleton creaed!');
			return $this->file->put($file_name . '-' . time() . $ext, $template) !== false;
		}
		
		$this->error('There was a problem creating your HTML5 skeleton');
		return false;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('view', InputArgument::REQUIRED, 'The name of the view.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('blade', null, InputOption::VALUE_OPTIONAL, 'Use Blade Templating?.', false),
		);
	}

}
