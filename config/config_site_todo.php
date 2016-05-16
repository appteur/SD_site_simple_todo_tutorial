<?php

/**
	This file is not tracked in your version control. This file should be manually created on your testing
	server and also on your live site. These configuration settings apply on a server scale, so your test
	server will have settings configured for your testing environment, and your live server will have settings
	configured for your live environment.

	!!!!! NOTE !!!!!
	Places in the script below that are enclosed by < and > tags will need to be replaced by you. 

	If you change the root directory name when you copy it into your test server you will need to change <www_todo> to
	whatever you changed your root document directory name to.

	You will need to update your database login credentials once we get into storing data into a database.
*/

// your site directory root name
define('SITE_DIR_NAME','<www_todo>');

// on a testing server set this to true, on a live server set this to false
define('IS_DEBUG', true);

// get the server document root
$rootPath = $_SERVER["DOCUMENT_ROOT"];

/**
	You might not need this configuration. Here's what it does.
	If you have a hosting plan that allows you to host multiple sites on one host, then your directory hierarchy might
	look something like this:
	- www - (root directory)
		- my-site-one-root
		- my-site-two-root
		- my-site-etc...

	If this is the case then your $_SERVER["DOCUMENT_ROOT"] for my-site-one-root might show your document root as being the 
	'www' directory instead of 'my-site-one-root' directory.
	This checks to see if your defined root directory (specified as SITE_DIR_NAME above) is part of the document root so that all of
	your include paths resolve correctly. If it's not then it will correct the root path to include your site subdirectory.
*/
if (!defined('IS_DEBUG') && strpos($rootPath, SITE_DIR_NAME) === false)
{
	$rootPath = $rootPath . '/'.SITE_DIR_NAME;
}

/** 
	Define DOCUMENT_ROOT constant as our corrected path to the site document root.
	we will be using 'DOCUMENT_ROOT' to create relative paths based on our root directory in later scripts.
*/
define('DOCUMENT_ROOT', $rootPath);

// database access credentials
define('DB_HOST', "<my database host url>");
define('DB_NAME', "<my database name>");
define('DB_USER', "<my database host username>");
define('DB_PASS', "<my database host password>");

/** 
	This is a whitelist of applications that are allowed to access the api.
	You will be passing this value in with every request to the api, requests without this value will be denied access.

	- KEY:	 	The key in the array can be any value you choose.
	- VALUE:	The value in the array should be a random hash value.
*/
$applications = array(
		'APP_Client_973984985'	=> "<IE589GleRE38askdf7d8g3h1j5j6y42bnny>", 
	);

/** 
	This is your hash key for user authentication for this site. 
	It should be a random hash value.

	We are using json web tokens, and this is the key for generating your hashed token.
*/
$jwt = '<ou99jtjhimjaadiog8aekjajocalg9aloga9ap8e>';

?>