
 <div class="users form">
 <h2>Admin Change Password</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('admin/users/change_password') ?>
<div class="form-group">
    <label for="old_password">Old Password</label>
    <input type="password" name="old_password" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="new_password">New Password</label>
    <input type="password" name="new_password" class="form-control"/>
</div>
   <div class="form-group"> 
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control"/>
    </div>
  

    <input type="submit" name="submit" value="Change Password" />

</form>
</div>

 <div><a href="<?php echo $this->config->base_url().'admin/users';?>">Back</a> </div>
 
 
 