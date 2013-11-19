/* Movie Trivia Application | Javascript file */

jQuery(function($) {

	var categories = {}, 
		questions = {}, 
		score = 0, 
		playerName = 'Player 1';

	// Initializes the game
	function init() {

		renderCategories();
	}

	// Render the categories display
	function renderCategories() {

		// Load the template file
		$('#trivia-template').load('templates/startgame.html');

		// Assign categories to the category object
		categories = getCategories();

		// Render categories on the page


		// Handle events on category click
		$('button.category').on('click', function(evt) {
			evt.disableDefault();

			id = $(this).data('id');
		});
	}

	// Restart the current game
	function restartGame() {

		// Reset the score
		score = 0;
	}

	// Gets all availible categories with an AJAX GET request
	function getCategories() {
		$.get('categories',function(response) {
			var categories = JSON.parse(response);

			return categories;
		})
	}

	// Perform an AJAX GET request to get 10 random questions
	function getQuestions(id) {
		$.get('questions', { id: id }, function(response) {
			var questions = JSON.parse(response);

			return questions;
		})
	}

	// Initialize the game
	init();
})