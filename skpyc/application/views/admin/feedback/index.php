 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Feedback
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->config->base_url().'admin/'?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Feedback</li>
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
			<th>Email</th>
			<th>Phone</th>
			<th>Message</th>
			<th>Feedback Date</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($feedbacks as $feedback): ?>
	<tr>
		<td><?php echo $feedback['id']; ?>&nbsp;</td>
		<td><?php echo $feedback['name'];?>&nbsp;</td>
		<td><?php echo $feedback['email']; ?>&nbsp;</td>
		<td><?php echo $feedback['phone']; ?>&nbsp;</td>
		<td><?php echo $feedback['message']; ?>&nbsp;</td>
		<td><?php echo $feedback['feedback_date']; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/feedback/view/'.$feedback['id'];?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/feedback/delete/'.$feedback['id'];?>">Delete</a>
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

