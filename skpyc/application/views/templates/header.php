<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SKPYC</title>
<link rel="icon" href="images/favicon.png" type="image/x-icon">


<!--<link href="<?php //echo $this->config->base_url()?>css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">-->
<script src="<?php echo $this->config->base_url(); ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $this->config->base_url(); ?>js/bootstrap.min.js"></script>

<link href="<?php echo $this->config->base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url(); ?>css/font-awesome.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $this->config->base_url(); ?>css/bootstrap-theme.min.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<!-- bxSlider Javascript file -->
<script src="<?php echo $this->config->base_url(); ?>js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo $this->config->base_url(); ?>css/jquery.bxslider.css" rel="stylesheet" />



<?php //echo link_tag('css/style.css')?>



<script type="text/javascript">
$(document).ready(function(){
  $('#slider1').bxSlider({ 
   auto: true,
  pause: 3000,
  pager: false,
  speed: 5000
});

 $('#slider2').bxSlider({
 
   auto: true,
  pause: 3000,
  pager: false,
  speed: 5000
});


});

</script>




<script>
$(document).ready(function(){

	// Custom jQuery code goes here
	$('#cssmenu > ul > li:has(ul)').addClass("has-sub");
	
	
	$('#cssmenu > ul > li > a').click(function() {

	var checkElement = $(this).next();

	$('#cssmenu li').removeClass('active');
	$(this).closest('li').addClass('active');	

	if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		$(this).closest('li').removeClass('active');
		checkElement.slideUp('normal');
	}

	if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		$('#cssmenu ul ul:visible').slideUp('normal');
		checkElement.slideDown('normal');
	}

	if (checkElement.is('ul')) {
		return false;
	} else {
		return true;	
	}
});

});

</script>




</head>

<body>
<div class="header">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">Company Name</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li class="active"><a href="#">Link</a></li>
									<li><a href="#">Link</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li><a href="#">Separated link</a></li>
											<li class="divider"></li>                    
										</ul>
									</li>
								</ul>
								<div class="col-sm-3 col-md-3 pull-right">
									<form class="navbar-form" role="search">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search" name="q">
											<div class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
											</div>
										</div>
									</form>
								</div>        
							</div>
						</nav>
                
                <div class="row">
                 		<div clss="col-md-12">
                        <?php  echo "<nav><label for='drop' class='toggle'><i class='icon-reorder'></i></label>	<input type='checkbox' id='drop' />"?>
						<?php   echo "<ul class='menu clearfix'>";?>
						<?php  $Pages->menu_item();?>
						<?php  echo "</ul></nav>"; ?>
            			</div>
        			</div>
    	</div>
    </div>
	
<script type="text/javascript">
        function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {
				//alert('yes');

                var post_data = {
                    'search_data': input_data
					};

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>pages/autocomplete/",
					
                    data:post_data,
                    success: function(data) {
                        // return success
                         if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }

                    },
					error: function(data){

					}
                });
				
				
				/*$.post("<?php echo base_url(); ?>pages/autocomplete",{},function(data){
					alert(data);  
					})*/

            }
        }
</script>
	
   
    
    <script>
	
  /* $(function() {
        $( "#search" ).autocomplete({
            source: function(request, response) {
                $.ajax({ url:"http://localhost:120/lotus_resort/pages/get_category",
                data: { term: $("#search").val()},
                dataType: "json",
                type: "POST",
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 1
        });
    });*/
	
	/*$(function(){
  $("#search").autocomplete({
    source: "pages/get_category" // path to the get_birds method
  });*/
	
	</script>
    