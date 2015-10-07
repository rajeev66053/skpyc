<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/asset/ckfinder/ckfinder.js"></script>



        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Content
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Content</li>
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

<?php echo form_open_multipart('admin/content/edit/'.$content['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit Content'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $content['id']; ?>" />
    
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $content['title']; ?>" />
   </div>
   <div class="form-group"> 
    <label for="type">Type</label>
   <?php 
	$options = array(''=>'select','header'=>'Header','body_top'=>'Body Top','body_mid'=>'Body Mid','body_bottom'=>'Body Bottom','footer'=>'Footer');
	echo form_dropdown('type', $options,$content['type'],'class="form-control" id="type"');
?>
</div>

<div class="form-group">
    <label for="sub_type">Sub Type</label>
   <?php 
	$options = array(''=>'select','left'=>'Left','middle'=>'Middle','right'=>'Right');
	echo form_dropdown('sub_type', $options,$content['sub_type'],'class="form-control" id="sub_type"');
?>
   </div>
   <div class="form-group"> 
    <label for="alias_name">Alias Name</label>
    <input type="text" name="alias_name" class="form-control" value="<?php echo $content['alias_name']; ?>"/>
</div>

<div class="form-group">
    <label for="parent_id">Parent</label>
    <input type="text" name="parent_id" class="form-control" value="<?php echo $content['parent_id']; ?>" />
   </div>
   <div class="form-group"> 
    <label for="content_order">Content Order</label>
	 <?php 
	
	echo form_dropdown('content_order', range(0,100),$content['content_order'],'class="form-control" id="content_order"');
?>
</div>

<div class="form-group">
    <label for="short_content">Short  Content</label>
    
    <?php echo $this->ckeditor->editor("short_content",$content['short_content'],array('class'=>'form-control')); ?>
    <!--<input type="text" name="short_content" class="form-control" value='<?php //echo $content['short_content'];?>' />-->
   </div>
   
   <div class="form-group"> 
    <label for="full_content">Full Content</label>
    <?php echo $this->ckeditor->editor("full_content",$content['full_content'],array('class'=>'form-control')); ?>
    <!--<input type="text" name="full_content" class="form-control" value='<?php //echo $content['full_content'];?>' />-->
</div>

<div class="form-group"> 
    <label for="img">Image</label>
    <input type="file" name="img" class="form-control"/>
    
    <?php

		$filename='img/'.$content['img'];
		
		//var_dump($filename);die;

		if (file_exists($filename)&& !empty($content['img'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php	} ?>
    
    <input type="hidden" name="prev_image" value="<?php echo $content['img']; ?>" />
    
</div>
   
   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$content['is_active'],'class="form-control" id="is_active"');
	 ?>
     </div>
	 
	 	 
<div class="form-group"> 
     <label for="page_title">Page Title</label>
    <input type="text" name="page_title" class="form-control"  value="<?php echo $content['page_title']; ?>"/>
</div>

<div class="form-group"> 
     <label for="page_description">Page Description</label>
	<?php echo $this->ckeditor->editor("page_description",$content['page_description'],array('class'=>'form-control')); ?>
</div>

  
	</fieldset>
<input type="submit" name="submit" value="Edit content" />
</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>