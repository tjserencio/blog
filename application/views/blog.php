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
		<div class="row">
			<h2>Create blog :</h2>
			<?php echo validation_errors(); ?>
			<?php echo form_open('blog/add_entry', array('class'=> 'form-horizontal')); ?>
				<div class="form-group">
					<label class="control-label col-sm-2">Blog Title: </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Blog Content: </label>
					<div class="col-sm-10">
						<textarea name="content" col="3" rows="8" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>

		</div>
		<?php if(isset($blog) && count($blog) > 0) :?>
		<?php foreach($blog as $details): ?>
			<div class="row">
				<h2><?php echo anchor('blog/details/'.$details->blog_id, $details->blog_title);?></h2>
				<p><?php echo $details->blog_description;?></p>
			</div>
		<?php endforeach;?>
		<?php endif;?>
	</div>
</div>

</body>
</html>