<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<div class='row'>
		<div class='col-md-4 col-md-offset-4'>
			<h1 class='text-center'><?= $title; ?></h1>
			<div class='form-group'>
				<label>Name</label>
				<input type="text" name="name" placeholder="Input full name" class='form-control'>
			</div>
			<div class='form-group'>
				<label>Zipcode</label>
				<input type="text" name="zipcode" placeholder="Input zip code" class='form-control'>
			</div>
			<div class='form-group'>
				<label>Email</label>
				<input type="email" name="email" placeholder="Input email" class='form-control'>
			</div>
			<div class='form-group'>
				<label>Username</label>
				<input type="text" name="username" placeholder="Input username" class='form-control'>
			</div>
			<div class='form-group'>
				<label>Password</label>
				<input type="password" name="password" placeholder="Input password" class='form-control'>
			</div>
			<div class='form-group'>
				<label>Confirm Password</label>
				<input type="password" name="password2" placeholder="Input password again" class='form-control'>
			</div>
			<button type='submit' class='btn btn-primary btn-sm btn-block'>Register</button>
		</div>
	</div>
<?php echo form_close(); ?>