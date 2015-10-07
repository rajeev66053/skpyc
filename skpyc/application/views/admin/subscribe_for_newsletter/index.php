   
    <div class="col-lg-6">
    <div class="table-responsive">
    <h2>subscribe_for_newsletter</h2>
    <table class="table table-bordered table-hover table-striped">
    <thead>
	<tr>
			<th>Id</th>
			<th>Email</th>
			<th class="actions">Actions</th>
	</tr>
    </thead>    
    <tbody>
	<?php foreach ($results as $subscribe_for_newsletter): ?>
	<tr>
		<td><?php echo $subscribe_for_newsletter->id; ?>&nbsp;</td>
		<td><?php echo $subscribe_for_newsletter->email; ?>&nbsp;</td>
		<td class="actions">
			<a href="<?php echo $this->config->base_url().'admin/subscribe_for_newsletter/view/'.$subscribe_for_newsletter->id;?>">View</a> |
        <a href="<?php echo $this->config->base_url().'admin/subscribe_for_newsletter/delete/'.$subscribe_for_newsletter->id;?>">Delete</a>
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

