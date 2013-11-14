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
function getQuestions($options = array())
{
	global $db;

	// Create an empty questions array so that we always return an empty
	// array even if there was no data fetched from the database.
	$questions = array();

	// Empty array for andswers
	$answers = array();

	// Empty array for ids
	$ids = array();

	// The database query to get the questions.
	$results = $db->query('SELECT * FROM questions');

	// Do a while loop to fetch each resulting row in the query.
	while ($row = $results->fetch(PDO::FETCH_ASSOC))
	{
		// Push each result row into the questions array.
		$questions[] = $row;
	}

	// Loop over the questions and get their ids
	foreach ($questions as $question)
	{
		// Push each question id into the ids array
		$ids[] = $question['id'];
	}

	// Concatenate all questions ids into a string of ids to be used in the query
	$ids = implode(',', $ids);

	// The database query to fetch answers.
	$statement = $db->query("SELECT * FROM questions_answers qa
						   	 LEFT JOIN answers a ON a.id = qa.answer_id
						   	 WHERE qa.question_id IN ($ids)");

	// Get each answer and push it onto the answers array
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$answers[] = $row;
	}

	// Push each answer into the questions array
	foreach ($questions as $index => $question)
	{
		foreach ($answers as $answer)
		{
			if ($answer['question_id'] == $question['id'])
			{
				$questions[$index]['answers'][] = $answer;
			}
		}
	}

	return $questions;
}