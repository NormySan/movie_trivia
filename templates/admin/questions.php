<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Questions <small>Manage and add questions</small></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo url('admin/questions'); ?>" method="post" role="form">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4>Add a new question</h4>
						<div class="form-group">
							<textarea name="title" id="title" rows="5" class="form-control" placeholder="What is the meaning of life.." required></textarea>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="category">Category</label>
									<select name="category" id="category" class="form-control" required>
										<?php if (isset($categories) && count($categories)): ?>
											<option value="0" disabled>Choose a category</option>
											<?php foreach ($categories as $category): ?>
												<option value="<?php echo $category['id']; ?>">
													<?php echo $category['title']; ?>
												</option>
											<?php endforeach; ?>
										<?php else: ?>
											<option value="0" disabled>No categories</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="correct-answer">Correct answer</label>
									<select name="correct-answer" id="correct-answer" class="form-control" required>
										<option value="0" disabled>Choose the correct answer</option>
										<option value="1">Answer 1</option>
										<option value="2">Answer 2</option>
										<option value="3">Answer 3</option>
										<option value="4">Answer 4</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="answer_1">Answer 1</label>
									<input type="text" name="answers[]" id="answer_1" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="answer_2">Answer 2</label>
									<input type="text" name="answers[]" id="answer_2" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="answer_3">Answer 3</label>
									<input type="text" name="answers[]" id="answer_3" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="answer_4">Answer 4</label>
									<input type="text" name="answers[]" id="answer_4" class="form-control" required>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Save the question</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<?php if (isset($categories) && count($categories)): ?>
				<?php foreach ($categories as $category): ?>
					<h4><?php echo $category['title']; ?></h4>
					<table class="table table-striped">
						<?php if (isset($questions) && count($questions)): ?>
							<?php foreach ($questions as $question): ?>
								<?php if ($question['category_id'] == $category['id']): ?>
									<tr>
										<td>
											<a href="<?php echo url('admin/questions?id=' . $question['id']); ?>">
												<?php echo $question['title']?>
											</a>
										</td>
										<td>
											<a href="<?php echo url('admin/questions/remove?id=' . $question['id']); ?>">
												Remove
											</a>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</table>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>