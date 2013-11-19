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

		$.get('categories',function(response) {
			var categories = JSON.parse(response);

			// Load the template file
			$('#trivia-template').load('templates/startgame.html', function() {

				// Render categories on the page
				for (var i = 0; i < categories.length; i++)
				{
					var category = categories[i];
					var html =
						'<div class="row"><div class="col-md-12">' +
						'<button class="btn btn-default btn-lg btn-block category" data-id="' + category.id + '">' + category.title + '</button>' +
						'</div></div>';

					$('#categories').append(html);
				}

				// Handle events on category click
				$('button.category').on('click', function(evt) {
					evt.preventDefault();

					id = $(this).data('id');

					console.log(id)
				});

			});
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
		});
	}

	// Perform an AJAX GET request to get 10 random questions
	function getQuestions(id) {
		$.get('questions', { id: id }, function(response) {
			var questions = JSON.parse(response);

			return questions;
		});
	}

	// Initialize the game
	init();
})