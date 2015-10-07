
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Global Setting
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Global Setting</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
	<dl  class="dl-horizontal">
		
		<dt>Logo</dt>
		<dd>
			<?php

		$filename='img/logo/'.$globalsetting['logo'];

		if (file_exists($filename)&& !empty($globalsetting['logo'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php } ?>
		</dd>
		<dt>Mail To</dt>
		<dd>
			<?php echo $globalsetting['mail_to']; ?>
			&nbsp;
		</dd>
		
		
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

