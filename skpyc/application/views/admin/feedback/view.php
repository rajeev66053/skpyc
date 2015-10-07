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
	<dl  class="dl-horizontal">
		
		<dt>Name</dt>
		<dd>
			<?php echo $feedback['name']; ?>
			&nbsp;
		</dd>
		<dt>Email</dt>
		<dd>
			<?php echo $feedback['email']; ?>
			&nbsp;
		</dd>
		
		<dt>Phone</dt>
		<dd>
			<?php echo $feedback['phone']; ?>
			&nbsp;
		</dd>
        
        <dt>Message</dt>
		<dd>
			<?php echo $feedback['message']; ?>
			&nbsp;
		</dd>
        
		
		<dt>Feedback Date</dt>
		<dd>
			<?php echo $feedback['feedback_date']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
</section>

