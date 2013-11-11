<?php

// Include the includes file, this file will then include everything else that we need
// to get up and running.
include 'includes.php';

// Application routes
$routes = array(
	'/' => 'HomeController'
);

// Get the current route
$currentRoute = getRoute();

// Loop trough each route in the routes array
foreach ($routes as $route => $controller)
{
	// Check if the route matches the current route
	if ($currentRoute == $route)
	{
		call_user_func($controller);
	}
}