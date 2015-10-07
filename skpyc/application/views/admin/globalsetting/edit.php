
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Edit Global Setting
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Global Setting</li>
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

<?php echo form_open_multipart('admin/globalsetting/edit/'.$globalsetting['id'] ) ?>
	<fieldset>
	
		
	<input type="hidden" name="id" value="<?php echo $globalsetting['id']; ?>" />
    
    <div class="form-group"> 
    <label for="logo">Logo</label>
    <input type="file" name="logo" value="<?php echo $globalsetting['logo']; ?>"  class="form-control" />

		<?php

		$filename='img/logo/'.$globalsetting['logo'];
		
		//var_dump($filename);die;

		if (file_exists($filename)&& !empty($globalsetting['logo'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php	} ?>
    
    <input type="hidden" name="prev_image" value="<?php echo $globalsetting['logo']; ?>" />


     </div>   
    
     <div class="form-group"> 
    <label for="mail_to">MailTo</label>
    <input type="text" name="mail_to" value="<?php echo $globalsetting['mail_to']; ?>" class="form-control"/>
	</div>
  
	</fieldset>
<input type="submit" name="submit" value="Update Global Setting" />
</form>

	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>