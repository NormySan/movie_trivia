<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Categories <small>Manage and add categories</small></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>Add a new category</h4>
			<form action="<?php echo url('admin/categories'); ?>" method="post" class="form-inline" role="form">
				<div class="form-group">
					<input type="text" name="title" id="title" class="form-control" placeholder="Category name" required>
				</div>
				<button type="submit" class="btn btn-default">Save</button>
			</form>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h4>List of categories</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($categories) && count($categories)): ?>
						<?php foreach ($categories as $category): ?>
							<tr>
								<td>
									<a href="<?php echo url('admin/categories?id=' . $category['id']); ?>">
										<?php echo $category['title']; ?>
									</a>
								</td>
								<td>
									<a href="<?php echo url('admin/categories/remove?id=' . $category['id']); ?>">
										Remove
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="2">No categories.</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>