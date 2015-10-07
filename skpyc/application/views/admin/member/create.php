
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Member
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Member</li>
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

<?php echo form_open_multipart('admin/member/create') ?>
<div class="form-group">
    <label for="profile_image">Profile Image</label>
    <input type="file" name="profile_image" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control"/>
</div>

 <div class="form-group"> 
    <label for="designation">Designation</label>
    <input type="text" name="designation" class="form-control"/>
</div> 

 <div class="form-group"> 
    <label for="is_active">Is Active</label>
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
 
 
 