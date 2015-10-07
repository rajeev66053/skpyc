
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Add Global Setting
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

<?php echo form_open_multipart('admin/globalsetting/create') ?>
<div class="form-group">
    <label for="logo">logo</label>
    <input type="file" name="logo" class="form-control" />
   </div>
   <div class="form-group"> 
    <label for="mail_to">MailTo</label>
    <input type="text" name="mail_to" class="form-control"/>
</div>
  
    <input type="submit" name="submit" value="Create" />

</form>

	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>