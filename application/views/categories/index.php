<h2><?= $title; ?></h2>
<ul class="list-group">
	<?php foreach($categories as $category): ?>
		<li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['c_id'])?>"><?php echo $category['c_name']; ?></a>
			<?php if($this->session->userdata('user_id') == $category['user_id']): ?>
				<form action="categories/delete/<?php echo $category['c_id']; ?>" method="post" class='cat_delete'>
					<input type="submit" value="[X]" class='btn-link text-danger'>
				</form>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>