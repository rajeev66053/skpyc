
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
                </div><!-- /.box-header -->
                <div class="box-body">
	<dl  class="dl-horizontal">
		
		<dt>Username</dt>
		<dd>
			<?php echo $users['username']; ?>
			&nbsp;
		</dd>
		<dt>Email</dt>
		<dd>
			<?php echo $users['email']; ?>
			&nbsp;
		</dd>
		
		<dt>Role</dt>
		<dd>
			<?php echo $users['role']; ?>
			&nbsp;
		</dd>
		
		<dt>Created Date</dt>
		<dd>
			<?php echo $users['created_date']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

