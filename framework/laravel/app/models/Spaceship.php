<?php

class Spaceship extends \Eloquent {
	protected $fillable = [];
    protected $table = 'spaceships';
    public function fire($job, $data)
    {
        Log::info('We can put this in the datase: ' . print_r($data, true));

        $job->delete();
    }
}