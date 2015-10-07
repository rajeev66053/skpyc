  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Music
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
<a href="<?php echo $this->config->base_url().'admin/music/create'?>">Add Music</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Link</th>
			<th>Type</th>
			<th>Lyrics</th>
			<th>Is Active</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($musics as $music): 
	
	//echo '<pre>';
	//var_dump($music);
	//echo '</pre>';die;
	
	?>
	<tr>
		<td><?php echo $music['id']; ?>&nbsp;</td>
		<td><?php echo $music['title'];?>&nbsp;</td>
		<td><a href="<?php echo $music['link']; ?>" target="_blank" ><?php echo $music['link']; ?></a>&nbsp;</td>
		<td><?php echo $music['type']; ?>&nbsp;</td>
		<td><?php echo $music['lyrics']; ?>&nbsp;</td>
		<td><?php echo $music['is_active']==0?'Inactive':'Active'; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/music/view/'.$music['id'];?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/music/edit/'.$music['id'];?>">Edit</a>   |
        <a href="<?php echo $this->config->base_url().'admin/music/delete/'.$music['id'];?>">Delete</a>
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
