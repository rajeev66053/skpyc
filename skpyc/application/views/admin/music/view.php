<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           View Music
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

	<dl class="dl-horizontal">
	
		
		<dt>Tile</dt>
		<dd>
			<?php echo $music['title']; ?>
			&nbsp;
			
		</dd>
		
		<dt>Link</dt>
		<dd>
			<?php echo $music['link']; ?>
			&nbsp;
		</dd>
		
		
		
		<dt>Type</dt>
		<dd>
			<?php echo $music['type']; ?>
			&nbsp;
		</dd>
		
		<dt>Lyrics</dt>
		<dd>
			<?php echo $music['lyrics']; ?>
			&nbsp;
		</dd>
		
		
		<dt>Is Active</dt>
		<dd>
			<?php echo $music['is_active']==0?'Inactive':'Active';?>
			&nbsp;
		</dd>
		
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

