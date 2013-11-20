<?php
/**
 * Movie trivia database functions (models)
 */

//Returns 10 random questions and answers.
//Please test.

function getRandQuestions($category = null)

{
	global $db;

	// Create an empty questions array so that we always return an empty
	// array even if there was no data fetched from the database.
	$randQuestions = array();

	// If the category variable is null we only perform a simple query, if not
	// we perform a slightly more complex query prepared statement.
	if (is_null($category))
	{
		$statement = $db->prepare('SELECT * FROM questions ORDER BY RAND() LIMIT 10');

 		$statement->execute(array('category_id' => $category));
	}
	else
	{
		// Lets make sure the category is an integer.
		$category = (int) $category;

		// Prepare the db query statement.
		$statement = $db->prepare('SELECT * FROM questions WHERE category_id = :category_id ORDER BY RAND() LIMIT 10');

		// Execute the prepared statement and add the placeholder value
		$statement->execute(array('category_id' => $category));
	}
	
	
	// Do a while loop to fetch each resulting row in the query.
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		// Push each result row into the questions array.
		$randQuestions[] = $row;
	}

	// Get answers for the questions
	$randQuestions = getQuestionAnswers($randQuestions);

	return $randQuestions;
}



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

	$results = $db->query('SELECT * FROM categories ORDER BY title ASC');

	while ($row = $results->fetch(PDO::FETCH_ASSOC))
	{
		$categories[] = $row;
	}

	return $categories;
}

// Saves a category to the database
function saveCategory($data)
{
	global $db;

	$statement = $db->prepare('INSERT INTO categories(title) VALUES (:title)');							 
	
	$statement->execute(array('title' => $data['title']));
}

// Removes the specified category.
function removeCategory($id)
{
	global $db;

	// Prepare the query to fetch the category.
	$statement = $db->prepare('SELECT * FROM categories WHERE id = :id');

	$statement->execute(array('id' => $id));

	// Fetch the resulting category.
	$category = $statement->fetch(PDO::FETCH_ASSOC);

	if (empty($category)) return false;

	// Remove the category
	$statement = $db->prepare('DELETE FROM categories WHERE id = :id');

	$statement->execute(array('id' => $id));
}

//saves a Question To Database
function saveQuestionOld($data)
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

function updateQuestionCategoryAnswers($data)
{
	global $db;

	// First lets update the Question title and category.
	$statement = $db->prepare('UPDATE questions 
							   SET title = :title,
							  	  category_id = :category_id
							   WHERE id = :id');
	$statement->execute(array(
		'title' 		=> $data['title'],
		'category_id' 	=> $data['category'],
		'id'			=> $data['id']
	));
	
	//Delete old answers
	$statement=$db->prepare('DELETE FROM answers 
					  		 WHERE question_id = :question_id');	
	
	$statement->execute(array('question_id' => $data['id']));
			 			
			
	//Then Insert updated Answers Loopy Style
	foreach ($data['answers'] as $key => $answer) 
	{

		$correct=0;
		
		//If this current answer is correct then $correct is Correct too!
		if ($key == $data['correct']-1)
		{
			$correct=1;
		}
		
		//Updates the current answer
		$statement = $db->prepare('INSERT INTO answers(question_id,title,correct)
							  	   VALUES (:question_id,:title,:correct)');
							  	   
		$statement->execute(array(
			'question_id'   => $data['id'],
			'title' 		=> $answer,
			'correct' 		=> $correct));		
	}
}

// Saves a new question to the database
function saveQuestion($data)
{
	global $db;

	// First lets save the question.
	$question = $db->prepare('INSERT INTO questions (title, category_id) VALUES (:title, :category_id)');

	// Execute the prepared question statement.
	$question->execute(array(
		'title' 		=> $data['title'],
		'category_id' 	=> $data['category']
	));

	// Get the id of the inserted question.
	$question_id = $db->lastInsertId('id');

	// The correct answer.
	$correct_answer = $data['correct-answer'];

	// Insert each of the answers.
	foreach ($data['answers'] as $key => $answer)
	{
		// Always assume that the answer is not correct.
		$correct = 0;
	
		// Check if the current answer is the correct one.
		if ($data['correct-answer'] == ($key + 1))
		{
			$correct = 1;
		}

		// Prepare our database query.
		$statement = $db->prepare('INSERT INTO answers (title, question_id, correct) VALUES (:title, :question_id, :correct)');

		// Execute the prepared statement with values.
		$statement->execute(array(
			'title' 		=> $answer,
			'question_id' 	=> $question_id,
			'correct'		=> $correct
		));
	}
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
	if(!count($questions))
	{
		return;
	}
	
	global $db;

	// Empty array for andswers.
	$answers = array();

	// Empty array for ids.
	$ids = array();

	// Loop over the questions and get their ids.
	foreach ($questions as $question)
	{
		// Push each question id into the ids array.
		$ids[] = $question['id'];
	}


	// Concatenate all questions ids into a string of ids to be used in the query.
	$ids = implode(',', $ids);

	// Prepare the db query.
	$statement = $db->query("SELECT * FROM answers WHERE question_id IN ($ids)");

	// Execute the prepared statement.
	//$statement->execute(array('ids' => $ids));

	// Get each answer and push it onto the answers array.
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$answers[] = $row;
	}

	// Push each answer into the questions array
	// NOTE! Switch questions loop with answers loop. Should be better performance wise
	// even if it really shouldnt matter that much right now.
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

	// We should only have one result in the array so we only return the first
	// question in the array.
	return $question[0];
}

// Removes the specified question
function removeQuestion($id)
{
	global $db;

	// Prepare a statement to fetch the question we want to remove.
	$statement = $db->prepare('SELECT * FROM questions WHERE id = :id');

	// Execute the prepared statement.
	$statement->execute(array('id' => $id));

	// No need to do a loop to fetch the data since we only expect to get a single result.
	$question = $statement->fetch(PDO::FETCH_ASSOC);

	// If the result in the question variable is empty it does not exist so we just return false.
	if (empty($question)) return false;

	// Prepare statement to remove the question.
	$statement = $db->prepare('DELETE FROM questions WHERE id = :id');

	// Execute the query to remove the question.
	$statement->execute(array('id' => $id));

	// Prepare statement to remove answers for this category.
	$statement = $db->prepare('DELETE FROM answers WHERE question_id = :id');

	// Execute the prepared statement to remove answers.
	$statement->execute(array('id' => $id));
}