<h1 class="blogs-title"><?=$title?></h1>
<?php foreach($blogs as $blog) { ?>
    <div class="row" id="post-row" >
        <div class="col-md-3">
            <img class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $blog['post_image']; ?>">
        </div>
        <div class="col-md-9">
            <h3><?php echo ucfirst($blog['title']);?></h3>
            <small class="post-date">
                <?php echo $blog['created_at'] == $blog['updated_at'] ? "Posted on: ".$blog['created_at'] : "Updated on: ".$blog['updated_at']; ?> 
                in <strong> <?php echo $blog['name']; ?></strong> <br> Previous Status: <strong><?= ucfirst($blog['post_status']) ?></strong> </small>
            <br>
            <!-- limit the word -->
            <?php echo word_limiter($blog['body'], 50);?> 
            <br><br>
            <span><a class="btn btn-default" id="read_more" href="<?php echo base_url('/posts/view/'.$blog['id']); ?>">READ MORE</a></span>
        </div>
    </div>
<?php } ?>  
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>