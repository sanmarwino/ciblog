<div style="color:red;">
  <?php echo validation_errors(); ?>
</div>
<h2><?= $title; ?></h2>
<?php echo form_open_multipart('posts/create'); ?>
<form target="frame">
  <div class="form-group row">
    <label>Title</label>
      <input type="text" class="form-control" name = "title" value="<?= $title1 ?>" placeholder="Add Title"  required autofocus>
  </div>
  <div class="form-group row">
    <label>Meta Description</label>
      <input type="text" class="form-control" name = "meta_description" value="<?= $meta_description1 ?>" placeholder="Add Meta Description">
  </div>
  <div class="form-group">
    <label>Body</label>
      <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?= $body ?></textarea>
  </div>
  <script>
     CKEDITOR.replace('editor1' );
  </script>
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
        <input type="text" class="form-control" name = "author" value="<?= $author ?>" placeholder="Add Author">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label>Upload Image</label>
        <input type="file" name="userfile" size="20" >
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="text-align: right;">
      <span><button type="submit" name="post_status" value="published" class="btn btn-default" id="post_blog">PUBLISH BLOG</button></span>
      <span><button type="submit" name="post_status" value="draft"     class="btn btn-default" id="save_to_draft">SAVE TO DRAFT</button></span>
    </div> 
  </div>
</form>
<iframe name="frame" style="display: none;"></iframe>
