<?php 
return array(
	"base_url"	=>	"http://myapp.dev/tw_auth/auth",
	"providers"	=>	array(
		"Twitter"	=>	array(
			"enabled"	=>	TRUE,
			"keys"		=>	array(
				"key"		=>	$_ENV['TWITTER_APP_ID'],
				"secret"	=>	$_ENV['TWITTER_APP_SECRET']
				)
			)
		)
	);