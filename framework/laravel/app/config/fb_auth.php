<?php 
return array(
	"base_url"	=> "http://myapp.dev/fbauth/auth",
	"providers"	=> array(
		"Facebook"	=> array(
			"enabled"	=> TRUE,
			"keys"		=> array(
				"id"		=> $_ENV['FB_APP_ID'],
				"secret"	=> $_ENV['FB_APP_SECRET']
				),
			"scope" => "email"
			)
		)
	);