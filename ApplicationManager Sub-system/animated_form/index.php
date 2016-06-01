<html>

<head>
<title>99points.info : Animated JQuery Login / SignUp Form : Demos</title>

<link href="style.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="jquery.easing.1.3.js"></script> 

<script language="javascript">
$(document).ready(function() {
	
	$('#nav-bar').fadeIn();
	
	$('#Log-in').click(function() {
		
		$('#Log-in').css('background-color', '#006699');
		$('#signUp').css('background-color', '#000000');
		$('#submit').hide().css({'left' : '0px'});
		$('#SignupForm').hide().css({'top' : '0px'});
		
		$('#login').show().animate({
		
			left   : '52%',
			
		},400,function(){
			
			$('#login').css({'-webkit-transform' : 'rotate(-0deg)','-moz-transform' : 'rotate(-0deg)' });
		
		});
		///
		$('#Login_form').show().animate({
	
			top   : '60px',
			
		},700,function(){
			
			//$('#image').css({'-webkit-transform' : 'rotate(-90deg)','-moz-transform' : 'rotate(-90deg)' });
		});
	});
	
	$('#signUp').click(function() {
		
		$('#signUp').css('background-color', '#006699');
		$('#Log-in').css('background-color', '#000000');
		$('#login').hide().css({'left' : '0px'});
		$('#Login_form').hide().css({'top' : '0px'});
		
		$('#submit').show().animate({
		
			left   : '52%',
			
		},400,function(){
			
			$('#submit').css({'-webkit-transform' : 'rotate(-0deg)','-moz-transform' : 'rotate(-0deg)' });
		
		});
		///
		$('#SignupForm').show().animate({
	
			top   : '60px',
			
		},700,function(){
			
			//$('#image').css({'-webkit-transform' : 'rotate(-90deg)','-moz-transform' : 'rotate(-90deg)' });
		});
	});
	
});
</script>
</head>
<body>

	<img src="result.png" id="login" />
	<img src="submit.png" id="submit" />
	
	<div class="loginform" id="Login_form">
		
        <form method="post" action="#">
		
			<div>
			
			<div class="form-item">
			
			 <label for="edit-name">Username:</label>
			 <input type="text" class="form-text required" value="" size="15" id="edit-name" name="name" maxlength="60">
			</div>
			
			<div class="form-item">
			
			 <label for="edit-pass">Password:</label>
			 <input type="password" class="form-text required" size="15" maxlength="60" id="edit-pass" name="pass">
			</div>
			
			</div>
		</form>
		
	</div>
	
	<div class="loginform" id="SignupForm">
		
        <form method="post" action="#">
		
			<div>
			<div class="form-item">
			
			 <label for="edit-name">Email:</label>
			 <input type="text" class="form-text required" value="" size="15" id="edit-name" name="name" maxlength="60">
			</div>
			
			<div class="form-item">
			
			 <label for="edit-name">Username:</label>
			 <input type="text" class="form-text required" value="" size="15" id="edit-name" name="name" maxlength="60">
			</div>
			
			<div class="form-item">
			
			 <label for="edit-pass">Password:</label>
			 <input type="password" class="form-text required" size="15" maxlength="60" id="edit-pass" name="pass">
			</div>
			
			</div>
		</form>
		
	</div>
	
	<div id="nav-bar">
	
		<div class="module-bg">
			<a href="#" class="TopButtons" id="Log-in">Login</a>
			<a href="#" class="TopButtons" id="signUp">SignUp</a>
		</div>
		
	</div>
	
	<!--<img src="reg.png" id="register" />-->
 
</body>
</html>

