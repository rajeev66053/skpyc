
<div class="banner">

<?php /*echo '<pre>';
var_dump($banner);
echo '<pre>';*/
 ?>
            <ul id="slider1">
            
            <?php foreach($banner as $banners):


			?>
              <li><img src="<?php echo $this->config->base_url().'img/banner/'.$banners['file_name']; ?> "/></li>
              <?php endforeach; ?>
            </ul>
</div>



<div class="container about-form">
    <div class="col-md-8 about_us">
    	<div class="title">
        
                
       <?php foreach($body_top as $data): ?>
		
		<h3><?php echo $data['title'];?></h3>
        </div>
        <p>
        	<?php echo $data['short_content'];?>
        </p>
        <div class="more">
        <a href="<?php echo $this->config->base_url().'contents/'.$data['alias_name']; ?>">Read more</a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md-4 ">
    
       <!-- <div class="form">
        	<div class="title">
                <h3>Online Reservation</h3>
                <h4>Instant Conformation</h4>
            </div>
                    <div class="row">
                    	                     
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control"  id="datepicker1" />
                                    
                                </div>
                            </div>
                        </div>
                         <script type="text/javascript">
						
						 
						$(function() {
								$( "#datepicker1" ).datepicker({
								  showOn: "button",
								  showOn: 'both',
								  buttonImage: "images/calender.png",
								  buttonImageOnly: true,
								  buttonText: "Select date",
  								  dateFormat: "yy-mm-dd"
								});
								
								$(".ui-datepicker-trigger").mouseover(function() {
        							$(this).css('cursor', 'pointer');
    							});
							  });
						
                        </script>
                   </div>
                    
                     <div class="row">
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="datepicker2" />
                                   
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
						$(function() {
								$( "#datepicker2" ).datepicker({
								 /* showOn: "button",*/
								  showOn: 'both',
								  buttonImage: "images/calender.png",
								  buttonImageOnly: true,
								  buttonText: "Select date",
  								  dateFormat: "yy-mm-dd"
								});
								
								$(".ui-datepicker-trigger").mouseover(function() {
        							$(this).css('cursor', 'pointer');
    							});
							  });
						
                        </script>
                        
                   </div>
                   
                   <div class="row">
                    <div class="col-md-6 adult_room">
                    	<div class="form-group clearfix">
                                        <select name="adutt_list" form="adultform">
                                          <option value="adult">Adults per room</option>
                                          <option >1</option>
                                          <option >2</option>
                                          <option >3</option>
                                        </select>
                            </div>
                       </div>
                       
                        <div class="col-md-6 children_room">
                        	<div class="form-group clearfix">
                                        <select name="child_list" form="childform">
                                        <option value="children">Children</option>
                                          <option >1</option>
                                          <option >2</option>
                                          <option >3</option>
                                          <option >4</option>
                                        </select>
                             </div>
                       </div>
                   </div>
                   
                   <div class="row">
                        <div class='col-sm-12 accesscode'>
                                <select name="accesscode" form="accesscode">
                                          <option value="adult">Access Code/IATA code</option>
                                          <option >1</option>
                                          <option >2</option>
                                          <option >3</option>
                                        </select>
                        </div>
                       
                    </div>
                    
                    <div class="row ">
                        <div class="form_buttons">
                            <div class=" col-sm-6 availability">
                            <a href="#">Check Availabilty</a>
                            </div>
                             <div class=" col-sm-6 cancel">
                            <a href="#">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>-->
		</div>
</div>



<div class="services">
    <div class="container">
    <h1>Our Services</h1>
        <div class="our_service">
        
            <?php foreach($body_main as $main): ?>
            <div class="col-md-4 image">
            <img src="<?php echo $this->config->base_url().'img/services/'.$main['img']; ?>" />
            <div class="service_title"><a href="<?php echo $this->config->base_url().'contents/'.$main['alias_name']; ?>resort_spa.html"><h3><?php echo $main['title']; ?></h3></a></div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="more more-service">
        <a href="<?php echo $this->config->base_url().'contents/services'; ?>">Read more</a>
        </div>
    </div>
</div>
<div class="container rev-info">
    <div class="col-md-8 reviews">
     <div class="title"><h1>Reviews</h1></div>
     
     	<li>
     
     <ul id="slider2">
      <?php /*echo '<pre>';
				print_r($body_bottom_left);
				echo '</pre>';die;*/
			foreach($body_bottom_left as $bottom_left): ?>
            <div class="col-md-12 left">
                <div class="row">
                    <div class="col-sm-4 circular">
                    <?php if(file_exists('img/reviews/'.$bottom_left['img'])&&!empty($bottom_left['img'])){?>
                         <img src="<?php echo $this->config->base_url().'img/reviews/'.$bottom_left['img']; ?>" />
                     <?php }else{ ?>
                     	<img src="images/profile_pic.jpg" />
                     <?php } ?>
                     </div>
                     <div class="col-sm-8 ">
                        <p><?php  echo $bottom_left['message'];?>  </p>
                    </div>
                 </div>
                 <div class="row"><?php echo date($bottom_left['created_date']).','.$bottom_left['name']; ?></div>
             </div>
         </li>
         <?php  endforeach; ?>
      </ul>
     
    <!-- <ul id="slider2">
     <?php /*echo '<pre>';
				print_r($body_bottom_left);
				echo '</pre>';die;*/
			//foreach($body_bottom_left as $bottom_left): ?>
     	<li>
            <div class="col-md-12 left">
                <div class="row">
                
                    <div class="col-sm-4 circular">
                         <img src="<?php //echo $this->config->base_url().'img/reviews/'.$bottom_left['img']; ?>" />
                     </div>
                     <div class="col-sm-8 ">
                        <p>
        					<?php // echo $bottom_left['message'];?>  
                        </p>
                    </div>
              
                 </div>
                 <h5>
                        <?php //echo date(DATE_RFC2822, $bottom_left['created_date']).','.$bottom_left['name']; ?></h5>
             </div>
         </li>
         
            <?php // endforeach; ?>
      </ul>-->
    </div>
    <div class="col-md-4 ">
    
<div class="information">
    <div class="title">
       <h3>Quick Information</h3>
    </div>
    <div class="check-list">
            <p>
            Check In: 2:00 PM <br/>
            Check Out: 11:00 AM <br/>
            Minimum Check-In Age: 18 <br/>
            
             <div id="cssmenu">  
                <ul>
                <li><a href="#">Internet Access</a>
                    <ul>
                        <li><a href="#">Per hour</a></li>
                        <li><a href="#">per day</a></li>
                    </ul>
                </li>
                <li><a href="#">Parking</a>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Location</a></li>
                    </ul>
                </li>
                <li><a href="#">Special needs</a></li>
                </ul>
              </div>
                
            </p>
            
                        
      </div>
      </div>
    </div>
</div>



<div class="container" id="container1">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Please Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Register" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<style>
#container1 {
    background-color: #e2dada;
}

.centered-form {
    margin-top: 120px;
    margin-bottom: 120px;
}

.centered-form .panel {
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>

