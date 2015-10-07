<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Member
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
	<dl  class="dl-horizontal">
		
		<dt>Profile Image</dt>
		<dd>
			
			<?php

		$filename='img/profile_image/'.$member['profile_image'];

		if (file_exists($filename)&& !empty($member['profile_image'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php } ?>
		</dd>
		<dt>Name</dt>
		<dd>
			<?php echo $member['name']; ?>
			&nbsp;
		</dd>
		
		<dt>Designation</dt>
		<dd>
			<?php echo $member['designation']; ?>
			&nbsp;
		</dd>
		
		<dt>Is Active</dt>
		<dd>
			<?php echo $member['is_active']; ?>
			&nbsp;
		</dd>
		
		<dt>Created Date</dt>
		<dd>
			<?php echo $member['created_date']; ?>
			&nbsp;
		</dd>
		
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>


