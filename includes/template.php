<?php

/**
 * Tries to load a template file with the supplied name
 */
function getTemplate($template, array $data = array())
{
	   // Takes the first level of the data array and generates variables
	   // from the keynames (index).
    extract($data);

  	// Capture all templating output using a buffer.
  	ob_start();
  
  	// Get the template (which will also apply the data)
  	require 'templates/' . $template . '.php';
  
  	// End and capture buffer.
  	$htmlString = ob_get_clean();
  
  	// Return the captured buffer.
  	return $htmlString;
}