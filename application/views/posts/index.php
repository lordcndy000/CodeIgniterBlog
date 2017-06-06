<h2><?= $title ?></h2>
<?php foreach ($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo site_url(); ?>assets/img/uploads/<?php echo $post['post_image']; ?>" class="img-responsive">
		</div>
		<div class="col-md-9">
			<small class='post-date'>Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['c_name']?></strong></small>

			<p><?php echo word_limiter($post['body'], 50); ?></p>
			<p><a class="btn btn-default btn-sm" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read more</a></p>
		</div>
		
	</div>
<?php endforeach; ?>
<div class='pagination-link'>
	<?php echo $this->pagination->create_links(); ?>
</div>
