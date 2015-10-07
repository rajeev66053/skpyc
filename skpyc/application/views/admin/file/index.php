
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            File
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">File</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
<a href="<?php echo $this->config->base_url().'admin/file/create'?>">Create File</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>File</th>
			<th>File Type</th>
			<th>Caption</th>
			<th>Is Active</th>
			<th>Created Date</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($files as $file): 
	
	//echo '<pre>';
	//var_dump($file);
	//echo '</pre>';die;
	
	?>
	<tr>
		<td><?php echo $file['id']; ?>&nbsp;</td>
		<td><?php echo $file['file_name'];?>&nbsp;</td>
		<td><?php echo $file['file_type']; ?>&nbsp;</td>
		<td><?php echo $file['caption']; ?>&nbsp;</td>
		<td><?php echo $file['is_active']==0?'Inactive':'Active'; ?>&nbsp;</td>
		<td><?php echo $file['created_date']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/file/view/'.$file['id'];?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/file/edit/'.$file['id'];?>">Edit</a>   |
        <a href="<?php echo $this->config->base_url().'admin/file/delete/'.$file['id'];?>">Delete</a>
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

