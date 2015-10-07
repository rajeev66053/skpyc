
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit User
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
<?php echo validation_errors(); ?>

<?php echo form_open('admin/users/edit/'.$users['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit User'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $users['id']; ?>" />
    
    <div class="form-group"> 
    <label for="username">Username</label>
    <input type="input" name="username" value="<?php echo $users['username']; ?>"  class="form-control" />
     </div>   
    
     <div class="form-group"> 
   <label for="role">Role</label>
    <?php
	$options = array(''=>'select user role','admin' => 'Admin', 'user' => 'User');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('role', $options,$users['role'],'class="form-control" id="role" label="Role"');
	 ?>
     </div>
   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$users['is_active'],'class="form-control" id="is_active"');
	 ?>
     </div>
  
	</fieldset>
<input type="submit" name="submit" value="Update" />
</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

