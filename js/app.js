/* Movie Trivia Application | Javascript file */

jQuery(function($) {

	var categories = {}, 
		questions = {}, 
		score = 0, 
		playerName = 'Player 1';

	// Initializes the game
	function init() {

		// Assign categories to the category object
		categories = getCategories();
	}

	// Render the categories display
	function renderCategories() {

		// Load the template file
		$('#trivia-template').load('templates/categories.html');


	}

	// Restart the current game
	function restartGame() {

		// Reset the score
		score = 0;
	}

	// Gets all availible categories with an AJAX GET request
	function getCategories() {
		$.get('categories', function(response) {
			var categories = JSON.parse(response);

			return categories;
		})
	}

	// Perform an AJAX GET request to get 10 random questions
	function getQuestions() {
		$.get('questions', function(response) {
			var questions = JSON.parse(response);

			return questions;
		})
	}

	// Initialize the game
	init();
})