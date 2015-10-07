
<div class="users form">
<?php echo validation_errors(); ?>

 <div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>

<?php echo form_open_multipart('admin/testimonial/edit/'.$testimonial['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit testimonial'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>" />
    
   <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $testimonial['name']; ?>" />
   </div>
   <div class="form-group"> 
    <label for="message">Message</label>
	<input type="textarea" name="message" class="form-control" value="<?php echo $testimonial['message']; ?>" />
</div>

 <div class="form-group"> 
    <label for="testimonial_order">Testimonial Order</label>
    <?php 
	
	echo form_dropdown('testimonial_order', range(0,100),$testimonial['testimonial_order'],'class="form-control" id="testimonial_order"');
?>
</div>
   
   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,$testimonial['is_active'],'class="form-control" id="is_active"');
	 ?>
     </div>

  
	</fieldset>
<input type="submit" name="submit" value="Edit testimonial" />
</form>
</div>

 <div><a href="<?php echo $this->config->base_url().'admin/testimonial';?>">Back</a> </div>