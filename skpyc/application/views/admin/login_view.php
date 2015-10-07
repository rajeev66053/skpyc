<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>User Login</title>
  </head>
  <body>
    <?php echo form_open('admin/verifylogin'); ?>
		<div class="login_form">
		
		<?php //echo validation_errors(); ?>
		<h1>Login</h1>
		<hr>
			<label name="username"><span>Username</span></label>
			<input id="username" name="username" value="">
			<span style="color:red"><?php echo form_error('username'); ?></span>
			<label name="password"><span>Password</span></label>
			 <input id="password" type="password" name="password" value="">
			<span style="color:red"><?php echo form_error('password'); ?></span>
			<input id="login" name="login" type="submit" value="Login" />
			
		</div>
		</form>

<script type="text/javascript">
    jQuery(function ($) {
        function check_values() {
            if ($("#username").val().length != 0 && $("#password").val().length != 0) {
                $("#button1").removeClass("hidden").animate({ left: '250px' });
                $("#lock1").addClass("hidden").animate({ left: '250px' });
            }
        }
    });
</script>

<style>
form    {


    font-family: sans-serif;
    font-size: 14px;
    line-height: 24px;
    font-weight: bold;
    color: #09C;
    text-decoration: none;
    border-radius: 10px;
    padding: 10px;
    border: 1px solid #999;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    position: fixed;
    top: 20%;
    left: 50%;
    margin-left: -15em;

}

input    {
width:375px;
display:block;
border: 1px solid #999;
height: 25px;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}

#login {

width:100px;
right:20px;
bottom:20px;
background:#09C;
color:#fff;
font-family:sans-serif;
height:30px;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
border: 1p solid #999;

    margin-top: 10px;
}
#login:hover {
background:#fff;
color:#09C;
}

</style>


  </body>
</html>
