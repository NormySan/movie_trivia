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

//Saves a question to database
function saveCategory($menuAddName)
{
	global $db;

	$statement = $db->prepare("INSERT INTO categories(title) 
							   VALUES(:name)");							 
	
	$statement->execute(array('name'=>$menuAddName));
}
//saves a Question To Database
function saveQuestion($data)
{
	// Tell the function that we want to use the $db global.	
	global $db;

	//Prepare to insert the question into questions with the categoryId
	$statement = $db->prepare("INSERT INTO questions(category_id,title) 
							   VALUES(:category_id,:title)");

	//Insert it
	$statement->execute(array('category_id'=>$data['addToCategory'],
							  'title'=> $data['question']));
	
	//gets the current row Id for the question so can give the answers below something to belong to.
	$questionId=$db->lastInsertId();

	//Prepare the the insertion of answer 1
	$statement = $db->prepare("INSERT INTO answers(id,title,correct) 
							   VALUES(:id,:title,correct)");
	
	//Insert Answer1
	$statement->execute(array('id' => $questionId,
							  'title'=> $data['answer1'],
							  'correct' => $data['correct']));
	
	//Prepare the the insertion of answer 2
	$statement = $db->prepare("INSERT INTO answers(id,title,correct) 
							   VALUES(:id,:title,correct)");
	
	//Insert Answer2	
	$statement->execute(array('id' => $questionId,
							  'title'=> $data['answer2'],
							  'correct' => $data['correct']));
	
	//Prepare the the insertion of answer 3
	$statement = $db->prepare("INSERT INTO answers(id,title,correct) 
							   VALUES(:id,:title,correct)");
	
	//Insert Answer3
	$statement->execute(array('id' => $questionId,
							  'title'=> $data['answer3'],
							  'correct' => $data['correct']));		
	//Prepare the the insertion of answer 4
	$statement = $db->prepare("INSERT INTO answers(id,title,correct) 
							   VALUES(:id,:title,correct)");
	//Insert Answer4
	$statement->execute(array('id' => $questionId,
							  'title'=> $data['answer4'],
							  'correct' => $data['correct']));
}

// Returns all questions with answers
function getQuestions($category = null)
{
	global $db;

	// Create an empty questions array so that we always return an empty
	// array even if there was no data fetched from the database.
	$questions = array();

	// If the category variable is null we only perform a simple query, if not
	// we perform a slightly more complex query prepared statement.
	if (is_null($category))
	{
		$statement = $db->query('SELECT * FROM questions');
	}
	else
	{
		// Lets make sure the category is an integer.
		$category = (int) $category;

		// Prepare the db query statement.
		$statement = $db->prepare('SELECT * FROM questions WHERE category_id = :category_id');

		// Execute the prepared statement and add the placeholder value
		$statement->execute(array('category_id' => $category));
	}

	// Do a while loop to fetch each resulting row in the query.
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		// Push each result row into the questions array.
		$questions[] = $row;
	}

	// Get answers for the questions
	$questions = getQuestionAnswers($questions);

	return $questions;
}

// Appends answers to the supplied questions
function getQuestionAnswers($questions = array())
{
	global $db;

	// Empty array for andswers
	$answers = array();

	// Empty array for ids
	$ids = array();

	// Loop over the questions and get their ids
	foreach ($questions as $question)
	{
		// Push each question id into the ids array
		$ids[] = $question['id'];
	}

	// Concatenate all questions ids into a string of ids to be used in the query
	$ids = implode(',', $ids);



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

// Returns a single question based on its id.
function getQuestion($id) {
	global $db;

	// Make sure the entered value is an integer.
	$id = (int) $id;

	// Empty array for the question.
	$question = array();

	// Prepare the db query.
	$statement = $db->prepare('SELECT * FROM questions WHERE id = :id');

	// Execute query statement with the supplied id.
	$statement->execute(array('id' => $id));

	// Since we only expect to get one result we don't loop over the results.
	$question[] = $statement->fetch(PDO::FETCH_ASSOC);

	// Gett answers for the questions
	$question = getQuestionAnswers($question);

	/* Part of the old query.
	$statement = $db->query("SELECT q.title, ans.title FROM questions AS q
							 INNER JOIN questions_answers qa ON qa.id = q.id
							 INNER JOIN answers ans ON ans.id = qa.id
							 WHERE q.id = $id");

	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	*/

	// We should only have one result in the array so we only return the first
	// question in the array.
	return $question[0];
}
