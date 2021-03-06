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
			<?php if($isupdate): ?>
				<?php echo validation_errors(); ?>
				<?php echo form_open('blog/update_entry', array('class'=> 'form-horizontal')); ?>
					<div class="form-group">
						<label class="control-label col-sm-2">Blog Title: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="title" value="<?=$details->blog_title; ?>" required />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Blog Content: </label>
						<div class="col-sm-10">
							<textarea name="content" col="3" rows="8" class="form-control"><?=$details->blog_description; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>					
					<input type="hidden" name="blog_id" value="<?=$details->blog_id?>">

				</form>
			<?php else: ?>
			<h1>
				<?=$details->blog_title;?>
				<?php if($details->blog_owner == $userid && !$isupdate): ?>
					<?php echo anchor('blog/details/'. $details->blog_id .'/true', '<span style="float: right" class="glyphicon glyphicon-pencil"></span>', array('class="btn btn-info'));  ?>
					<?php echo anchor('blog/delete_entry/'. $details->blog_id, '<span style="float: right" class="glyphicon glyphicon-trash"></span>', array('class="btn btn-info'));  ?>
				<?php endif;?>
			</h1>
			<p><?=$details->blog_description; ?></p>
			<?php endif;?>
		</div>
	</div>
	<?php if(!$isupdate): ?>
	<div class='well'>
		<div class='row'>
			<h3>Comments: </h3>
			<?php echo validation_errors(); ?>
			<?php echo form_open('blog/add_comment/'. $details->blog_id, array('class'=> 'form-horizontal')); ?>
				<div class="form-group">
					<label class="control-label col-sm-2">Title: </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Comments: </label>
					<div class="col-sm-10">
						<textarea name="comment" col="3" rows="5" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<input type="hidden" name="blog_id" value="<?=$details->blog_id?>" />

			</form>
		</div>
		<?php if(isset($comment) && count($comment) > 0) :?>
		<?php foreach($comment as $com): ?>
			<div class="row">

				<h4>
					<?php echo $com->comment_title .' by '. $com->fullname;?> 
					<?php echo ($com->comment_user == $userid) ? anchor('blog/delete_comment/'. $details->blog_id .'/'.$com->comment_id, '<span style="align: right" class="glyphicon glyphicon-trash"></span>', array('class="btn btn-info')) : '';  ?>
				</h4>
				<h5>
					<?php if($com->comment_user == $userid): ?>
						<?php echo form_open('blog/update_comment/'. $details->blog_id, array('class'=> 'form-horizontal')); ?>
						<textarea col="20" name="comment"><?=$com->comment_details?></textarea>
						<input type="hidden" name="title" value="<?=$com->comment_title?>">
						<input type="hidden" name="comment_id" value="<?=$com->comment_id?>">
						<input type="hidden" name="blog_id" value="<?=$com->blog_id?>">
						<button type="submit" class="btn btn-primary">Update</button>
						</form>
					<?php else: ?>
						<?=$com->comment_details;?>
					<?php endif;?>
				</h5>
			</div>
		<?php endforeach;?>
		<?php endif;?>
	</div>	
	<?php endif;?>
</div>

</body>
</html>