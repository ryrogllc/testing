
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Blue Water</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/customBlue.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bodyBgBlue">
	<div class="custLoader" style="display:none;">
		<img src="images/load.gif" />
	</div>
	<section class="middleCnt">
		<div class="pageBlue">
			<div class="container">
			  <div class="row">
				<div class="col-lg-12">
					<div class="custBlueLog">
						<div class="logo"><a href="/"><img src="images/logo.png" /></a></div>
							<div class="custBlueLogFrm">
								<form name="" action="" method="POST">
									<span class="error" id="step1val"></span>
									<span class="error success" id="step2val"></span>

									<input type="text" placeholder="Email" value="" name="email" id="email" />
									<input type="button" value="Reset My Password" name="reset" onclick="return proReset();" />
								</form>
								<div class="custBlueLogFrmTxt">
									<p class="loginTxt"><a href="/">Already have an account?</a></p>
									<p class="loginTxt"><a href="/createaccount.php">Create a BluWater account</a></p>
								</div>
							</div>
						</div>            
					</div>
			  </div>
			</div>    
		</div>
	</section>

<script>
function proReset(){
	$('.custLoader').show();
	$('#step1val').html('');

	var email = $('#email').val();
	var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

	if(email==''){ 
		$('#step1val').html('Email Id required');
		$('.custLoader').hide();
	}else if(email!='' && !filter.test(email)){
		$('#step1val').html('Please enter valid email id');
		$('.custLoader').hide();
	}else{
		$.get("/process.php?pro=<?php echo md5('reset');?>&emailid="+email, function(data){
			if(data==500){
				$('#step1val').html('Your email is not found within the system. Please create a new account.');
				$('.custLoader').hide();
			}else if(data==403){
				$('#step1val').html('Your email is not found within the system. Please create a new account.');
				$('.custLoader').hide();
			}else if(data==200){
				$('#step2val').html('Email sent to user with new temporary password.');
				$('.custLoader').hide();
			}else{
				$('#step1val').html('Your email is not found within the system. Please create a new account.');
				$('.custLoader').hide();
			}
		});
	}
	return false;
}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>