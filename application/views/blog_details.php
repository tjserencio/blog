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
			<h1><?=$details->blog_title;?></h1>
			<p><?=$details->blog_description; ?></p>
		</div>
		<div class='row'>
			<?php echo validation_errors(); ?>
			<?php echo form_open('blog/add_comment/'. $details->blog_id, array('class'=> 'form-horizontal')); ?>
				<div class="form-group">
					<label class="control-label col-sm-2">Comments: </label>
					<div class="col-sm-10">
						<textarea name="comment" col="3" rows="8" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>

			</form>
		</div>
		<?php if(isset($comment) && count($comment) > 0) :?>
		<?php foreach($comment as $com): ?>
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