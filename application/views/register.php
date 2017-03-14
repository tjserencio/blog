<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="well">
		<?php echo validation_errors(); ?>
		<?php echo form_open('welcome/register/true', array('class'=> 'form-horizontal')); ?>
			<div class="form-group">
				<label class="control-label col-sm-2">Name: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" required />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Email: </label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" required />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Password: </label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" required />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Confirm Password: </label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="confpassword" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

		</form>

	</div>
</div>

</body>
</html>