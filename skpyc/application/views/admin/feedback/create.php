
<div class="feedback form">
<?php echo validation_errors(); ?>

<?php echo form_open('admin/feedback/create/') ?>
	<fieldset>
		<legend><?php echo 'Admin Add Feedback'; ?></legend>
	
    <div class="form-group"> 
    <label for="name">Name</label>
    <input type="input" name="name"  class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="email">Email</label>
    <input type="input" name="email" class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="phone">Phone</label>
    <input type="input" name="phone" class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="message">Message</label>
    <input type="input" name="message"  class="form-control" />
     </div>   
    
  
	</fieldset>
<input type="submit" name="submit" value="Update" />
</form>
</div>

 <div><a href="<?php echo $this->config->base_url().'admin/feedback';?>">Back</a> </div>