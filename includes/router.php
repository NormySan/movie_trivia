<?php

/**
 * Gets the current route, removes the site path and the query string and returns
 * only the relevant part of the route.
 */
function getRoute()
{
	// Get the current URI segment
	$uri = $_SERVER['REQUEST_URI'];

	return $uri;
}

/**
 * Gets the specific route segment and returns it if it exists, otherwise
 * it returns false.
 */
function getRouteSegment($num)
{
	// Get the current route
	$route = getRoute();

	// Explode the route segments into an array, separated by the directory
	// separator "/".
	$route = explode('/', $route);

	// If the route segment exists in the array lets return it.
	if (isset($route[$num]))
	{
		return $route[$num];
	}

	return false;
}