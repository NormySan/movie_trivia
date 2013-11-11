<?php

// Start the session before doing anything else
session_start();

// Turn on error reporting so that we know if something went wrong
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Include the includes file, this file will then include everything else that we need
// to get up and running.
include 'includes.php';

// Application routes
$routes = array(
	'/' => 'HomeController'
);

// Check if the current route matches any of our application routes. If it does we
// try to execute the function associated with the current route.
if ($route = checkRoutes($appRoutes))
{
	// This will call the function associated with the current route
	$data['content'] = call_user_func($appRoutes[$route]);
}
else
{
	// Redirect the user to the default route if no other route matches
	// header('Location: ' . SITE_DEFAULT_ROUTE);
	redirect(SITE_DEFAULT_ROUTE);
}

// Get main template file
$template = getTemplate('template', $data);

// Set the response to be the current main template file
response($template);