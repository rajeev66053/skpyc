   
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Member</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
<a href="<?php echo $this->config->base_url().'admin/member/create'?>">Create New</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Is Active</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($members as $member): ?>
	<tr>
		<td><?php echo $member['id']; ?>&nbsp;</td>
		<td><?php echo $member['name'];?>&nbsp;</td>
		<td><?php echo $member['designation']; ?>&nbsp;</td>
		<td><?php echo $member['is_active']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/member/view/'.$member['id'];?>">View </a> |
        <a href="<?php echo $this->config->base_url().'admin/member/edit/'.$member['id'];?>">Edit </a>   |
        <a href="<?php echo $this->config->base_url().'admin/member/delete/'.$member['id'];?>">Delete </a>
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


