<?php

/**
 * Returns an url formated with the proper site path
 */
function url($string)
{
	return SITE_PATH.'/'.$string;
}

/**
 * Redirects the user to the specified location
 */
function redirect($location)
{
	return header('Location: ' . url($location));
}

/**
 * Takes the input string and renders it as the response
 */
function response($string)
{
	// Make sure the input is a string
	$string = (string) $string;

	echo $string;
	exit();
}