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
						'<div class="col-md-6">' +
						'<button class="btn btn-primary btn-lg btn-block category" data-id="' + category.id + '">' + category.title + '</button>' +
						'</div>';

					$('#categories').append(html);
				}

				// Handle events on category click
				$('button.category').on('click', function(evt) {
					evt.preventDefault();

					id = $(this).data('id');

					questions = getQuestions(id); 
					printTriviaQuestion();
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

	function printTriviaQuestion()
	{
		$('#trivia-template').load('templates/ingame.html', function() {

				// Print questions
				var questionNumber = questions.length;
				var questionTitle = questions.shift();
				
				var answerTitle= shift(question['answers'])

			    var headerHtml = 
			    	'<h1 class="txt-shadow">Movie Trivia</h1>' +
			     	'<p class="txt-shadow">Chosen category: Horror</p>'+
			     	'<p class="txt-shadow">' + questionNumber + '</p>';

				var questionHtml = 
					'<div class="col-md-6">' +
					'	<p class="lead">'+ questionTitle + '</p>' +
					'</div>';
			    
				var answerHtml = 
					'<div class="col-md-6">' +
					'	<p class="lead">'+ answerTitle + '</p>' +
					'</div>';

				$('#answerfield').append(anserHtml);
		
/*
				// Handle events on category click
				$('button.category').on('click', function(evt) {
					evt.preventDefault();

					id = $(this).data('id');

					questions = getQuestions(id); 
					console.log(questions);
*/

				});
	}

	// Initialize the game
	init();
})