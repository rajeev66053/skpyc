

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Content
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
	<dl class="dl-horizontal">
		
		<dt>Title</dt>
		<dd>
			<?php echo $content['title']; ?>
			&nbsp;
		</dd>
		<dt>Type</dt>
		<dd>
			<?php echo $content['type']; ?>
			&nbsp;
		</dd>
		
		<dt>sub Type</dt>
		<dd>
			<?php echo $content['sub_type']; ?>
			&nbsp;
		</dd>
		
		<dt>Alias Name</dt>
		<dd>
			<?php echo $content['alias_name']; ?>
			&nbsp;
		</dd>
		<dt>Parent</dt>
		<dd>
			<?php echo $content['parent_id']; ?>
			&nbsp;
		</dd>
		<dt>Content Order</dt>
		<dd>
			<?php echo $content['content_order']; ?>
			&nbsp;
		</dd>
		
		<dt>Short content</dt>
		<dd>
			<?php echo $content['short_content']; ?>
			&nbsp;
		</dd>
		
		<dt>Full Content</dt>
		<dd>
			<?php echo $content['full_content']; ?>
			&nbsp;
		</dd>
		<dt>Image</dt>
		<dd>
			
			<?php

		$filename='img/'.$content['img'];

		if (file_exists($filename) && !empty($content['img'])){ ?>


			<div id="imagePreview" class="imagePrev"><img src="<?php echo $this->config->base_url().$filename; ?>" style="height:100px; width:100px;" /></div>
	
	<?php	} ?>
		</dd>
		
		<dt>Is Active</dt>
		<dd>
			<?php echo $content['is_active']; ?>
			&nbsp;
		</dd>
		
		<dt>Created Date</dt>
		<dd>
			<?php echo $content['created_date']; ?>
			&nbsp;
		</dd>
		
		<dt>Page Title</dt>
		<dd>
			<?php echo $content['page_title']; ?>
			&nbsp;
		</dd>
		
		<dt>Page Description</dt>
		<dd>
			<?php echo $content['page_description']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>



