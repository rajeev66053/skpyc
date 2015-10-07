
<div class="feedback form">
<?php echo validation_errors(); ?>

<?php echo form_open('admin/feedback/edit/'.$feedback['id'] ) ?>
	<fieldset>
		<legend><?php echo 'Admin Edit Feedback'; ?></legend>
	
		
	<input type="hidden" name="id" value="<?php echo $feedback['id']; ?>" />
    
    <div class="form-group"> 
    <label for="name">Name</label>
    <input type="input" name="name" value="<?php echo $feedback['name']; ?>"  class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="email">Email</label>
    <input type="input" name="email" value="<?php echo $feedback['email']; ?>"  class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="phone">Phone</label>
    <input type="input" name="phone" value="<?php echo $feedback['phone']; ?>"  class="form-control" />
     </div> 
     
      <div class="form-group"> 
    <label for="message">Message</label>
    <input type="input" name="message" value="<?php echo $feedback['message']; ?>"  class="form-control" />
     </div>   
    
  
	</fieldset>
<input type="submit" name="submit" value="Update" />
</form>
</div>

 <div><a href="<?php echo $this->config->base_url().'admin/feedback';?>">Back</a> </div>