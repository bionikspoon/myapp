<?php
	return array(
		"base_url"	=> "http://myapp.dev/",
		"providers"	=> array(
			"OpenID"	=> array(
				"enabled"	=> true,
				),
			"Facebook"	=> array(
				"enabled"	=> true,
				"keys"		=> array(
					"id"		=> "APP_ID",
					"secret"	=> "APP_SECRET"),
				"scope"		=> "email",
				),
			"Twitter"	=> array(
				"enabled"	=> true,
				"keys"		=> array(
					"key"		=> "CONSUMER_KEY",
					"secret"	=> "CONSUMER_SECRET",
					),
				),
			"LinkedIn"	= array(
				"enabled"	=> true,
				"keys"		=> array(
					"key"		=> "APP_KEY",
					"secret"	=> "APP_SECRET",
					),
				),
			)
		);
?>