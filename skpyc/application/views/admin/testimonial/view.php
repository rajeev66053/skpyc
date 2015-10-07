<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Testimonial
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Testimonial</li>
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
		
		<dt>Name</dt>
		<dd>
			<?php echo $testimonial['name']; ?>
			&nbsp;
		</dd>
		<dt>Message</dt>
		<dd>
			<?php echo $testimonial['message']; ?>
			&nbsp;
		</dd>
		
		<dt>Testimonial Order</dt>
		<dd>
			<?php echo $testimonial['testimonial_order']; ?>
			&nbsp;
		</dd>
		
		<dt>Is Active</dt>
		<dd>
			<?php echo $testimonial['is_active']; ?>
			&nbsp;
		</dd>
		<dt>Created Data</dt>
		<dd>
			<?php echo $testimonial['created_date']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

