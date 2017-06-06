<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
	<div class="form-group">
   	<label for="title">Title</label>
   	<input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
 	</div>
	<div class="form-group">
   	<label for="body">Body</label>
   	<textarea rows="15" id="editor1" class="form-control" name="body" placeholder="Input body"></textarea>
  	</div>
  	<div class="form-group">
  		<label>Category</label>
  		<select name="category_id" class="form-control">
  			<?php foreach($categories as $category): ?>
  				<option value="<?php echo $category['c_id']; ?>"><?php echo $category['c_name']; ?></option>
  			<?php endforeach; ?>
  		</select>
  	</div>
  	<div class="form-group">
  		<label>Upload Image</label>
  		<input type="file" name="userfile" size="20">
  	</div>
  	<button type="submit" class="btn btn-default">Submit</button>
</form>