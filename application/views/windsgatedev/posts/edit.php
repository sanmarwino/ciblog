<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/update/'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group row">
    <label>Title</label>
    <input type="text" class="form-control" name = "title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group row">
    <label>Slug</label>
    <input type="text" class="form-control" id="slug" name = "slug" value="<?php echo $post['slug']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
        <label>Current image: <?= $post['post_image']?></label>
          <input type="hidden" name="prev_image" value="<?= $post['post_image']?>"><!--previous image-->
          <br>
          <img class="img_edit" src="<?php echo base_url();?>assets/images/posts/<?=$post['post_image']?>" alt="<?=$post['post_image']?>">
      </div>
      <div class="form-group">
          <label>Change Image With:</label>
          <input type="file" name="userfile" size="20">
      </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach ($categories as $category): ?> 
          <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-6">
      <label>Author</label>
      <input type="text" class="form-control" name = "author" placeholder="Add Author" value="<?php echo $post['author']; ?>">
    </div>
  </div>
  <div class="form-group row" id="submit-post">
    <span><button type="submit" name="post_status" value="published" class="btn btn-default" id="post_blog">PUBLISH BLOG</button></span>
    <span><button type="submit" name="post_status" value="draft"     class="btn btn-default" id="save_to_draft">SAVE TO DRAFT</button></span>
  </div>
<?php echo form_close(); ?>
