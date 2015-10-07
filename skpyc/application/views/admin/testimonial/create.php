
 <div class="users form">
 <h2>Admin Add testimonial</h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('admin/testimonial/create') ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="message">Message</label>
	<input type="textarea" name="message" class="form-control" />
</div>

 <div class="form-group"> 
    <label for="testimonial_order">Testimonial Order</label>
    <?php 
	
	echo form_dropdown('testimonial_order', range(0,100),'','class="form-control" id="testimonial_order"');
?>
</div>

   <div class="form-group">
   <label for="is_active">Is Active</label>
     <?php
	$options = array(''=>'select','1'=>'Active','0'=>'Inactive');
	//$newoptions = array('0' => 'Select an option') + $options;

echo form_dropdown('is_active', $options,'','class="form-control" id="is_active"');
	 ?>
     </div>
    <input type="submit" name="submit" value="Add testimonial" />

</form>
</div>

 <div><a href="<?php echo $this->config->base_url().'admin/testimonial';?>">Back</a> </div>
 
 
 