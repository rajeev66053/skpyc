
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Create User
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

<?php //echo validation_errors(); ?>

<?php echo form_open('admin/users/create') ?>
<div class="form-group">
    <label for="username">Username</label><?php echo form_error('username'); ?>
    <input type="input" name="username" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="email">Email</label><?php echo form_error('email'); ?>
    <input type="text" name="email" class="form-control"/>
</div>
   <div class="form-group"> 
    <label for="password">Password</label><?php echo form_error('password'); ?>
    <input type="password" name="password" class="form-control"/>
    </div>
   <div class="form-group"> 
   <label for="role">Role</label><?php echo form_error('role'); ?>
    <?php
	$options = array(''=>'select user role','admin' => 'Admin', 'user' => 'User');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('role', $options,'0','class="form-control" id="role" label="Role"');
	 ?>
     </div>
   <div class="form-group">
   <label for="is_active">Is Active</label><?php echo form_error('is_active'); ?>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,'','class="form-control" id="is_active"');
	 ?>
     </div>

    <input type="submit" name="submit" value="Create" />

</form>

	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>
 
 
 