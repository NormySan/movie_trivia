<?php

function HomeController()
{
	// Return the frontpage template file
	return getTemplate('frontpage');
}

function QuestionsController()
{
	// Check if category id is set
	$id = isset($_GET['id']) ? $_GET['id'] : null;

	// Get random questions
	$questions = getRandQuestions($id);

	// If questions is false we return a message.
	if ($questions === false)
	{
		$message = json_encode(array('message' => 'No questions found for this category.'));

		response($message);
	}

	// JSON encode the questions
	$questions = json_encode($questions);

	// Return the JSON encoded string
	response($questions);
}

function CategoriesController()
{
	$categories = getCategories();

	$categories = json_encode($categories);

	response($categories);
}

/**
 * Admin controller
 */
function AdminController()
{
	return getTemplate('admin');
}

/**
 * Admin category controller
 */
function AdminCategoriesController()
{
	// If we have data set in the post variable the user has created a new category
	// so lets save it to the database with the submitted post variables.
	if (isset($_POST) && count($_POST))
	{
		// Call the saveCategory function to save the new category, give it the data
		// in the post variable.
		saveCategory($_POST);
	}

	// Get categories from the database and save them to the data array.
	$data['categories'] = getCategories();

	// Return the admin categories template.
	return getTemplate('admin/categories', $data);
}

/**
 * Admin remove question
 */
function AdminRemoveCategoryController()
{
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		removeCategory($_GET['id']);
	}

	redirect('admin/categories');
}

/**
 * Admin questions controller
 */
function AdminQuestionsController()
{
	// Get all the categories
	$data['categories'] = getCategories();

	// If we have an id set we want to display just one question.
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		// Get the category.
		$data['question'] = getQuestion($_GET['id']);

		// Make sure we didn't get an empty result.
		if ( ! empty($data['question']))
		{
			return getTemplate('admin/question', $data);
		}
	}

	// If we get a post we want to save a new question.
	if (isset($_POST) && count($_POST))
	{
		// Lets make sure a category has been selected before saving the question.
		if ($_POST['category'] !== 0)
		{
			// Save the qustion with the data in the post variable.
			saveQuestion($_POST);
		}
	}

	// Get all questions
	$data['questions'] = getQuestions();

	// Return the admin questions template.
	return getTemplate('admin/questions', $data);
}

/**
 * Admin update question
 */
function AdminUpdateQuestionController()
{
	if($_POST && count($_POST))
	{
		//print_r($_POST);
		updateQuestionCategoryAnswers($_POST);
	}
	redirect('admin/questions');
}

/**
 * Admin remove question controller
 */
function AdminRemoveQuestionController()
{
	// Lets make sure there was an id set and that it's a numeric value.
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		removeQuestion($_GET['id']);
	}

	// Redirect the user back to the admin questions page.
	redirect('admin/questions');
}