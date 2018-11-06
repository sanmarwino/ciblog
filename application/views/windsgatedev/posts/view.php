<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br> 

<div class = "post-body">
	<img class="post-view" id="post-img" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
	<?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') === $post['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['id']; ?>">Edit</a>
	<?php echo form_open('/posts/delete/'.$post['id'].'/'.$post['post_status']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
<?php endif; ?>



