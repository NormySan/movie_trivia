<div id="site-wrapper">
	<div class="container">
		<div class="row">
			<div class="jumbotron box-shadow">
				<div class="col-md-4">
					<img src="<?php echo SITE_PATH ?>/img/userlogin.jpg" class="img-responsive,pull-left" alt="login image">
			   </div> 
				<div class="col-md-4,pull-left">
			   		<h1>User Login</h1>
					<p>Please log in...</p>
					<form class="form-inline" action="<?php echo url('login'); ?>" method="post" role="form">
						<div class="form-group">
							<label class="sr-only" for="username">Username</label>
							<input type="text" name="username" id="title" class="form-control" placeholder="Username..." required>
						</div>
						<div class="form-group">
							<label class="sr-only" for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password..." required>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox"><small> Remember me</small>
							</label>
						</div>
						<button type="submit" class="btn btn-default">Sign In</button>
					</form>               
                </div>
			</div>  
	    </div>
	</div>
</div>