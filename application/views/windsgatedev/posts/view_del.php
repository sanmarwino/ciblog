<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br> 

<div class = "post-body">
	<img class="post-view" id="post-img" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
	<?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') === $post['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/restore/<?php echo $post['id']; ?>">Restore</a>
	<button class="btn btn btn-danger" type="button" data-toggle="modal" data-target="#myModal">Remove</button>
<?php endif; ?>

    <!-- Modal -->
	<div class="modal fade modal_center" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
            <div class="modal-content" style="text-align:center;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure you want to remove this blog? "<?=$post['id']?>"</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('/posts/delete_post_in_db/'.$post['id']);?><!--form that submit the value of clicked button-->
                  <input class="hidden" name="img_name" value="<?=$post['post_image']?>">
                  <input class="btn btn-default" id="delete" type="submit" value="DELETE" > <!--active delelte button-->
                  <button class="btn btn-default" id="cancel" type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button> <!--cancel button-->
                </form>
              </div>
            </div>
            
        </div>
      </div>
    <!-- Modal -->

