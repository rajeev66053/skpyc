 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Global Setting
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
				<a href="<?php echo $this->config->base_url().'admin/globalsetting/create'?>">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Logo</th>
			<th>Mail To</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($globalsettings as $globalsetting): ?>
	<tr>
		<td><?php echo $globalsetting['id']; ?>&nbsp;</td>
		<td><?php echo $globalsetting['logo'];?>&nbsp;</td>
		<td><?php echo $globalsetting['mail_to']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/globalsetting/view/'.$globalsetting['id'];?>">View </a> |
        <a href="<?php echo $this->config->base_url().'admin/globalsetting/edit/'.$globalsetting['id'];?>">Edit </a>   |
        <a href="<?php echo $this->config->base_url().'admin/globalsetting/delete/'.$globalsetting['id'];?>">Delete </a>
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

