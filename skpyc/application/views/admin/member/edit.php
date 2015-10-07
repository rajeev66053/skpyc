<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Edit Member
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

 <div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>

<?php echo form_open_multipart('admin/member/edit/'.$member['id'] ) ?>
	<fieldset>
	
		
	<input type="hidden" name="id" value="<?php echo $member['id']; ?>" />
    
    <div class="form-group"> 
    <label for="profile_image">Profile Image</label>
    <input type="file" name="profile_image" value="<?php echo $member['profile_image']; ?>"  class="form-control" />

		<?php

		$filename='img/profile_image/'.$member['profile_image'];
		
		//var_dump($filename);die;

		if (file_exists($filename)&& !empty($member['profile_image'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php	} ?>
    
    <input type="hidden" name="prev_image" value="<?php echo $member['profile_image']; ?>" />


     </div>   
    
     <div class="form-group"> 
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $member['name']; ?>" class="form-control"/>
	</div>
	
	
     <div class="form-group"> 
    <label for="designation">Designation</label>
    <input type="text" name="designation" value="<?php echo $member['designation']; ?>" class="form-control"/>
	</div>
	
	
     <div class="form-group"> 
    <label for="name">Is Active</label>
   
	 <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$member['is_active'],'class="form-control" id="is_active"');
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