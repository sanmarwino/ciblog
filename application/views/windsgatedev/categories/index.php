<h2><?= $title;?></h2>
<?php echo validation_errors(); ?>
<p><?php echo $this->session->flashdata('existing'); ?></p>
<?php echo form_open_multipart('categories/create'); ?>
	<div class="form-group">
	<label>Name</label>
	<input type="text" class="form-control" name="name" placeholder="Enter name">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>

<h2><?= $title; ?></h2>
<ul class="list-group">
<?php foreach($categories as $category) :?>
	<li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
		<?php if($this->session->userdata('user_id') === $category['user_id']): ?>
			<form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
				<button type="submit" class="btn-link text-danger"><span class="glyphicon glyphicon-remove" style="color:red"></span></button>
			</form>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
