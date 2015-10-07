 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Contents
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Content</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <a href="<?php echo $this->config->base_url().'admin/content/create'?>">Create content</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    

    <div class="table-responsive">
    <table id="example1" class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Type</th>
			<th>Sub Type</th>
			<th>Alias Name</th>
			<th>Parent</th>
			<th>Position</th>
			<th>Image</th>
			<th>Is Active</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($contents as $content): 
	
	//echo '<pre>';
	//var_dump($content);
	//echo '</pre>';die;
	
	?>
	<tr>
		<td><?php echo $content['id']; ?>&nbsp;</td>
		<td><?php echo $content['title'];?>&nbsp;</td>
		<td><?php echo $content['type']; ?>&nbsp;</td>
		<td><?php echo $content['sub_type']; ?>&nbsp;</td>
		<td><?php echo $content['alias_name']; ?>&nbsp;</td>
		<td><?php echo $content['parent_id']; ?>&nbsp;</td>
		<td><?php echo $content['content_order']; ?>&nbsp;</td>
		<td><?php echo $content['img']; ?>&nbsp;</td>
		<td><?php echo $content['is_active']==0?'Inactive':'Active'; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/content/view/'.$content['id'];?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/content/edit/'.$content['id'];?>">Edit</a>   |
        <a href="<?php echo $this->config->base_url().'admin/content/delete/'.$content['id'];?>">Delete</a>
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


