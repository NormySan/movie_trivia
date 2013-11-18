<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo $question['title'] ?></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<form action="<?php echo url('admin/questions/update?id=' . $question['id']); ?>" method="post">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="form-group">
						<textarea name="title" id="title" rows="5" class="form-control" required><?php echo $question['title']; ?></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category" id="category" class="form-control" required>
									<?php if (isset($categories) && count($categories)): ?>
										<option value="0" disabled>Choose a category</option>
										<?php foreach ($categories as $category): ?>
											<option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $question['category_id']) echo 'selected'; ?>>
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
					<h4>Answers</h4>
					<div class="row">
						<?php foreach ($question['answers'] as $answer): ?>	
							<div class="col-md-12">
								<div class="row">
									<div class="col-sm-10">
										<div class="form-group">
											<input type="text" name="answers[]" id="answer_1" class="form-control" value="<?php echo $answer['title']; ?>" required>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<div class="radio">
												<label for="">
													<input type="radio" value="1" name="correct" <?php if ($answer['correct'] == 1) echo 'checked'; ?>>Correct?
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="button-group">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="<?php echo url('admin/questions/remove?id=' . $question['id']); ?>" class="btn btn-danger">Remove</a>
					</div>
				</div>
			</div>			
		</form>
	</div>
</div>