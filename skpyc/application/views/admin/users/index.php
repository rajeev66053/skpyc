 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>
		
		

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <a href="<?php echo $this->config->base_url().'admin/users/create'?>">Create User</a>
                </div><!-- /.box-header -->
                <div class="box-body">
    
    

    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>Role</th>
			<th>Is Active</th>
			<th>Created Date</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['id']; ?>&nbsp;</td>
		<td><?php echo $user['username'];?>&nbsp;</td>
		<td><?php echo $user['email']; ?>&nbsp;</td>
		<td><?php echo $user['password']; ?>&nbsp;</td>
		<td><?php echo $user['role']; ?>&nbsp;</td>
		<td><?php echo $user['is_active']==0?'Inactive':'Active'; ?>&nbsp;</td>
		<td><?php echo $user['created_date']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/users/view/'.$user['id'];?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/users/edit/'.$user['id'];?>">Edit</a>   |
        <a href="<?php echo $this->config->base_url().'admin/users/delete/'.$user['id'];?>">Delete</a>
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

