<?php

/**
 * Gets the current route, removes the site path and the query string and returns
 * only the relevant part of the route.
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