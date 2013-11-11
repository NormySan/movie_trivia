<?php

/**
 * Gets the current route and returns it as a string
 */
function getRoute()
{
	// Get the requested uri from the server exluding the domain name.
	$uri = strtok($_SERVER['REQUEST_URI'], '?');

	// Remove the site path from the uri so we only get the segments
	// that we actually want.
	$uri = str_replace(SITE_PATH, '', $uri);

	return $uri;
}

/**
 * Get the current route and returns it as an array
 */
function getRouteArray()
{
	// Get the current route as a string from the getRoute function.
	$route = getRoute();

	// Divide the route into separate parts divided by the directory seperator
	// as the delimiter. The DIRECTORY_SEPARATOR is the same as typing '/' or
	// '\' depending on the current filesystem.
	$route = explode(DIRECTORY_SEPARATOR, $route);

	return $route;
}

/**
 * Gets a specific segment from the current route staring from 0
 */
function getRouteSegment(int $number)
{
	// Get the current route as an array
	$route = getRouteArray();

	// If the route segment exists we return the segment if not the if statement
	// will be ignored and false will be returned instead.
	if (isset($route[$number]))
	{
		return $route[$number];
	}

	return false;
}

/**
 * Checks if the current route exists in our application routes array
 */
function checkRoutes($appRoutes)
{
	// Get the current route
	$route = getRoute();

	// Loops trough each application route and compares it against the current
	// route. If a match is found we will return true.
	foreach ($appRoutes as $index => $appRoute)
	{	
		if ($index == $route)
		{
			return $route;
		}
	}

	return false;
}