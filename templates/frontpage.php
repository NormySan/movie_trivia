<h1>Hello, world!</h1>
<script>
	jQuery(function($) {

		// first ajax
		var data = $.ajax({
			url: 'questions'
		}).done(function(response) {
			var data = JSON.parse(response)

			console.log(data)
		})

		var data = $.get('questions', function(response) {
			var data = JSON.parse(response)

			console.log(data)
		});
	})
</script>