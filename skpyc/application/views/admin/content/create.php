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

<?php echo form_open_multipart('admin/content/create') ?>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="type">Type</label>
	<?php 
	$options = array(''=>'select','header'=>'Header','body_top'=>'Body Top','body_mid'=>'Body Mid','body_bottom'=>'Body Bottom','footer'=>'Footer');
	echo form_dropdown('type', $options,'','class="form-control" id="type"');
?>
</div>

<div class="form-group">
    <label for="sub_type">Sub Type</label>
    <?php 
	$options = array(''=>'select','left'=>'Left','middle'=>'Middle','right'=>'Right');
	echo form_dropdown('sub_type', $options,'','class="form-control" id="sub_type"');
?>
   </div>
   <div class="form-group"> 
    <label for="alias_name">Alias Name</label>
    <input type="text" name="alias_name" class="form-control"/>
</div>

<div class="form-group">
    <label for="parent_id">Parent</label>
    <?php 
	$options = array(''=>'select');
	echo form_dropdown('parent_id', $options,'','class="form-control" id="parent_id"');
?>
   </div>
   <div class="form-group"> 
    <label for="content_order">Content Order</label>
    <?php 
	
	echo form_dropdown('content_order', range(0,100),'','class="form-control" id="content_order"');
?>
</div>

<div class="form-group">
    <label for="short_content">Short  Content</label>
    <?php echo $this->ckeditor->editor("short_content","",array('class'=>'form-control')); ?>
    <!--<input type="textarea" name="short_content" class="form-control" />-->
	
	
	
   </div>
   
   <div class="form-group"> 
    <label for="full_content">Full Content</label>
    
    <?php echo $this->ckeditor->editor("full_content","",array('class'=>'form-control')); ?>
   <!-- <input type="textarea" name="full_content" class="form-control"/>-->
</div>

<div class="form-group"> 
    <label for="img">Image</label>
    <input type="file" name="img" class="form-control"/>
</div>
   
   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,'','class="form-control" id="is_active"');
	 ?>
     </div>
	 
<div class="form-group"> 
     <label for="page_title">Page Title</label>
    <input type="text" name="page_title" class="form-control"/>
</div>

<div class="form-group"> 
     <label for="page_description">Page Description</label>
    <input type="text" name="page_description" class="form-control"/>
</div>
	 
	 

    <input type="submit" name="submit" value="Add content" />

</form>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>
 
 