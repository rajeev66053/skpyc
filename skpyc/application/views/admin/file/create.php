<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add File
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

<?php echo form_open_multipart('admin/file/create') ?>
<div class="form-group">
    <label for="file_name">File</label>
    <input type="file" name="file_name" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="file_type">File Type</label>
	<?php 
	$options = array(''=>'select','banner'=>'Banner','document'=>'Document');
	echo form_dropdown('file_type', $options,'','class="form-control" id="type"');
?>
</div>

   <div class="form-group"> 
    <label for="caption">Caption</label>
    <input type="textarea" name="caption" class="form-control"/>
</div>

   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,'','class="form-control" id="is_active"');
	 ?>
     </div>

    <input type="submit" name="submit" value="Add content" />

</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>
 
 
 