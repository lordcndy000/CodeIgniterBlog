	<h2><?php echo $post['title']; ?></h2>
	<small class='post-date'>Posted on: <?php echo $post['created_at']; ?></small>
	<img src="<?php echo site_url(); ?>assets/img/uploads/<?php echo $post['post_image']; ?>" class="img-responsive">
	
	<div class='post-body'>
		<p><?php echo $post['body']; ?></p>
	</div>
	<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
		<hr>
		<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class='btn btn-info pull-left btn-sm'>Edit</a>
		<?php echo form_open('/posts/delete/'.$post['id']); ?>
			<input type='submit' value='Delete' class='btn btn-danger btn-sm'>
		</form>
	<?php endif; ?>
	<hr>
	<h3>Comments</h3>
	<?php if($comments): ?>
		<?php foreach($comments as $comment): ?>
			<div class='well'>
				<h5><?php echo $comment['body']; ?></h5>
				<h5>- <strong><?php echo $comment['username']; ?></strong> on <?php echo $comment['com_date']; ?></h5>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>No comments to this post yet</p>

	<?php endif; ?>
	<hr>
	<h3>Add Comment</h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open('comments/create/'.$post['id']); ?>
		<div class='form-group'>
			<label>Name</label>
			<input type="text" name="name" class='form-control'>
		</div>
		<div class='form-group'>
			<label>Email</label>
			<input type="email" name="email" class='form-control'>
		</div>
		<div class='form-group'>
			<label>Body</label>
			<textarea name='body' class='form-control'></textarea>
		</div>
		<input type='hidden' name='slug' value='<?php echo $post['slug']; ?>'>
		<button type='submit' class='btn btn-primary btn-sm'>Submit</button>
	</form>