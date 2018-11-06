<div class="container blogfont">
    <br>
    <h1 class="text-center">
        <?=$posts['title']?>
    </h1>

    <div id="postImg">
    <hr>
        <img class="img-rounded-single" src="<?php echo base_url(); ?>assets/images/posts/<?= $posts['post_image']?>" alt="Clean code with clarity image." style="max-height: 250px;">
    </div>
    <div>
        <?= $posts['body'] ?>
        <!--post content-->
    </div>
    <?php if($posts['author']) { ?>
    <hr>
    <div class="media">
        <div class="media-left">
            <img src="http://windsgate.com/images/avatar.png" class="media-object" style="width:60px" alt="author image">
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <?=$posts['author']?>
            </h4>
            <p>Author</p>
        </div>
    </div>
    <?php } ?>
</div>