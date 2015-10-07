<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Edit File
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
<?php echo validation_errors(); ?>

 <div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>

<?php echo form_open_multipart('admin/file/edit/'.$file['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit file'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $file['id']; ?>" />
    
    <div class="form-group">
    <label for="file_name">File</label>
    <input type="file" name="file_name" class="form-control" value="<?php echo $file['file_name']; ?>" />
	
<?php

		$filename="img/".$file['file_type']."/".$file['file_name'];


		if (file_exists($filename)&&!empty($filename)){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px; position:relative" /></div>
	
	<?php	}
		?>
        
    <input type="hidden" name="prev_image" value="<?php echo $file['file_name']; ?>" />
   </div>
   <div class="form-group"> 
    <label for="file_type">File Type</label>
	<?php 
	$options = array(''=>'select','banner'=>'Banner','services'=>'Service','document'=>'Document');
	echo form_dropdown('file_type', $options,$file['file_type'],'class="form-control" id="type"');
?>

</div>

   <div class="form-group"> 
    <label for="caption">Caption</label>
    <input type="textarea" name="caption" class="form-control" value="<?php echo $file['caption']; ?>" />
</div>

   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$file['is_active'],'class="form-control" id="is_active"');
	 ?>
     </div>
	</fieldset>
<input type="submit" name="submit" value="Edit file" />
</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>