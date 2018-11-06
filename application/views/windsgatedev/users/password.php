
<div style="color:red;">
<?php echo validation_errors(); ?>
</div>
<?php echo form_open('users/update_pw'); ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1 class="text-center"><?= $title; ?></h1>
      <br>
      <div class="form-group"> 
        <input type="text" class="hidden" name="user" value ="<?php echo $this->session->userdata('username'); ?>" placeholder="User">
      </div>
      <div class="form-group"> 
        <label>Current Password</label>
        <input type="password" class="form-control" name="cur_password" placeholder="Current Password">
      </div>
      <div class="form-group"> 
        <label>New Password</label>
        <input type="password" class="form-control" name="password" placeholder="New Password">
      </div>
      <div class="form-group"> 
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
  </div>
<?php echo form_close(); ?>
