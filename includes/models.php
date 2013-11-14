<?php
/**
 * Movie trivia database functions (models)
 */

// Returns a category specified by its identifier.
function getCategory($id)
{
	// Tell the function that we want to use the $db global.
	global $db;

	// Create an empty array so that we always return something even if there
	// was no results from the query.
	$category = array();

	// Prepare the query with placeholders
	$statement = $db->prepare('SELECT * FROM categories WHERE id = :id');

	// Execute the prepared statement and set the id value for the placeholder.
	$result = $db->execute(array('id' => $id));

	// We only expect one result so no need to do a while loop, instead we just
	// assign just do a fetch and assign the results to the $category variable.
	$category = $result->fetch(PDO::FETCH_ASSOC);

	return $category;
}

// Returns all categories
function getCategories()
{
	global $db;

	$categories = array();

	$results = $db->query('SELECT * FROM categories');

	while ($row = $results->fetch(PDO::FETCH_ASSOC))
	{
		$categories[] = $row;
	}

	return $categories;
}

function saveCategory($menuAddName)
{
	global $db;

	$statement = $db->prepare("INSERT INTO categories(title) 
							   VALUES(:name)");							 
	
	$statement->execute(array('name'=>$menuAddName));
}

// Returns all questions with answers
function getQuestions()
{
	global $db;

	$questions = array();

	$results = $db->query('SELECT title FROM questions, answers');

	while ($row = $results->fetch(PDO::FETCH_ASSOC))
	{
		$questions[] = $row;
	}

	return $questions;


}

function getQuestion($id){
	GLOBAL $db;

		$statement = $db->query('SELECT q.title, ans.title FROM questions AS q'.
								'INNER JOIN questions_answers qa ON qa.id = q.id
								 INNER JOIN answers ans ON ans.id = qa.id
								 WHERE q.id = $id');

		$statement->execute();
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

