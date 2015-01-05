<?php
return array(
	"base_url"	=> "http://myapp.dev/li_auth/auth",
	"providers"	=> array (
		"LinkedIn"	=> array (
			"enabled"	=> true,
			"keys"		=> array (
				"key"		=> $_ENV['LI_APP_ID'],
				"secret"	=> $_ENV['LI_APP_SECRET']
				)
			)
		)
	);