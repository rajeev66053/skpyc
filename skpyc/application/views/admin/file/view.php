<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           File
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">File</li>
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
		
		<dt>File Name</dt>
		<dd>
			<?php

		$filename="img/".$file['file_type']."/".$file['file_name'];


		if (file_exists($filename)){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php	}
		?>
		</dd>
		
		<dt>File Type</dt>
		<dd>
			<?php echo $file['file_type']; ?>
			&nbsp;
		</dd>
		
		
		
		<dt>Caption</dt>
		<dd>
			<?php echo $file['caption']; ?>
			&nbsp;
		</dd>
		
		
		<dt>Is Active</dt>
		<dd>
			<?php echo $file['is_active']; ?>
			&nbsp;
		</dd>
		
		<dt>Created Date</dt>
		<dd>
			<?php echo $file['created_date']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

