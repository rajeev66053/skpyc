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
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Message</th>
			<th>Testimonial Order</th>
			<th>Is Active</th>
			<th>Created Date</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($testimonials as $testimonial): 
	
	//echo '<pre>';
	//var_dump($testimonial);
	//echo '</pre>';die;
	
	?>
	<tr>
		<td><?php echo $testimonial['id']; ?>&nbsp;</td>
		<td><?php echo $testimonial['name'];?>&nbsp;</td>
		<td><?php echo $testimonial['message']; ?>&nbsp;</td>
		<td><?php echo $testimonial['testimonial_order']; ?>&nbsp;</td>
		<td><?php echo $testimonial['is_active']==0?'Inactive':'Active'; ?>&nbsp;</td>
		<td><?php echo $testimonial['created_date']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/testimonial/view/'.$testimonial['id'];?>">View</a>|
        <a href="<?php echo $this->config->base_url().'admin/testimonial/delete/'.$testimonial['id'];?>">Delete</a>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
	</table>
	<div id="pagination">
		<ul class="tsc_pagination">
			<?php echo $this->pagination->create_links(); ?>
		</ul>
	</div>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

