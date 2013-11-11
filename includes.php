<?php

// An array of files we wish to include
$includes = array('config', 'controllers', 'db', 'helpers', 'models', 'router', 'template');

// Include each file in the includes array
foreach ($includes as $include)
{
	require 'includes/' . $include . '.php';
}