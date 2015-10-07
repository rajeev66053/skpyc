<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Edit Music
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Music</li>
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

<?php echo form_open_multipart('admin/music/edit/'.$music['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit Music'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $music['id']; ?>" />
    
  
   <div class="form-group"> 
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $music['title']; ?>"/>
</div>

<div class="form-group"> 
    <label for="link">Link</label>
    <input type="text" name="link" class="form-control" value="<?php echo $music['link']; ?>"/>
</div>

 <div class="form-group">
   <label for="type">Type</label>
     <?php
	$options = array(''=>'select','audio'=>'Audio','video'=>'Video');
echo form_dropdown('type', $options,$music['type'],'class="form-control" id="type"');
	 ?>
     </div>
	 
	 <div class="form-group">
    <label for="lyrics">Lyrics</label>
    <?php echo $this->ckeditor->editor("lyrics",$music['lyrics'],array('class'=>'form-control')); ?>
   </div>

   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$music['is_active'],'class="form-control" id="is_active"');
	 ?>
     </div>
	 
	</fieldset>
<input type="submit" name="submit" value="Edit music" />
</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>