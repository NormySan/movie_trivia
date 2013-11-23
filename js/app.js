/* Movie Trivia Application | Javascript file */

jQuery(function($) {

	var categories = {},
		score = 0, 
		playerName = 'Player 1',
		triviaQuestions = [],
		answers = [];

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

					$.get('questions', { id: id }, function(response) {
						var questions = JSON.parse(response);

						// Load the trivia game template
						renderQuestionsTemplate(questions);
					});
				});

			});
		});
	}

	// Restart the current game
	function restartGame() {

		// Reset the score
		score = 0;
	}

	// Load and render the trivia questions template
	function renderQuestionsTemplate(questions) {

		// Add questions to the triviaQuestions array
		triviaQuestions = questions;

		$('#trivia-template').load('templates/ingame.html', function() {
			printTriviaQuestion();
		});
	}

	function clearTemplate()
	{
		$('#question-title').empty();
		$('#question-answers').empty();
	}

	function printTriviaQuestion() {

		if (triviaQuestions.length == 0) {
			endCurrentGame();
			return;
		}

		clearTemplate();
		
		var correctId,
			question = triviaQuestions.shift();
			
		$('#question-title').append('<h1>' + question.title + '</h1>');

		for (var i = 0; i < question.answers.length; i++)
		{
			var html = 
				'<div class="col-md-6">' +
				'<button class="btn btn-primary btn-lg btn-block answer" data-answer-id="' + question.answers[i].id + '">' + question.answers[i].title + '</button>' +
				'</div>';

			$('#question-answers').append(html);

			if (question.answers[i].correct == 1) {
				correctId = question.answers[i].id
			}
		}

		// When a button is pushed run this event
		$('button.answer').on('click', function() {
			var id = $(this).data('answer-id');

			// Push the answered in to the answers array
			answers.push(id);

			// Check if the answer was correct
			if (id == correctId) {
				$(this).removeClass('btn-primary').addClass('btn-success');
				score=score+1000;
				setTimeout(function(){printTriviaQuestion();},1500);
			} else {
				$(this).removeClass('btn-primary').addClass('btn-danger');
				score=score-100;
			}

			// Push the question to the answered questions array

			console.log(id);
		});
	}

	// End the current game
	function endCurrentGame() {
		setTimeout(function(){renderCategories();},1500);
	}

	// Initialize the game
	init();
})