<?php

// An array of files we wish to include
$includes = array();

// Include each file in the includes array
foreach ($includes as $include)
{
	require 'includes/' . $include . '.php';
}