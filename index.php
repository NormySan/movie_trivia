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
	'/' 						=> 'HomeController',
	'/admin' 					=> 'AdminController',
	'/admin/categories' 		=> 'AdminCategoriesController',
	'/admin/categories/remove'	=> 'AdminRemoveCategoryController',
	'/admin/questions'			=> 'AdminQuestionsController',
	'/admin/questions/remove'	=> 'AdminRemoveQuestionController',
	'/admin/questions/update'	=> 'AdminUpdateQuestionController',
	'/questions' 				=> 'QuestionsController',
	'/categories' 				=> 'CategoriesController',
	'/login'					=> 'LoginController'

);

// Check if the current route matches any of our application routes. If it does we
// try to execute the function associated with the current route.
if ($route = checkRoutes($routes))
{
	// This will call the function associated with the current route
	$data['content'] = call_user_func($routes[$route]);
}
else
{
	// Redirect the user to the default route if no other route matches
	redirect('');
}

// Get main template file
$template = getTemplate('template', $data);

// Set the response to be the current main template file
response($template);
