<h1 class="blogs-title"><?=$title?></h1>
<?php foreach($posts as $post): ?>
	
	<div class="row" id="post-row" >
		<div class="col-md-3">
			<img class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<h3><?php echo ucfirst($post['title']);?></h3>
			<small class="post-date">
				<?php echo $post['created_at'] == $post['updated_at'] ? "Posted on: ".$post['created_at'] : "Updated on: ".$post['updated_at']; ?> 
				in <strong> <?php echo $post['name']; ?></strong></small>
			<br>
			<!-- limit the word -->
			<?php echo word_limiter($post['body'], 50);?> 
			<br><br>
			<p><a class="btn btn-default" href="<?php echo base_url('/posts/view/'.$post['id']); ?>">READ MORE</a></p>
		</div>
	</div>
<?php endforeach; ?>	
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>
