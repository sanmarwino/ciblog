<div class="container-blogs">
  <h1 class="text-center other-font-style"><?=$title?></h1>
    <?php 
    $ctr = 1;
      foreach($posts as $posts) { 
        if($ctr == 1 || $ctr == 5 || $ctr == 9 || $ctr == 13) { echo '<div class="row slideanim">'; }  
    ?>
    <div class="col-sm-3">
      <div class="col-sm-12" id="blog">
      <a href="<?php echo base_url(); ?>blogs/<?=$posts['slug'].'_'.$posts['id']?>">
          <div class="container1">
          <img class="img-rounded" src="<?php echo base_url(); ?>assets/images/posts/<?= $posts['post_image']?>" alt="Clean code writing">
            <div class="bottom-left">
              <h3><?=$posts['title']?></a></h3>
              <p><?=substr($posts['created_at'],0,11)?></p>
            </div>  
          </div>
      </a>
      </div>                            <!--trim-->
    </div>
    <?php 
        if($ctr == 4 || $ctr == 8 || $ctr == 12 || $ctr == 16)
          echo '</div>';
        $ctr++;
      } 
    ?>
</div>