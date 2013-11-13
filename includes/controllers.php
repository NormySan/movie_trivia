<?php

function HomeController()
{
	// Return the frontpage template file
	return getTemplate('frontpage');
}

function AdminController()
{
	return getTemplate('admin');
}

function QuestionsController()
{
	$questions = array(
		array(
			'id' => 1,
			'title' => 'Who is batman',
			'answers' => array(
				array('title' => 'A superhero'),
				array('title' => 'A garden tool'),
				array('title' => 'A rock made from paper'),
				array('title' => 'A fisherman')
			)
		),
		array(
			'id' => 2,
			'title' => 'Who was the director for Titanic (1997)',
			'answers' => array(
				array('title' => 'Joseph Kosinski', 'correct' => false),
				array('title' => 'James cameron', 'correct' => true),
				array('title' => 'M. Night Shyamalan', 'correct' => false),
				array('title' => 'Martin Scorsese', 'correct' => false)
			)
		)
	);

	$questions = json_encode($questions);

	response($questions);
}