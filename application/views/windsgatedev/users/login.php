<?php echo form_open('users/login'); ?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center">Login</h1>
			<div class="form-group">
				<div class="input-group input-group-lg">
			  <span class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			  </span>
			  	<input class="form-control" type="text" name="username" placeholder="Username" required autofocus>
			</div>
			</div>
			<div class="form-group">
				<div class="input-group input-group-lg" style="margin-top: 5px;">
			  <span class="input-group-addon">
			    <span class="glyphicon glyphicon-lock"></span>
			  </span>
			  	<input class="form-control" name="password" type="password" placeholder="Password" required autofocus="">
			</div> 
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>
